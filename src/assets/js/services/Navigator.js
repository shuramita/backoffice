export default class Navigator {
    static getNav() {
        return {
            "dashboard": {
                "link": "http://127.0.0.1:8000/backoffice/dashboard",
                "name": "Dashboard",
                "icon": {
                    "type": "svg",
                    "file": "vendor.backoffice.bo-home",
                    "mdi": "home",
                    "svg": "<svg class=\"\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"17\" viewBox=\"0 0 20 17\">\r\n    <g fill=\"none\" fill-rule=\"evenodd\">        \r\n        <path fill=\"#777\" fill-rule=\"nonzero\" d=\"M8 17v-6h4v6h5V9h3L10 0 0 9h3v8z\"/>\r\n    </g>\r\n</svg>"
                },
                "order": 999
            },
            "asset": {
                "link": "http://127.0.0.1:8000/asset",
                "name": "Asset Manager",
                "icon": {
                    "type": "svg",
                    "mdi": "layers",
                    "file": "vendor.asset.layers-24px",
                    "svg": "<svg class=\"\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M0 0h24v24H0z\" fill=\"none\"/><path d=\"M11.99 18.54l-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27-7.38 5.74zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16z\"/></svg>"
                },
                "order": 999
            },
            "setting": {
                "link": "http://127.0.0.1:8000/asset/setting",
                "name": "Asset Setting",
                "icon": {
                    "type": "svg",
                    "mdi": "settings",
                    "file": "vendor.asset.nav-icon",
                    "svg": "<svg class=\"\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">\n    <path fill=\"#723BD4\" fill-rule=\"nonzero\" d=\"M12-33a.99.99 0 0 0-.396.082l-8.909 3.857a1.154 1.154 0 0 0 0 2.118l8.909 3.861c.254.11.541.11.794 0l8.909-3.861c.42-.183.693-.6.693-1.059 0-.46-.273-.875-.695-1.057l-8.909-3.859A.986.986 0 0 0 12-33zm9.1 8.416a.996.996 0 0 0-.498.078l-.602.26v.002l-8 3.467-8.607-3.725a.997.997 0 1 0-.791 1.83l9.002 3.9c.254.11.541.11.794 0l9-3.9a.998.998 0 0 0-.298-1.912zm0 4.395a.996.996 0 0 0-.498.078L20-19.85v.002l-8 3.465-8.607-3.722a.996.996 0 1 0-.791 1.83l9.002 3.898c.254.11.541.11.794 0l9-3.898a1 1 0 0 0-.298-1.914z\"/>\n</svg>"
                },
                "order": 999
            }
        }
    }

    static getUri(link) {
        let uri =  link.replace(window.location.origin, '');
        return uri;
    }
}
