import {BaseApi} from '@js/services/BaseApi';

class UserService extends BaseApi {
    constructor() {
        super();
        this.service = '/api/auth';
    }
    getUser(){
        return this.get();
    }
}
export default new UserService();
