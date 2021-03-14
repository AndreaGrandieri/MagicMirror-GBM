<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

// Connette al DB locale
try {
    $db = new SQLite3("../settings.sqlite", SQLITE3_OPEN_READWRITE);
} catch (Exception $e) {
    setSessionVariable("statusPHP", "Unable to query database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

////////////////////////////////////////////////////////////////////////////////

// Per definizione, il wrapper è "{}"
$wrapper = "{";

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// Compilo $jsonContentGlobals
// Interrogo tabella "globals"
$results = $db->query("SELECT NomeGlobale, JsonFragment FROM globals ORDER BY NomeGlobale");

// Per definizione, le proprietà globali sono contenute al più
// esterno livello di wrappering, cioè il wrapper stesso
$jsonContentGlobals = "";

if (gettype($results) !== "boolean") {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {

        $jsonContentGlobals .= json_encode($row["NomeGlobale"]) . ": " . $row["JsonFragment"] . ",";
    }
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// Compilo $jsonContentModules
// Interrogo tabella "modules"
$results = $db->query("SELECT JsonFragment FROM modules WHERE Active = 1 ORDER BY RenderIndex");

// Per definizione, i moduli sono contenuti in un array, identificato da "modules".
// L'identificativo "modules", per definizione, è contenuto al più esterno livello di wrappering, 
// cioè il wrapper stesso
$jsonContentModules = "\"modules\": [";
$modulesCounter = 0;

if (gettype($results) !== "boolean") {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $jsonContentModules .= $row["JsonFragment"] . ",";
        $modulesCounter++;
    }
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

if ($modulesCounter > 0) {
    $jsonContentModules = substr($jsonContentModules, 0, strlen($jsonContentModules) - 1);
}

$wrapper .= $jsonContentGlobals .= $jsonContentModules . "]" . "}";

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// Apro file di destinazione config.js
$file = fopen("../../config/config.js", "w");
$paylaod = "var config = JSON.parse(`$wrapper`); if (typeof module !== \"undefined\") { module.exports = config; }";
fwrite($file, $paylaod);
fclose($file);

setSessionVariable("statusPHP", "Compilazione effettuata con successo. <b>Ora le modifiche sono effettive e visibili!</b>");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=index.php&ms=300");
die;
