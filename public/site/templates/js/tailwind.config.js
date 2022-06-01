module.exports = {
  content: [
	'public/site/*.php',
	'public/site/templates/*.php',
	'public/site/templates/**/*.php',
	'public/site/templates/**/*.js',
  ],
  theme: {
    extend: {
      screens: {
        '2xl': '1920px',
        'xl': '1440px',
        // defaults
        // 'sm': '640px',
        // 'md': '768px',
        // 'lg': '1024px',
      },
      fontSize: {
        sm: ['0.9rem', {
          letterSpacing: '0.02em',
          lineHeight: '1.25rem', //25px
        }],
        base: ['1rem', {
          letterSpacing: '0.01em',
          lineHeight: '1.5rem', //30px
        }],    
        'xxs': '.65rem',
        '4xl': '2rem',
        '5xlb': ['2.8rem', '3.2rem' ],
        '8xl': ['5.5rem', '1.1em'],
        'h1': ['1.15rem',{
          letterSpacing: '0.015em',
          lineHeight: '1.75rem',
        }], 
        'h2': '1.65rem', 
        'h3': '2.4rem', 
        'h4': '3.1rem', 
        'h5': '4.7rem', 
        'h6': ['5rem',{
          lineHeight: '6rem',
        }],
        'h2mobile': '1.55rem',
        'h3mobile': '2.2rem'
      },
      //tracking
      letterSpacing: {
        '0': '0em',
        '01': '0.01em',
        '02': '0.02em',
        '03': '0.03em',
        '04': '0.04em',
        '05': '0.05em',
      },
      //leading
      lineHeight: {
        'tightest-sa': '1.9rem', 
        'tightest1-sa': '1.95rem', 
        'tight-sa': '2rem', 
        'snug-sa': '2.65rem', 
        'relaxed-sa': '3.15rem', 
        'loose-sa': '5.25rem', 
        'l235-sa': '2.35rem', 
      },
      fontFamily: {
        'sans': ['Moderat-Light'],
        'sansBold': ['Moderat-Bold'],
        'serif': ['Morion'],
      },
      spacing: {
        '5.7': '1.4em',
        '13': '3.25rem',
        '18': '4.5rem',
        '21': '5.25rem',
        '22': '5.5rem',
        '23': '5.75rem',
        '25': '6.25rem',
        '26': '6.5rem',
        '27': '6.75rem',
        '29': '7.25rem',
        '30': '7.5rem',
        '34': '8.5rem',
        '46': '11.5rem',
        '73': '19.2rem',
        '81': '21rem',
        '97': '28rem',
        '98': '33rem',
      },
      padding: {
        '4bis': '1.2rem',
      },

      width: {
        '76': '19rem',
        '82': '22rem',
        '99': '45rem',
      },
      colors:{
        'verde-sa': {  DEFAULT: '#0E9B7E',  '50': '#6FF2D7',  '100': '#5CF0D2',  '200': '#37EDC7',  '300': '#15E6BB',  '400': '#11C09C',  '500': '#0E9B7E',  '600': '#087f67',  '700': '#05342A',  '800': '#000101',  '900': '#000000'},
        'blu-sa': {  DEFAULT: '#273583',  '50': '#8693DB',  '100': '#7785D6',  '200': '#5769CD',  '300': '#3A4EC2',  '400': '#3042A2',  '500': '#273583',  '600': '#1A2458',  '700': '#273a48',  '800': '#000101',  '900': '#000000'},
        'grigio-sa': '#231f20',
        'grigio-blu-sa': '#dddddd',
        'marrone-sa': '#1c0205',
        'grigio-scuro-sa': '#1f2320',
        'blu-scuro-sa': '#2d3f59',
      },
      rotate:{
        '270': '270deg',
      },

      translate: {
        '5/6': '83.333333%',
      },
      textDecorationThickness: {
        '2.5': '2.5px',
        3: '3px',
      },
      textUnderlineOffset: {
        18 : '18px',
      },
      blur: {
        xs: '1px',
      },
    },
  },
  plugins: [ 
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
}
