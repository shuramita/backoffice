exports.combine = function(mix){
    let source = `${__dirname}/src`;
    let dest = 'public';
    let package = 'backoffice'
    mix.sass(`${source}/assets/sass/backoffice.scss`, `${dest}/css/backoffice/backoffice.css`).version();
    mix.js([
        `${source}/assets/js/backoffice.js`
    ], `${dest}/js/backoffice/backoffice.js`).version();
    console.log('let copy scg icon to resource folder from',`${source}/assets/svg`,' to ', `resources/svg/vendor/${package}`);
    mix.copyDirectory(`${source}/assets/svg`,`resources/svg/vendor/${package}`);
};
