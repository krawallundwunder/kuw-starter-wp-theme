const path = require('path')

module.exports = {
  mode: 'production',
  entry: {
    'bundle.min.js': [
      path.resolve(__dirname, 'assets/js/src.js'),
    ],
  },
  output: {
    filename: '[name]',
    path: path.resolve(__dirname, 'assets/js/dist'),
  },
}
