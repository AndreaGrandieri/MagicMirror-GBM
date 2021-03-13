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

/*
$dbTester = new SQLite3("tester.sqlite", SQLITE3_OPEN_READWRITE);
*/

// Crea tabella "modules" (OK)
/*
$result = $db->query("CREATE TABLE modules (
    NomeModulo TEXT NOT NULL PRIMARY KEY,
    Active INTEGER NOT NULL,
    RenderIndex INTEGER NOT NULL UNIQUE,
    JsonFragment TEXT NOT NULL,
    JsonStableFragment TEXT NOT NULL
    );");
*/

// Crea tabella "globals" (OK)
/*
$result = $db->query("CREATE TABLE globals (
    NomeGlobale TEXT NOT NULL PRIMARY KEY,
    JsonFragment TEXT NOT NULL,
    JsonStableFragment TEXT NOT NULL
    );");
*/

// Inserimento bulk dei moduli default (OK)
/*
// Parsing di config.json
$filePath = "../config/config.json";

$file = fopen($filePath, "r") or die("Unable to parse 'config.json'");
$jsonContent = fread($file, filesize($filePath));
fclose($file);

$jsonParsed = json_decode($jsonContent, true);
$jsonParsedModuli = $jsonParsed["config"]["modules"];

for ($i = 0; $i < count($jsonParsedModuli); $i++) {
    $jsonContentModulo = json_encode($jsonParsed["config"]["modules"][$i]);
    $nomeModulo = $jsonParsed["config"]["modules"][$i]["module"];
    $db->query("INSERT INTO modules (
    NomeModulo, Active, RenderIndex, JsonFragment, JsonStableFragment) VALUES (
        '$nomeModulo', 1, '$i', '$jsonContentModulo', '$jsonContentModulo' 
    );");
}
*/

// $db->exec("DELETE FROM globals");

// Inserimento bulk delle globali default (OK)
/*
$content1 = array(
    "address",
    "port",
    "basePath",
    "ipWhitelist",
    "useHttps",
    "httpsPrivateKey",
    "httpsCertificate",
    "language",
    "logLevel",
    "timeFormat",
    "units",
    "serverOnly"
);


$content2 = array(
    '"localhost"',
    '8080',
    '"/"',
    '[
        "127.0.0.1",
        "::ffff:127.0.0.1",
        "::1"
    ]',
    'false',
    '""',
    '""',
    '"en"',
    '[
        "INFO",
        "LOG",
        "WARN",
        "ERROR"
    ]',
    '24',
    '"metric"',
    'false'
);

for ($i = 0; $i < count($content1); $i++) {

    $db->query("INSERT INTO globals (
    NomeGlobale, JsonFragment, JsonStableFragment) VALUES (
        '$content1[$i]', '$content2[$i]', '$content2[$i]' 
    );");
}
*/

// $db->query("UPDATE globals SET NomeGlobale = 'general' WHERE NomeGlobale = 'config'");

// Interrogo tabella "modules" (OK)
/*
$results = $db->query("SELECT * FROM modules");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    var_dump($row);
}
*/

// Interrogo tabella "globals" (OK)
$results = $db->query("SELECT * FROM globals");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    var_dump($row);
}
