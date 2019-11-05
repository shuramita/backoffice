export default class Auth {

    static get API_KEY() {
        return 'API_KEY'
    }

    static get LOGIN_ROUTE() {
        return 'login';
    }

    static login() {
        let api_token = document.head.querySelector('meta[name="api-token"]');
        sessionStorage.setItem(Auth.API_KEY, api_token.content);
    }

    static getUser() {
        if (sessionStorage.getItem(Auth.API_KEY))
            return sessionStorage.getItem(Auth.API_KEY) || false;
    }

    static requireAuth(to, from, next) {
        let user = Auth.getUser();
        if (user) {
            next();
        } else {
            next({replace: true, name: Auth.LOGIN_ROUTE, query: {to: to.path}});
        }
    }

    static logOut() {
        sessionStorage.removeItem(Auth.API_KEY);
    }
}
