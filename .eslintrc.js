module.exports = {
  env: {
    browser: true,
    commonjs: true,
    es6: true,
    node: true,
  },
  extends: ['eslint:recommended', 'plugin:@wordpress/eslint-plugin/esnext'],
  parserOptions: {
    sourceType: 'module',
  },
  rules: {
    'space-before-function-paren': ['error', 'never'],
    'space-in-parens': ['error', 'never'],
    'array-bracket-spacing': ['error', 'never'],
    indent: ['error', 2],
    semi: ['error', 'never'],
    quotes: ['error', 'single'],
    'linebreak-style': ['error', 'unix'],
    'space-unary-ops': [
      2,
      {
        words: true,
        nonwords: false,
        overrides: {
          new: false,
          '++': true,
        },
      },
    ],
  },
}
