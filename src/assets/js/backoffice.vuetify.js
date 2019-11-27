import Vue from 'vue'
import vuetify from './plugins/vuetify';
import App from './App.vue'
import VueRouter from 'vue-router'
import Auth from './services/Auth'

Vue.prototype.$event = new Vue();
import dashboard from './components/dashboard'
import Login from "./components/Login";

Vue.use(VueRouter)
const routes = [
    {path: '/backoffice', redirect: {name: 'dashboard'}},
    {path: '/backoffice/dashboard', component: dashboard, beforeEnter: Auth.requireAuth, name: 'dashboard'},
    {path: '/login', component: Login, name: 'login'},
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});
const packagesRoutes = require.context('@root/packages/compiler/cache/routers', true, /^.*\.js$/);
packagesRoutes.keys().map(key => {
    router.addRoutes(packagesRoutes(key).default);
})
router.addRoutes([{path: "*", redirect: {name: 'dashboard'}}]);

// console.log(packagesRoutes);
Vue.config.productionTip = false;
export default new Vue({
    router,
    vuetify,
    render: h => h(App)
}).$mount('#app')
