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
$hardURL = "https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSnRFbV96Q19xck1saTZ0OEE_ZT1HUGRWQTY/root/content";
$fileName = "../settings.sqlite";

if (file_put_contents($fileName, file_get_contents($hardURL))) {
    setSessionVariable("statusPHP", "Ripristino Database riuscito.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
} else {
    setSessionVariable("statusPHP", "Ripristino Database NON riuscito. Ref: <a href='https://github.com/AndreaGrandieri/MagicMirror-GBM/blob/mirror/stable.sqlite?raw=true'>https://github.com/AndreaGrandieri/MagicMirror-GBM/blob/mirror/stable.sqlite?raw=true</a>");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
