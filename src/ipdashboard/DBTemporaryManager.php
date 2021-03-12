<?php

// Connette al DB locale
$db = new SQLite3("modules.sqlite", SQLITE3_OPEN_READWRITE);

// Crea tabella "modules"
/*
$db->query('CREATE TABLE modules (
    NomeModulo TEXT NOT NULL,
    Active INTEGER NOT NULL,
    JsonFragment TEXT NOT NULL,
    PRIMARY KEY (NomeModulo));');
*/

// Insersco modulo "prova1" nella tabella "modules"
/*
$db->query('INSERT INTO modules (
    NomeModulo, Active, JsonFragment) VALUES (
    "prova1", 1, "JSON_DATA_HERE");');
*/

$results = $db->query('SELECT NomeModulo, Active, JsonFragment FROM modules');

$results->fetchArray(SQLITE3_ASSOC);

var_dump($results);
