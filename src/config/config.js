var config = JSON.parse(`{"address": "localhost","basePath": "/","httpsCertificate": "","httpsPrivateKey": "","ipWhitelist": [
        "127.0.0.1",
        "::ffff:127.0.0.1",
        "::1"
    ],"language": "en","logLevel": [
        "INFO",
        "LOG",
        "WARN",
        "ERROR"
    ],"port": 8080,"serverOnly": false,"timeFormat": 24,"units": "metric","useHttps": false,"modules": [{"module":"alert"},{"module":"updatenotification","position":"top_bar"},{
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
},{"module":"clock","position":"top_left"},{"module":"calendar","header":"US Holidays","position":"top_left","config":{"calendars":[{"symbol":"calendar-check","url":"webcal:\/\/www.calendarlabs.com\/ical-calendar\/ics\/76\/US_Holidays.ics"}]}},{"module":"weather","position":"top_right","config":{"weatherProvider":"openweathermap","units":"metric","degreeLabel":true,"updateInterval":600000,"lang":"en","initialLoadDelay":1000,"onlyTemp":false,"showHumidity":true,"showIndoorTemperature":true,"showIndoorHumidity":true,"showSun":true,"colored":true,"showPrecipitationAmount":true,"maxNumberOfDays":5,"locationID":"3173435","apiKey":"f41537e389176cf93d8e0586d0d701ae"}},{"module":"weatherforecast","position":"top_right","config":{"units":"metric","updateInterval":600000,"lang":"en","initialLoadDelay":1000,"colored":true,"showRainAmount":true,"maxNumberOfDays":5,"roundTemp":true,"locationID":"3173435","appid":"f41537e389176cf93d8e0586d0d701ae"}},{"module":"newsfeed","position":"bottom_bar","config":{"feeds":[{"title":"New York Times","url":"https:\/\/rss.nytimes.com\/services\/xml\/rss\/nyt\/HomePage.xml"}],"showSourceTitle":true,"showPublishDate":true,"broadcastNewsFeeds":true,"broadcastNewsUpdates":true}},{"module":"MMM-AirQuality","position":"top_center","config":{"location":"milan","lang":"eng","updateInterval":30,"showLocation":true,"showIndex":true}},{
    "module": "MMM-Screencast",
    "position": "bottom_right",
    "config": {
        "position": "center",
        "height": 600,
        "width": 1000,
        "castName": "MagicMirror-GBM-cast"
    }
},{
    "module": "MMM-StopwatchTimer",
    "config": {
        "animation": true
    }
}]}`); if (typeof module !== "undefined") { module.exports = config; }