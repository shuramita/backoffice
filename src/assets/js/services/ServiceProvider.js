export default class ServiceProvider {
    static loadDashboardComponents() {
        let packages = require.context('@root/packages/compiler/cache/backoffice/dashboard', true, /^.*\.vue$/);
        // console.log(packages);
        let components = {};
        packages.keys().map(key => {
            components['dashboard-' + packages(key).default.name] = packages(key).default;
        })
        // console.log(components);
        return components;
    }
}
