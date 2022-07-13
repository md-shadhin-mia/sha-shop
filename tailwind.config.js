const plugin = require('tailwindcss/plugin');
const mdiCss = require('./src/library/material-design-icon');
module.exports = {
    content: ["./src/**/*.{html,js}","./dist/**/*.{php, html, js}"],
    theme: {
      extend: {
      },
    },
    plugins: [
      plugin(function({addBase, addComponents, theme}){
        addComponents({
          '.card':{
            backgroundColor:"green",
          }
          ,
          ".mdi":{
              "display": "inline-block",
              "font": 'normal normal normal 24px/1 "Material Design Icons"',
              "font-size": 'inherit',
              'text-rendering': 'auto',
              'line-height': 'inherit',
              '-webkit-font-smoothing': 'antialiased',
              '-moz-osx-font-smoothing': 'grayscale',
            },
        });
        addComponents(mdiCss());
      }),
  ],
}