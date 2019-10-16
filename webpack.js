exports.combine = function(mix){
    let source = `${__dirname}/src`;
    let dest = 'public';
    mix.sass(`${source}/assets/sass/backoffice.scss`, `${dest}/css/backoffice/backoffice.css`).version();
    mix.js([
        `${source}/assets/js/backoffice.js`
    ], `${dest}/js/backoffice/backoffice.js`).version();
};
