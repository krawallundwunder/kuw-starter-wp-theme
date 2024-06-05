module.exports = {
  content: [
    './*.php',
    './**/*.twig',
    './Components/*.twig',
    './Components/**/*.twig',
    './inc/*.php',
    './inc/**/*.php',
    './templates/*.php',
    './templates/**/*.php',
  ],
  darkMode: 'media',
  theme: {
    extend: {
      colors: {
        // TODO: replace with project colors
        orange: {
          50: '#f9f5e5',
          100: '#faefbf',
          200: '#f6e580',
          300: '#f2d13d',
          400: '#eab413',
          500: '#f7a823',
          600: '#d56f05',
          700: '#b45309',
          800: '#93410f',
          900: '#793511',
        },
      },
    },
    fontFamily: {
      // TODO: replace with project fonts
      sans: ['Inter', 'sans-serif'],
      serif: ['serif'],
    },
  },
  variants: {
    extend: {
      margin: ['hover'],
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
  ],
}
