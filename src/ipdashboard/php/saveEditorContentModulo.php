<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

if (!test_input_valid_post("code-md")) {
    var_dump($_POST["code-md"]);
    die;



    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$codeMD = ($_POST["code-md"]);

// Salva il contenuto di $codeMD nel file "../../modules/MMM-MD/public/content.md"
$file = fopen("../../modules/MMM-MD/public/content.md", "w");

// Controllo stato di apertura file (in scrittura)
if (!$file) {
    setSessionVariable("statusPHP", "Impossibile comunicare con lo stream IO. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// Scrivo
if (!fwrite($file, $codeMD)) {
    setSessionVariable("statusPHP", "Impossibile salvare il contenuto dell'Embedded Editor nel file target. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// Chiudo risorsa (file)
fclose($file);

setSessionVariable("statusPHP", "Salvataggio del contenuto dell'Embedded Editor nel file target effettuato con successo.");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=MMM-MD-ContentEditor.php&ms=300");
die;

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
