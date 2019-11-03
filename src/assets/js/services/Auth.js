export default class Auth {
    static get EG_HOST() { return 'EG_HOST'}
    static get EG_API_KEY () { return  'EG_API_KEY'}
    static get LOGIN_ROUTE () { return  'login';}

    static getUser(){
        if(sessionStorage.getItem(Auth.EG_API_KEY))
        return sessionStorage.getItem(Auth.EG_API_KEY) || false;
    }
    static requireAuth(to, from, next){
        let user = Auth.getUser();
        if(user) {
            next();
        }else{
            next({replace: true,name:Auth.LOGIN_ROUTE,query:{to:to.path}});
        }


    }
    static logOut(){
        sessionStorage.removeItem(Auth.EG_API_KEY);
        sessionStorage.removeItem(Auth.EG_HOST);
    }
}
