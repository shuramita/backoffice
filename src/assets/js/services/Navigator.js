import {Api} from "./Api";

export default class NavigatorApi extends Api {
    async getNav() {
        return this.get('/navigation')
            .then(({data}) => {
                return Promise.resolve(data);
            })
    }

    static getUri(link) {
        let uri = link.replace(window.location.origin, '');
        return uri;
    }
}
