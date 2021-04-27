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

if (!test_input_valid_post_isset("dispositivioutputaudio")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$dispositivioutputaudio = ($_POST["dispositivioutputaudio"]);

if (!in_array($dispositivioutputaudio, array("Jack 3.5mm", "HDMI", "USB"))) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;    
}

// Eseguo configurazione audio
// Sezione Raspotify
// (aka) Scrivo $txt nel file ("/etc/default/raspotify")
// Esso rappresenta il file utilizzato dal servizio Raspotify
// per leggere i parametri di configurazione
$file = fopen("/etc/default/raspotify", "w");

// Controllo stato di apertura file (in scrittura)
if (!$file) {
    setSessionVariable("statusPHP", "Impossibile salvare la configurazione WIFI. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;    
}

switch ($dispositivioutputaudio) {
    case "Jack 3.5mm":
        // verified
        $optionRaspotify = "--device hw:1";
        break;

    case "HDMI":
        // verified
        $optionRaspotify = "--device hw:0";
        break;

    case "USB":
        // unverified
        $optionRaspotify = "--device hw:2";
        break;
}

// Preparo testo da scrivere
/*
- static: diverso testo immutabile
- injections: diverso testo dinamico nel testo immutabile
*/
$txt = "
# /etc/default/raspotify -- Arguments/configuration for librespot

# Device name on Spotify Connect
DEVICE_NAME=\"MagicMirror-GBM-spotify-cast\"

# The displayed device type in Spotify clients.
# Can be \"unknown\", \"computer\", \"tablet\", \"smartphone\", \"speaker\", \"tv\",
# \"avr\" (Audio/Video Receiver), \"stb\" (Set-Top Box), and \"audiodongle\".
#DEVICE_TYPE=\"speaker\"

# Bitrate, one of 96 (low quality), 160 (default quality), or 320 (high quality)
#BITRATE=\"160\"

# Additional command line arguments for librespot can be set below.
# See `librespot -h` for more info. Make sure whatever arguments you specify
# aren't already covered by other variables in this file. (See the daemon's
# config at `/lib/systemd/system/raspotify.service` for more technical details.)
#
# To make your device visible on Spotify Connect across the Internet add your
# username and password which can be set via \"Set device password\", on your
# account settings, use `--username` and `--password`.
#
# To choose a different output device (ie a USB audio dongle or HDMI audio out),
# use `--device` with something like `--device hw:0,1`. Your mileage may vary.
#
OPTIONS=\"$optionRaspotify\"

# Uncomment to use a cache for downloaded audio files. Cache is disabled by
# default. It's best to leave this as-is if you want to use it, since
# permissions are properly set on the directory `/var/cache/raspotify'.
#CACHE_ARGS=\"--cache /var/cache/raspotify\"

# By default, the volume normalization is enabled, add alternative volume
# arguments here if you'd like, but these should be fine.
#VOLUME_ARGS=\"--enable-volume-normalisation --volume-ctrl linear --initial-volume=100\"

# Backend could be set to pipe here, but it's for very advanced use cases of
# librespot, so you shouldn't need to change this under normal circumstances.
#BACKEND_ARGS=\"--backend alsa\"
";

// Scrivo
if (!fwrite($file, $txt))
{
    setSessionVariable("statusPHP", "Impossibile salvare la configurazione audio. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;       
}

// Chiudo risorsa (file)
fclose($file);

////////////////////////////////////////////////////////////////

// Sezione OS




setSessionVariable("statusPHP", "Salvataggio configurazione audio completato.");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=index.php&ms=300");
die;

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
