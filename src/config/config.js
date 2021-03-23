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
"module": "weather",
"position": "top_right",
"config": {
"weatherProvider": "openweathermap",
"units": "metric",
"degreeLabel": true,
"updateInterval": 600000,
"lang": "en",
"initialLoadDelay": 1000,
"onlyTemp": false,
"showHumidity": true,
"showIndoorTemperature": true,
"showIndoorHumidity": true,
"showSun": true,
"colored": true,
"showPrecipitationAmount": true,
"maxNumberOfDays": 5,
"locationID": "",
"apiKey": "YOUR_OPENWEATHERMAP_APIKEY"
}
},{
"module": "weatherforecast",
"position": "top_right",
"config": {
"units": "metric",
"updateInterval": 600000,
"lang": "en",
"initialLoadDelay": 1000,
"colored": true,
"showRainAmount": true,
"maxNumberOfDays": 5,
"roundTemp": true,
"locationID": "",
"appid": "YOUR_OPENWEATHERMAP_APIKEY"
}
},{
"module": "MMM-StopwatchTimer",
"config": {
"animation": true
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
}]}`); if (typeof module !== "undefined") { module.exports = config; }
