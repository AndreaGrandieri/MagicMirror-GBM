<?php
require "../utils/utils.php";

if (!test_input_valid_post("code-json-header")) {
    die("ERROR");
}

if (!test_input_valid_post("code-json")) {
    die("ERROR");
}

if (!test_input_valid_post("index")) {
    die("ERROR");
}

if (!test_input_valid_post("jsonContent")) {
    die("ERROR");
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
