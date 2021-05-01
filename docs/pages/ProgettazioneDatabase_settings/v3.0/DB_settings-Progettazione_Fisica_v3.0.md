---
layout: noheader
permalink: /:path/:basename:output_ext
---

# DB settings - Progettazione Fisica

## Note

Piattaforma: `SQLite`

String delimiter: `'`

Escaped: `"`

---

## Sequenza Costruzione

1. Creazione Database

    La creazione del Database consiste nella creazione del file
    `settings.sqlite`.

    Creazione Unix:

    ```shell
    touch settings.sqlite
    ```

    Creazione Windows:

    ```shell
    fsutil file createnew settings.sqlite 0
    ```

2. Creazione tabella `modules`

    ```sql
    CREATE TABLE modules (
        NomeModulo TEXT NOT NULL PRIMARY KEY,
        Active INTEGER NOT NULL,
        RenderIndex INTEGER NOT NULL UNIQUE,
        JsonFragment TEXT NOT NULL,
        JsonStableFragment TEXT NOT NULL
        );
    ```

3. Creazione tabella `globals`

    ```sql
    CREATE TABLE globals (
        NomeGlobale TEXT NOT NULL PRIMARY KEY,
        JsonFragment TEXT NOT NULL,
        JsonStableFragment TEXT NOT NULL
        );
    ```

4. Inserimento record default per la tabella `modules`
   Conteggio record: 14

    ```sql
    INSERT INTO modules (NomeModulo, Active, RenderIndex, JsonFragment, JsonStableFragment)
    VALUES
        ('MMM-AirQuality', 1, 0,
        '{
        \"module\": \"MMM-AirQuality\",
        \"position\": \"top_center\",
        \"config\": {
        \"location\": \"milan\",
        \"lang\": \"eng\",
        \"updateInterval\": 30,
        \"showLocation\": true,
        \"showIndex\": true
        }
        }', 
        '{
        \"module\": \"MMM-AirQuality\",
        \"position\": \"top_center\",
        \"config\": {
        \"location\": \"milan\",
        \"lang\": \"eng\",
        \"updateInterval\": 30,
        \"showLocation\": true,
        \"showIndex\": true
        }
        }'),
        ('MMM-DHT-Sensor', 1, 1,
        '{
        \"module\": \"MMM-DHT-Sensor\",
        \"config\": {
        \"sensorPin\": 16,
        \"sensorType\": 22,
        \"units\": \"metric\",
        \"updateInterval\": 10000
        }
        }',         
        '{
        \"module\": \"MMM-DHT-Sensor\",
        \"config\": {
        \"sensorPin\": 16,
        \"sensorType\": 22,
        \"units\": \"metric\",
        \"updateInterval\": 10000
        }
        }'),
        ('newsfeed', 1, 2,
        '{
        \"module\": \"newsfeed\",
        \"position\": \"bottom_bar\",
        \"config\": {
        \"feeds\": [
        {
        \"title\": \"Il Giornale\",
        \"url\": \"https://www.ilgiornale.it/feed.xml\"
        },
        {
        \"title\": \"Corriere della sera\",
        \"url\": \"http://xml2.corriereobjects.it/rss/homepage.xml\"
        },
        {
        \"title\": \"La Gazzetta dello Sport\",
        \"url\": \"https://www.gazzetta.it/rss/home.xml\"
        }
        ],
        \"showSourceTitle\": true,
        \"showPublishDate\": true,
        \"broadcastNewsFeeds\": true,
        \"broadcastNewsUpdates\": true
        }
        }',
        '{
        \"module\": \"newsfeed\",
        \"position\": \"bottom_bar\",
        \"config\": {
        \"feeds\": [
        {
        \"title\": \"Il Giornale\",
        \"url\": \"https://www.ilgiornale.it/feed.xml\"
        },
        {
        \"title\": \"Corriere della sera\",
        \"url\": \"http://xml2.corriereobjects.it/rss/homepage.xml\"
        },
        {
        \"title\": \"La Gazzetta dello Sport\",
        \"url\": \"https://www.gazzetta.it/rss/home.xml\"
        }
        ],
        \"showSourceTitle\": true,
        \"showPublishDate\": true,
        \"broadcastNewsFeeds\": true,
        \"broadcastNewsUpdates\": true
        }
        }'),
        ('MMM-AVStock', 0, 3,
        '{
        \"module\": \"MMM-AVStock\",
        \"position\": \"bottom_left\",
        \"config\": {
        \"apiKey\": \"YOUR_ALPHAVANTAGE_KEY\",
        \"mode\": \"table\",
        \"chartType\": \"line\",
        \"symbols\": [\"AAPL\", \"GOOGL\", \"TSLA\"],
        \"alias\": [\"APPLE\", \"GOOGLE\", \"TESLA\"],
        \"showChart\": true,
        \"direction\": \"column\"
        }
        }',
        '{
        \"module\": \"MMM-AVStock\",
        \"position\": \"bottom_left\",
        \"config\": {
        \"apiKey\": \"YOUR_ALPHAVANTAGE_KEY\",
        \"mode\": \"table\",
        \"chartType\": \"line\",
        \"symbols\": [\"AAPL\", \"GOOGL\", \"TSLA\"],
        \"alias\": [\"APPLE\", \"GOOGLE\", \"TESLA\"],
        \"showChart\": true,
        \"direction\": \"column\"
        }
        }'),
        ('clock', 1, 4, 
        '{
        \"module\": \"clock\",
        \"position\": \"top_left\",
        \"config\": {
        \"timeFormat\": 24,
        \"displaySeconds\": true,
        \"showDate\": true,
        \"displayType\": \"digital\",
        \"timezone\": \"Europe/Rome\"
        }
        }', 
        '{
        \"module\": \"clock\",
        \"position\": \"top_left\",
        \"config\": {
        \"timeFormat\": 24,
        \"displaySeconds\": true,
        \"showDate\": true,
        \"displayType\": \"digital\",
        \"timezone\": \"Europe/Rome\"
        }
        }'),
        ('weather', 0, 5, 
        '{
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
        }', 
        '{
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
        }'),
        ('weatherforecast', 0, 6, 
        '{
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
        }', 
        '{
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
        }'),
        ('calendar', 1, 7,
        '{
        \"module\": \"calendar\",
        \"position\": \"top_left\",
        \"config\": {
        \"showLocation\": true,
        \"wrapEvents\": true,
        \"wrapLocationEvents\": true,
        \"fetchInterval\": 1000,
        \"displayRepeatingCountTitle\": false,
        \"timeFormat\": \"relative\",
        \"getRelative\": 1,
        \"urgency\": 0,
        \"calendars\": [
        {
        \"url\": \"https://gist.githubusercontent.com/AndreaGrandieri/22d4ee01b5e78990d88c042cdf55591a/raw/96cbe4e867bc507f51e2a9397072a5b233f21447/ItalianHolidays.ics\",
        \"color\": \"#00E0E0\",
        \"name\": \"Festività italiane\"
        }
        ]
        }
        }',
        '{
        \"module\": \"calendar\",
        \"position\": \"top_left\",
        \"config\": {
        \"showLocation\": true,
        \"wrapEvents\": true,
        \"wrapLocationEvents\": true,
        \"fetchInterval\": 1000,
        \"displayRepeatingCountTitle\": false,
        \"timeFormat\": \"relative\",
        \"getRelative\": 1,
        \"urgency\": 0,
        \"calendars\": [
        {
        \"url\": \"https://gist.githubusercontent.com/AndreaGrandieri/22d4ee01b5e78990d88c042cdf55591a/raw/96cbe4e867bc507f51e2a9397072a5b233f21447/ItalianHolidays.ics\",
        \"color\": \"#00E0E0\",
        \"name\": \"Festività italiane\"
        }
        ]
        }
        }'),
        ('MMM-MD', 1, 8,
        '{
        \"module\": \"MMM-MD\",
        \"position\": \"center\",
        \"config\": {
        }
        }',
        '{
        \"module\": \"MMM-MD\",
        \"position\": \"center\",
        \"config\": {
        }
        }'),
        ('MMM-Screencast', 1, 9, 
        '{
        \"module\": \"MMM-Screencast\",
        \"position\": \"bottom_right\", 
        \"config\": {
        \"position\": \"center\",
        \"height\": 600,
        \"width\": 1000,
        \"castName\": \"MagicMirror-GBM-cast\"
        }
        }', 
        '{
        \"module\": \"MMM-Screencast\",
        \"position\": \"bottom_right\", 
        \"config\": {
        \"position\": \"center\",
        \"height\": 600,
        \"width\": 1000,
        \"castName\": \"MagicMirror-GBM-cast\"
        }
        }'),
        ('MMM-Mail', 0, 10,
        '{
        \"module\": \"MMM-Mail\",
        \"position\": \"bottom_left\",
        \"header\": \"Email\",
        \"config\": {
        \"user\": \"YOUR_EMAIL_ADDRESS_HERE\",
        \"pass\": \"YOUR_EMAIL_PASSWORD_HERE\",
        \"host\": \"imap.gmail.com\",
        \"port\": 993,
        \"numberOfEmails\": 5,
        \"fade\": true,
        \"subjectlength\": 50
        }
        }',
        '{
        \"module\": \"MMM-Mail\",
        \"position\": \"bottom_left\",
        \"header\": \"Email\",
        \"config\": {
        \"user\": \"YOUR_EMAIL_ADDRESS_HERE\",
        \"pass\": \"YOUR_EMAIL_PASSWORD_HERE\",
        \"host\": \"imap.gmail.com\",
        \"port\": 993,
        \"numberOfEmails\": 5,
        \"fade\": true,
        \"subjectlength\": 50
        }
        }'),
        ('MMM-Online-State', 1, 11, 
        '{
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
        }', 
        '{
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
        }'),
        ('MMM-ip', 1, 12, 
        '{
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
        }', 
        '{
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
        }'),
        ('MMM-PIR-Sensor', 1, 13,
        '{
        \"module\": \"MMM-PIR-Sensor\",
        \"position\": \"bottom_right\",
        \"config\": {
        \"sensorPin\": 17,
        \"powerSaving\": true,
        \"powerSavingDelay\": 900,
        \"powerSavingNotification\": false,
        \"powerSavingMessage\": \"Attivazione modalità sospensione...\",
        \"preventHDMITimeout\": 5,
        \"presenceIndicatorColor\": \"white\",
        \"runSimulator\": false
        }
        }',
        '{
        \"module\": \"MMM-PIR-Sensor\",
        \"position\": \"bottom_right\",
        \"config\": {
        \"sensorPin\": 17,
        \"powerSaving\": true,
        \"powerSavingDelay\": 900,
        \"powerSavingNotification\": false,
        \"powerSavingMessage\": \"Attivazione modalità sospensione...\",
        \"preventHDMITimeout\": 5,
        \"presenceIndicatorColor\": \"white\",
        \"runSimulator\": false
        }
        }');
    ```

5. Inserimento record default per la tabella `globals`
   Conteggio record: 12

    ```sql
    INSERT INTO globals (NomeGlobale, JsonFragment, JsonStableFragment)
    VALUES
        ('address',
        '\"localhost\"',
        '\"localhost\"'),
        ('port', 
        '8080', 
        '8080'),
        ('basePath', 
        '\"/\"', 
        '\"/\"'),
        ('ipWhitelist', 
        '[
        \"127.0.0.1\",
        \"::ffff:127.0.0.1\",
        \"::1\"
        ]', 
        '[
        \"127.0.0.1\",
        \"::ffff:127.0.0.1\",
        \"::1\"
        ]'),
        ('useHttps', 
        'false', 
        'false'),
        ('httpsPrivateKey', 
        '\"\"', 
        '\"\"'),
        ('httpsCertificate', 
        '\"\"', 
        '\"\"'),
        ('language', 
        '\"en\"', 
        '\"en\"'),
        ('logLevel', 
        '[
        \"INFO\",
        \"LOG\",
        \"WARN\",
        \"ERROR\"
        ]', 
        '[
        \"INFO\",
        \"LOG\",
        \"WARN\",
        \"ERROR\"
        ]'),
        ('timeFormat', 
        '24', 
        '24'),
        ('units', 
        '\"metric\"', 
        '\"metric\"'),
        ('serverOnly', 
        'false', 
        'false');
    ```

MagicMirror-GBM
