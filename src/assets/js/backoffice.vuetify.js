import Vue from 'vue'
import vuetify from './plugins/vuetify';
import App from './App.vue'
import VueRouter from 'vue-router'
import Auth from './services/Auth'
import axios from 'axios';

Vue.prototype.axio = axios;
Vue.prototype.$event = new Vue();

Vue.use(VueRouter)
const routes = [
    {path: '/backoffice', component: () => import('./components/Dashboard'), beforeEnter: Auth.requireAuth},
    {path: '/backoffice/dashboard', component: () => import('./components/Dashboard'), beforeEnter: Auth.requireAuth},
    // { path: '/users', component: User, beforeEnter: Auth.requireAuth  },
    // { path: '/users/:id', component: ()=>import("./components/user/UserDetail") , beforeEnter: Auth.requireAuth,},
    // { path: '/applications', component: Application , beforeEnter: Auth.requireAuth,},
    // { path: '/applications/:id', component: ()=>import("./components/application/ApplicationDetail") , beforeEnter: Auth.requireAuth,},
    // { path: '/credentials', component: Credential , beforeEnter: Auth.requireAuth,},
    // { path: '/schemas', component: ()=>import('./components/Schema') , beforeEnter: Auth.requireAuth,},
    // { path: '/scopes', component: Scope , beforeEnter: Auth.requireAuth},
    // { path: '/service-endpoints', component: ()=>import('./components/ServicesEndpoint') , beforeEnter: Auth.requireAuth},
    // { path: '/api-endpoints', component: ()=>import('./components/ApiEndpoint') , beforeEnter: Auth.requireAuth},
    // { path: '/pipelines', component: ()=>import('./components/Pipeline') , beforeEnter: Auth.requireAuth},
    // { path: '/oauth2/callback/:appId', component: ()=>import('./components/oauth/callback') },
    {path: '/login', component: () => import('./components/Login'), name: 'login'},
    // { path: '/dashboard', component: ()=>import('./components/dashboard/Dashboard') , beforeEnter: Auth.requireAuth,}
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});

Vue.config.productionTip = false;
new Vue({
    router,
    vuetify,
    render: h => h(App)
}).$mount('#app')
