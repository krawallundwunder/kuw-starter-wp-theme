const config = {
  printWidth: 100,
  tabWidth: 2,
  useTabs: false,
  semi: true,
  singleQuote: true,
  trailingComma: 'es5',
  bracketSpacing: true,
  arrowParens: 'avoid',

  plugins: ['@prettier/plugin-php', '@zackad/prettier-plugin-twig', 'prettier-plugin-tailwindcss'],

  overrides: [
    {
      files: '*.php',
      options: {
        parser: 'php',
        phpVersion: '8.1',
      },
    },
  ],
};

export default config;
