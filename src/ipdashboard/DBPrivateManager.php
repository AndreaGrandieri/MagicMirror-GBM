<?php
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

// Interrogo tabella "modules" (OK)
$results = $db->query("SELECT * FROM modules");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    var_dump($row);
}
