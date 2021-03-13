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
$results = $db->query("SELECT JsonFragment FROM modules ORDER BY RenderIndex");

// Per definizione, i moduli sono contenuti in un array, identificato da "modules".
// L'identificativo "modules", per definizione, è contenuto al più esterno livello di wrappering, 
// cioè il wrapper stesso
$jsonContentModules = "\"modules\": [";

if (gettype($results) !== "boolean") {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {

        $jsonContentModules .= $row["JsonFragment"] . ",";
    }
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$wrapper .= $jsonContentGlobals .= $jsonContentModules . "]" . "}";

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

echo $wrapper;
