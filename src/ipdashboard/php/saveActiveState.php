<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

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

if (!test_input_valid_post_isset("index")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

if (!test_input_valid_post("jsonContent")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

$codeJson = ($_POST["code-json"]);
$codeJsonHeader = ($_POST["code-json-header"]);
$index = test_input($_POST["index"]);
$jsonContent = ($_POST["jsonContent"]);

$jsonParsed = json_decode($jsonContent, true);
$jsonParsed["config"]["modules"][$index] = json_decode($codeJsonHeader, true) + json_decode($codeJson, true);

// $jsonContent contiene il payload JSON completo con gli aggiornamenti
// prelevati dall'editor (codemirror)
$jsonContent = json_encode($jsonParsed, JSON_PRETTY_PRINT);

// Salva il contenuto di $jsonContent nel file di configurazione
// globale config.json
$file = fopen("../../config/config.json", "w") or die("Unable to use 'config.json'");
fwrite($file, $jsonContent);
fclose($file);

setSessionVariable("statusPHP", "Salvataggio effettuato con successo.");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=moduloSettings.php?index=$index&ms=300");
die;

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
