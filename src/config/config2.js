var config = JSON.parse(`{"address": "localhost"
,"basePath": "/","httpsCertificate": "","httpsPrivateKey": "","ipWhitelist": [
        "127.0.0.1",
        "::ffff:127.0.0.1",
        "::1"
    ],"language": "en","logLevel": [
        "INFO",
        "LOG",
        "WARN",
        "ERROR"
    ],"port": 8080,"serverOnly": false,"timeFormat": 24,"units": "metric","useHttps": false,"modules": [{
    "module": "MMM-Online-State",
    "position": "top_right",
    "config": {
        "displaySymbol": true,
        "symbolOnline": "fas fa-globe",
        "symbolOffline": "fas fa-globe",
        "colored": true,
        "colorOnline": "#FFFFFF",
        "colorOffline": "#FF0000"
    }
}]}`); if (typeof module !== "undefined") { module.exports = config; }