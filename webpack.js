exports.combine = function(mix){
    let source = `${__dirname}/src`;
    let dest = 'public';
    let package = 'backoffice'
    mix.sass(`${source}/assets/sass/backoffice.scss`, `${dest}/css/backoffice/backoffice.css`);
    mix.js([
        `${source}/assets/js/backoffice.js`
    ], `${dest}/js/backoffice/backoffice.js`);
    mix.js( `${source}/assets/js/backoffice.vuetify.js`, `${dest}/js/backoffice/backoffice.vuetify.js`);

    console.log('let copy scg icon to resource folder from',`${source}/assets/svg`,' to ', `resources/svg/vendor/${package}`);
    mix.copyDirectory(`${source}/assets/svg`,`resources/svg/vendor/${package}`);
};
