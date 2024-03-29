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

if (!test_input_valid_post("SSID")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

if (!test_input_valid_post("pssw")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

if (!test_input_valid_post_isset("countrycode")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$countrycode = ($_POST["countrycode"]);

if (!in_array($countrycode, readSessionVariable("countrycodeArray"))) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;    
}

$SSID = ($_POST["SSID"]);
$pssw = ($_POST["pssw"]);

// Eseguo configurazione WIFI
// (aka) Scrivo $txt nel file $file ("/etc/wpa_supplicant/wpa_supplicant.conf")
// Esso rappresenta il file utilizzato dal Raspberry Pi per salvare
// le impostazioni di connettività
$file = fopen("/etc/wpa_supplicant/wpa_supplicant.conf", "w");

// Controllo stato di apertura file (in scrittura)
if (!$file) {
    setSessionVariable("statusPHP", "Impossibile salvare la configurazione WIFI. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;    
}

// Preparo testo da scrivere
/*
- preambolo (prime 2 righe): obbligatorie statiche
- parametri di country (riga 3): obbligatorio dinamico
compilato con i dati in input (dall'utente)
- parametri di rete (oggetto "network"): obbligatorio dinamico
compilato con i dati in input (dall'utente)
*/
$txt = "ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev
update_config=1
country=$countrycode
network={
    ssid=\"$SSID\"
    psk=\"$pssw\"
}
";

// Scrivo
if (!fwrite($file, $txt))
{
    setSessionVariable("statusPHP", "Impossibile salvare la configurazione WIFI. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;       
}

// Chiudo risorsa (file)
fclose($file);

setSessionVariable("statusPHP", "Salvataggio configurazione WIFI completato.");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=index.php&ms=300");
die;

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
