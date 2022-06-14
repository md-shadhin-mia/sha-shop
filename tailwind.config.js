const plugin = require('tailwindcss/plugin');
module.exports = {
    content: ["./src/**/*.{html,js}","./dist/**/*.{php, html}"],
    theme: {
      extend: {
      },
    },
    plugins: [
    //   plugin(function({addComponents, theme}){
    //     addComponents({
    //       '.card':{
    //         borderRadius: theme(borderRadius.lg),
    //         padding: theme(spacing.6),
    //         boxShadow:theme(boxShadow.xl),
    //       }
    //     })
    // })
  ],
}