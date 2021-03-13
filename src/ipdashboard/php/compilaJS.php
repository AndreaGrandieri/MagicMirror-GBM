<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

if (!test_input_valid_post_isset("wrapper")) {
    setSessionVariable("statusPHP", "Errore durante la compilazione. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    // header("location: redirect.php?target=index.php&ms=300");
    // die;
}

$wrapper = ($_POST["wrapper"]);

var_dump($wrapper);

// Apro file di destinazione config.js
$file = fopen("../../config/config2.js", "w");

$paylaod = "var config = ";

$paylaod .= $wrapper . ";";

$paylaod .= 'if (typeof module !== "undefined") { module.exports = config; }';

fwrite($file, $paylaod);

fclose($file);

echo "END";
