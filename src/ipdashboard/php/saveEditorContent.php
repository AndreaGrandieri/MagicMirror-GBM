<?php
require "../utils/utils.php";

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
$index = test_input($_POST["index"]);
$jsonContent = ($_POST["jsonContent"]);

$jsonParsed = json_decode($jsonContent, true);
$jsonParsed["config"]["modules"][$index] = json_decode($codeJson, true);

// $jsonContent contiene il payload JSON completo con gli aggiornamenti
// prelevati dall'editor (codemirror)
$jsonContent = json_encode($jsonParsed);
