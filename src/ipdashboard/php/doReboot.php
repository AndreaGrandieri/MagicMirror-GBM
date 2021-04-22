<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

// Ottengo "statusPHP"
$statusPHP = readSessionVariable("statusPHP");

// Riavvio (exec in background)
execInBackground("sudo shutdown -r now");

setSessionVariable("statusPHP", "Comando di riavvio inviato. Il MagicMirror dovrebbe trovarsi in stato di riavvio e l'interfaccia
non sarà disponibile fino al termine del processo.");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=index.php&ms=300");
die;

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
?>
