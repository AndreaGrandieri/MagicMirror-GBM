var config = JSON.parse(`{"address": "localhost","basePath": "/","httpsCertificate": "","httpsPrivateKey": "","ipWhitelist": [
        "127.0.0.1",
        "::ffff:127.0.0.1",
        "::1"
        ],"language": "en","logLevel": [
        "INFO",
        "LOG",
        "WARN",
        "ERROR"
        ],"port": 8080,"serverOnly": false,"timeFormat": 24,"units": "metric","useHttps": false,"modules": [{
module: "alert",
},
{
module: "updatenotification",
position: "top_bar"
},{
        "module": "MMM-AirQuality",
        "position": "top_center",
        "config": {
        "location": "milan",
        "lang": "eng",
        "updateInterval": 30,
        "showLocation": true,
        "showIndex": true
        }
        },{
        "module": "MMM-DHT-Sensor",
        "config": {
        "sensorPin": 16,
        "sensorType": 22,
        "units": "metric",
        "updateInterval": 10000
        }
        },{
        "module": "newsfeed",
        "position": "bottom_bar",
        "config": {
        "feeds": [
        {
        "title": "Il Giornale",
        "url": "https://www.ilgiornale.it/feed.xml"
        },
        {
        "title": "Corriere della sera",
        "url": "http://xml2.corriereobjects.it/rss/homepage.xml"
        },
        {
        "title": "La Gazzetta dello Sport",
        "url": "https://www.gazzetta.it/rss/home.xml"
        }
        ],
        "showSourceTitle": true,
        "showPublishDate": true,
        "broadcastNewsFeeds": true,
        "broadcastNewsUpdates": true
        }
        },{
        "module": "clock",
        "position": "top_left",
        "config": {
        "timeFormat": 24,
        "displaySeconds": true,
        "showDate": true,
        "displayType": "digital",
        "timezone": "Europe/Rome"
        }
        },{
        "module": "calendar",
        "position": "top_left",
        "config": {
        "showLocation": true,
        "wrapEvents": true,
        "wrapLocationEvents": true,
        "fetchInterval": 1000,
        "displayRepeatingCountTitle": false,
        "timeFormat": "relative",
        "getRelative": 1,
        "urgency": 0,
        "calendars": [
        {
        "url": "https://gist.githubusercontent.com/AndreaGrandieri/22d4ee01b5e78990d88c042cdf55591a/raw/96cbe4e867bc507f51e2a9397072a5b233f21447/ItalianHolidays.ics",
        "color": "#00E0E0",
        "name": "Festività italiane"
        }
        ]
        }
        },{
        "module": "MMM-MD",
        "position": "center",
        "config": {
        }
        },{
        "module": "MMM-Screencast",
        "position": "bottom_right", 
        "config": {
        "position": "center",
        "height": 600,
        "width": 1000,
        "castName": "MagicMirror-GBM-cast"
        }
        },{
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
        },{
        "module": "MMM-ip",
        "position": "bottom_right",
        "config": {
        "fontSize": 18,
        "families": [
        "IPv4"
        ],
        "types": [
        "wlan0"
        ]
        }
        },{
        "module": "MMM-PIR-Sensor",
        "position": "bottom_right",
        "config": {
        "sensorPin": 17,
        "powerSaving": true,
        "powerSavingDelay": 900,
        "powerSavingNotification": false,
        "powerSavingMessage": "Attivazione modalità sospensione...",
        "preventHDMITimeout": 5,
        "presenceIndicatorColor": "white",
        "runSimulator": false
        }
        }]}`); if (typeof module !== "undefined") { module.exports = config; }