module.exports = {
  mode: 'jit',
  corePlugins: {
    preflight: false,
  },
  prefix: 'tw-',
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      'grey-light': '#F5F6F9',
      'white': '#FFFFFF',
      'grey': 'rgba(0, 0, 0, 0.4)',
      'blue': '#47cdff',
      'blue-light': '#8ae2fe',
      'black': '#000000',
      'red': '#ff0000',
      'default': 'var(--text-default-color)',
    },
    backgroundColor: theme => ({
        'page': 'var(--page-background-color)',
        'card': 'var(--card-background-color)',
        'button': 'var(--button-background-color)',
        'header': 'var(--header-background-color)',
    }),
    boxShadow: {
      'DEFAULT': '0 0 5px 0 rgba(0, 0, 0, 0.08)'
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
