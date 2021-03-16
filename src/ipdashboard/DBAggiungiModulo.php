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
$nomeModulo = "QUI_NOME_MODULO";
$renderIndex = "QUI_INTEGER_UNICO";
$jsonContent = 'QUI_FRAMMENTO_JSON';

$db->query("INSERT INTO modules (
    NomeModulo, Active, RenderIndex, JsonFragment, JsonStableFragment) VALUES (
        '$nomeModulo', 1, '$renderIndex', '$jsonContent', '$jsonContent' 
    );");
*/

// Interrogo tabella "modules" (OK)
$results = $db->query("SELECT * FROM modules");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    var_dump($row);
}
