import userService from './UserService';

class User {
    constructor(user) {
        this.id = user.id;
        this.email = user.email;
        this.permissions = user.permissions.map(permission => permission.slug).flat();
        this.name = user.name;
    }

    hasPermission(permissionSlug) {
        return this.permissions.includes(permissionSlug);
    }
}

class Auth {

    static get API_KEY() {
        return 'API_KEY'
    }

    static get LOGIN_ROUTE() {
        return 'login';
    }

    static login() {
        let api_token = document.head.querySelector('meta[name="api-token"]');
        console.log(api_token.content);
        sessionStorage.setItem(Auth.API_KEY, api_token.content);
    }

    static isAuthenticated() {
        return !!sessionStorage.getItem(Auth.API_KEY);
    }

    static getUser() {
        if (sessionStorage.getItem(Auth.API_KEY))
            return sessionStorage.getItem(Auth.API_KEY) || false;
    }

    static async user() {
        if (!Auth.auth) {
            let {data} = await userService.getUser();
            console.log(data);
            Auth.auth = new User(data);
        }
        return Auth.auth;
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

// Auth.user = null;

export default Auth;
