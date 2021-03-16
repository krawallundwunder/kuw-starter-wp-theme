module.exports = {
	purge: [],
	darkMode: false, // or 'media' or 'class'
	theme: {
		extend: {
			colors: {
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
					900: '#793511'
				}
			}
		},
		fontFamily: {
			sans: [ 'Inter', 'sans-serif' ],
			serif: [ 'serif' ]
		}
	},
	variants: {
		extend: {
			margin: [ 'hover' ]
		}
	},
	plugins: [
		require( '@tailwindcss/typography' )
	]
};
