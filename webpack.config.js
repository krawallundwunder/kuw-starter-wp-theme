const path = require('path')

module.exports = {
  mode: 'production',
  entry: {
    'main.min.js': [
      path.resolve(__dirname, 'assets/js/index.js'),
    ],
  },
  output: {
    filename: '[name]',
    path: path.resolve(__dirname, 'assets/js/dist'),
  },
}
