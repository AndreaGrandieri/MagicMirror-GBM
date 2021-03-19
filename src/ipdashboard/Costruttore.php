<?php
/*
STATO ATTUALE DEL DB:
Tabella: modules
Colonne:
- NomeModulo TEXT NOT NULL PRIMARY KEY
- Active INTEGER NOT NULL
- RenderIndex INTEGER NOT NULL UNIQUE
- JsonFragment TEXT NOT NULL
- JsonStableFragment TEXT NOT NULL

Tabella: globals
Colonne:
- NomeGlobale TEXT NOT NULL PRIMARY KEY,
- JsonFragment TEXT NOT NULL,
- JsonStableFragment TEXT NOT NULL
*/

// Connette al DB locale
$db = new SQLite3("settings.sqlite", SQLITE3_OPEN_READWRITE);

// Compilazione
$db->exec("CREATE TABLE modules (
    NomeModulo TEXT NOT NULL PRIMARY KEY,
    Active INTEGER NOT NULL,
    RenderIndex INTEGER NOT NULL UNIQUE,
    JsonFragment TEXT NOT NULL,
    JsonStableFragment TEXT NOT NULL
    );");

$db->exec("CREATE TABLE globals (
    NomeGlobale TEXT NOT NULL PRIMARY KEY,
    JsonFragment TEXT NOT NULL,
    JsonStableFragment TEXT NOT NULL
    );");

$db->exec("INSERT INTO modules
    SELECT 'MMM-AirQuality' AS NomeModulo, 1 AS Active, 0 AS RenderIndex, '{
\"module\": \"MMM-AirQuality\",
\"position\": \"top_center\",
\"config\": {
\"location\": \"milan\",
\"lang\": \"eng\",
\"updateInterval\": 30,
\"showLocation\": true,
\"showIndex\": true
}
}' AS JsonFragment, '{
\"module\": \"MMM-AirQuality\",
\"position\": \"top_center\",
\"config\": {
\"location\": \"milan\",
\"lang\": \"eng\",
\"updateInterval\": 30,
\"showLocation\": true,
\"showIndex\": true
}
}' AS JsonStableFragment
    UNION ALL SELECT 'clock', 1, 1, '{
\"module\": \"clock\",
\"position\": \"top_left\",
\"config\": {
\"timeFormat\": 24,
\"displaySeconds\": true,
\"showDate\": true,
\"displayType\": \"digital\",
\"timezone\": \"Europe/Rome\"
}
}', '{
\"module\": \"clock\",
\"position\": \"top_left\",
\"config\": {
\"timeFormat\": 24,
\"displaySeconds\": true,
\"showDate\": true,
\"displayType\": \"digital\",
\"timezone\": \"Europe/Rome\"
}
}'
    UNION ALL SELECT 'weather', 1, 2, '{
\"module\": \"weather\",
\"position\": \"top_right\",
\"config\": {
\"weatherProvider\": \"openweathermap\",
\"units\": \"metric\",
\"degreeLabel\": true,
\"updateInterval\": 600000,
\"lang\": \"en\",
\"initialLoadDelay\": 1000,
\"onlyTemp\": false,
\"showHumidity\": true,
\"showIndoorTemperature\": true,
\"showIndoorHumidity\": true,
\"showSun\": true,
\"colored\": true,
\"showPrecipitationAmount\": true,
\"maxNumberOfDays\": 5,
\"locationID\": \"\",
\"apiKey\": \"YOUR_OPENWEATHERMAP_APIKEY\"
}
}', '{
\"module\": \"weather\",
\"position\": \"top_right\",
\"config\": {
\"weatherProvider\": \"openweathermap\",
\"units\": \"metric\",
\"degreeLabel\": true,
\"updateInterval\": 600000,
\"lang\": \"en\",
\"initialLoadDelay\": 1000,
\"onlyTemp\": false,
\"showHumidity\": true,
\"showIndoorTemperature\": true,
\"showIndoorHumidity\": true,
\"showSun\": true,
\"colored\": true,
\"showPrecipitationAmount\": true,
\"maxNumberOfDays\": 5,
\"locationID\": \"\",
\"apiKey\": \"YOUR_OPENWEATHERMAP_APIKEY\"
}
}'
    UNION ALL SELECT 'weatherforecast', 1, 3, '{
\"module\": \"weatherforecast\",
\"position\": \"top_right\",
\"config\": {
\"units\": \"metric\",
\"updateInterval\": 600000,
\"lang\": \"en\",
\"initialLoadDelay\": 1000,
\"colored\": true,
\"showRainAmount\": true,
\"maxNumberOfDays\": 5,
\"roundTemp\": true,
\"locationID\": \"\",
\"appid\": \"YOUR_OPENWEATHERMAP_APIKEY\"
}
}', '{
\"module\": \"weatherforecast\",
\"position\": \"top_right\",
\"config\": {
\"units\": \"metric\",
\"updateInterval\": 600000,
\"lang\": \"en\",
\"initialLoadDelay\": 1000,
\"colored\": true,
\"showRainAmount\": true,
\"maxNumberOfDays\": 5,
\"roundTemp\": true,
\"locationID\": \"\",
\"appid\": \"YOUR_OPENWEATHERMAP_APIKEY\"
}
}'
    UNION ALL SELECT 'MMM-StopwatchTimer', 1, 4, '{
\"module\": \"MMM-StopwatchTimer\",
\"config\": {
\"animation\": true
}
}', '{
\"module\": \"MMM-StopwatchTimer\",
\"config\": {
\"animation\": true
}
}'
    UNION ALL SELECT 'MMM-Screencast', 1, 5, '{
\"module\": \"MMM-Screencast\",
\"position\": \"bottom_right\", 
\"config\": {
\"position\": \"center\",
\"height\": 600,
\"width\": 1000,
\"castName\": \"MagicMirror-GBM-cast\"
}
}', '{
\"module\": \"MMM-Screencast\",
\"position\": \"bottom_right\", 
\"config\": {
\"position\": \"center\",
\"height\": 600,
\"width\": 1000,
\"castName\": \"MagicMirror-GBM-cast\"
}
}'
    UNION ALL SELECT 'MMM-Online-State', 1, 6, '{
\"module\": \"MMM-Online-State\",
\"position\": \"top_right\",
\"config\": {
\"displaySymbol\": true,
\"symbolOnline\": \"fas fa-globe\",
\"symbolOffline\": \"fas fa-globe\",
\"colored\": true,
\"colorOnline\": \"#FFFFFF\",
\"colorOffline\": \"#FF0000\"
}
}', '{
\"module\": \"MMM-Online-State\",
\"position\": \"top_right\",
\"config\": {
\"displaySymbol\": true,
\"symbolOnline\": \"fas fa-globe\",
\"symbolOffline\": \"fas fa-globe\",
\"colored\": true,
\"colorOnline\": \"#FFFFFF\",
\"colorOffline\": \"#FF0000\"
}
}'
    UNION ALL SELECT 'MMM-ip', 1, 7, '{
\"module\": \"MMM-ip\",
\"position\": \"bottom_right\",
\"config\": {
\"fontSize\": 18,
\"families\": [
\"IPv4\"
],
\"types\": [
\"wlan0\"
]
}
}', '{
\"module\": \"MMM-ip\",
\"position\": \"bottom_right\",
\"config\": {
\"fontSize\": 18,
\"families\": [
\"IPv4\"
],
\"types\": [
\"wlan0\"
]
}
}';");

$db->exec("INSERT INTO globals
    SELECT 'address' AS NomeGlobale, '\"localhost\"' AS JsonFragment, '\"localhost\"' AS JsonStableFragment
    UNION ALL SELECT 'port', '8080', '8080'
    UNION ALL SELECT 'basePath', '\"/\"', '\"/\"'
    UNION ALL SELECT 'ipWhitelist', '[
\"127.0.0.1\",
\"::ffff:127.0.0.1\",
\"::1\"
]', '[
\"127.0.0.1\",
\"::ffff:127.0.0.1\",
\"::1\"
]'
    UNION ALL SELECT 'useHttps', 'false', 'false'
    UNION ALL SELECT 'httpsPrivateKey', '\"\"', '\"\"'
    UNION ALL SELECT 'httpsCertificate', '\"\"', '\"\"'
    UNION ALL SELECT 'language', '\"en\"', '\"en\"'
    UNION ALL SELECT 'logLevel', '[
\"INFO\",
\"LOG\",
\"WARN\",
\"ERROR\"
]', '[
\"INFO\",
\"LOG\",
\"WARN\",
\"ERROR\"
]'
    UNION ALL SELECT 'timeFormat', '24', '24'
    UNION ALL SELECT 'units', '\"metric\"', '\"metric\"'
    UNION ALL SELECT 'serverOnly', 'false', 'false';");
