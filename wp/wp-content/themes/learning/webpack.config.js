const path = require('path');

const CopyWebpackPlugin = require('copy-webpack-plugin')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

const devMode = process.env.NODE_ENV !== 'production'

const STANDARD_EXCLUDE = [
  path.join(__dirname, 'node_modules'),
  path.join(__dirname, 'non_npm_dependencies'),
];

const PATHS = {
  styles: {
    src: ['assets/scss/bundle.scss', 'assets/scss/admin.scss'],
    dest: 'assets/css',
  },
  images: {
    src: 'assets/images/**/*',
    dest: 'assets/images',
    test: /\.(gif|png|jpe?g|svg)$/,
  },
  scripts: {
    src: ['assets/js/bundle.js', 'assets/js/admin.js'],
    dest: 'assets/js',
    test: /\.(js|jsx)$/,
  },
  others: {
    src: '**/*',
    ignore: [ 'assets/**/*' ],
    dest: './',
    context: './src/'
  },
};

let publicPath = '/assets/';

module.exports = {
  entry: {
    bundle: [ './src/assets/js/bundle.js', './src/assets/scss/bundle.scss' ],
    admin: [ './src/assets/js/admin.js', './src/assets/scss/admin.scss' ],
  },
  output: {
    path: path.join(__dirname, 'dist'),
    publicPath,
    filename: PATHS.scripts.dest + '/[name].js',
    chunkFilename: PATHS.scripts.dest + '/[name].js',
  },
  devtool: 'source-map', 
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: PATHS.styles.dest + '/[name].css',
            }
          },
          {
            loader: 'extract-loader'
          },
          {
            loader: 'css-loader'
          }, 
          {
            loader: 'sass-loader'
          }
        ],
      }, 
      {
        test: /\.(js|jsx)$/,
        exclude: STANDARD_EXCLUDE,
        use: {
          loader: 'babel-loader',
          options: {
            cacheDirectory: true
          }
        }
      },
      {
        test: /\.(gif|png|jpe?g|svg)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: PATHS.images.dest,
            },
          },
          {
            loader: 'image-webpack-loader',
            options: {
              disable: devMode,
            },
          },
        ],
      },
    ]
  },
  optimization: {
    minimizer: [
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        sourceMap: true
      }),
      new OptimizeCssAssetsPlugin()
    ]
  },
  plugins: [
    new CopyWebpackPlugin([
      { from: PATHS.images.src, to: PATHS.images.dest, test: PATHS.images.test, },
      { from: PATHS.others.src, to: PATHS.others.dest, ignore: PATHS.others.ignore, context: PATHS.others.context },
    ]), 
    new ImageminPlugin({ disable: devMode, test: PATHS.images.test }),
    
  ],
    
}