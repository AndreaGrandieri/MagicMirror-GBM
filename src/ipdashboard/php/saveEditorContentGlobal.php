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

if (!test_input_valid_post("code-json")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=globalsSelector.php&ms=300");
    die;
}

if (!test_input_valid_post("nomeGlobale")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=globalsSelector.php&ms=300");
    die;
}

// $codeJson contiene il payload JSON per il frammento JSON interessato con gli aggiornamenti
// prelevati dall'editor (codemirror)
$codeJson = ($_POST["code-json"]);
$nomeGlobale = ($_POST["nomeGlobale"]);

// Salva il contenuto di $codeJson nel file database
$results = $db->exec("UPDATE globals
            SET JsonFragment = '$codeJson'
            WHERE NomeGlobale = '$nomeGlobale'");

if ($results) {
    setSessionVariable("statusPHP", "Salvataggio effettuato con successo.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=globalSettings.php?nomeGlobale=$nomeGlobale&ms=300");
    die;
} else {
    setSessionVariable("statusPHP", "Error while updating the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=globalSettings.php?nomeGlobale=$nomeGlobale&ms=300");
    die;
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
