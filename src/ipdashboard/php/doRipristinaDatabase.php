<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

if (!test_input_valid_post_isset("submit")) {
    setSessionVariable("statusPHP", "Evento di azione non valido. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// hardcoded URL (garantito immutabile)
$hardURL = "https://github.com/AndreaGrandieri/MagicMirror-GBM/blob/dispenser/stable.sqlite?raw=true";
$fileName = "../settings.sqlite";

if (file_put_contents($fileName, file_get_contents($hardURL))) {
    setSessionVariable("statusPHP", "Ripristino Database riuscito.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
} else {
    setSessionVariable("statusPHP", "Ripristino Database NON riuscito. Ref: <a href='https://github.com/AndreaGrandieri/MagicMirror-GBM/blob/dispenser/stable.sqlite?raw=true'>https://github.com/AndreaGrandieri/MagicMirror-GBM/blob/dispenser/stable.sqlite?raw=true</a>");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
