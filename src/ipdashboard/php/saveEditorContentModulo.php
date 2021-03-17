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

if (!test_input_valid_post("code-json-header")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

if (!test_input_valid_post("code-json")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

if (!test_input_valid_post("nomeModulo")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

$codeJson = ($_POST["code-json"]);
$codeJsonHeader = ($_POST["code-json-header"]);
$nomeModulo = ($_POST["nomeModulo"]);

if (gettype(json_decode($codeJson, true)) !== "array") {
    setSessionVariable("statusPHP", "Rilevato frammento JSON non valido. Rilevato RFC 7159, qui non applicabile. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduloSettings.php?nomeModulo=$nomeModulo&ms=300");
    die;
}

// $jsonContent contiene il payload JSON per il frammento JSON interessato con gli aggiornamenti
// prelevati dall'editor (codemirror)
$jsonContent = json_encode(json_decode($codeJsonHeader, true) + json_decode($codeJson, true), JSON_PRETTY_PRINT);

// Salva il contenuto di $jsonContent nel file database
$results = $db->exec("UPDATE modules
            SET JsonFragment = '$jsonContent'
            WHERE NomeModulo = '$nomeModulo'");

if ($results) {
    setSessionVariable("statusPHP", "Salvataggio effettuato con successo.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduloSettings.php?nomeModulo=$nomeModulo&ms=300");
    die;
} else {
    setSessionVariable("statusPHP", "Error while updating the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduloSettings.php?nomeModulo=$nomeModulo&ms=300");
    die;
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
