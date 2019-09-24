const path = require('path');
const glob = require('glob');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

const entry = () => {
  return glob.sync('./resources/scripts/*.js').reduce(
    function (prev, curr) {
      prev[path.basename(curr, '.js')] = curr;
      return prev;
    }, {}
  );
};

module.exports = {
  mode: 'production',
  entry: entry(),
  output: {
    filename: 'js/[name].min.js',
    path: path.resolve(__dirname, 'assets')
  },
  module: {
    rules: [
      { // Loading JS
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            cacheDirectory: true,
            presets: ['@babel/preset-env'],
            plugins: ['@babel/plugin-transform-runtime']
          }
        }
      },
      { // Loading CSS
        test: /\.css$/,
        use: [ MiniCssExtractPlugin.loader, 'css-loader' ]
      },
      { // Loading SCSS
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader, {
            loader: 'css-loader',
            options: {
              importLoaders: 2
            }
          }, {
            loader: 'postcss-loader',
            options: {
              plugins: [
                require('autoprefixer')({
                  grid: true
                })
              ]
            }
          },
          'sass-loader'
        ]
      },
      { // Loading Images
        test: /\.(jpe?g|png|gif|svg)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              publicPath: '../images',
              outputPath: 'images'
            }
          }
        ]
      },
      { // Loading Fonts
        test: /\.(ttf|otf|woff|woff2|eot)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              publicPath: '../fonts',
              outputPath: 'fonts'
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].min.css'
    }),
    new CopyWebpackPlugin([{
      from: path.resolve(__dirname, 'resources/static'),
      to: path.resolve(__dirname, 'assets')
    }]),
    new CopyWebpackPlugin([{
      from: path.resolve(__dirname, 'resources/images'),
      to: path.resolve(__dirname, 'assets/images')
    }]),
    new ImageminPlugin({
      test: /\.(jpe?g|png|gif|svg)$/,
    })
  ]
};
