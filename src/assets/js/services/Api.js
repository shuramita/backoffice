import {BaseApi} from '@js/services/BaseApi';

export class Api extends BaseApi{

    constructor() {
        super();
        this.service = '/api/backoffice';
    }
}
