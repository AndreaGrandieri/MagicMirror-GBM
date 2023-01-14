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

// analogoverride
if (!test_input_valid_post("analogoverride")) {
    // verified
    $analogoverride = "alsa_output.platform-bcm2835_audio.analog-stereo";
} else {
    $analogoverride = ($_POST["analogoverride"]);
}

// digitaloverride
if (!test_input_valid_post("digitaloverride")) {
    // verified
    $digitaloverride = "alsa_output.platform-bcm2835_audio.digital-stereo";
} else {
    $digitaloverride = ($_POST["digitaloverride"]);
}

// usboverride
if (!test_input_valid_post("usboverride")) {
    // unverified
    $usboverride = "2";
} else {
    $usboverride = ($_POST["usboverride"]);
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
$txt = "# /etc/default/raspotify -- Arguments/configuration for librespot

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

$txt = null;
$file = null;

////////////////////////////////////////////////////////////////

// Sezione OS
// (aka) Scrivo $txt nel file ("/etc/pulse/default.pa")
// Esso rappresenta il file utilizzato dal servizio pulseaudio
// per leggere i parametri di configurazione
$file = fopen("/etc/pulse/default.pa", "w");

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
        $optionOS = $analogoverride;
        break;

    case "HDMI":
        // verified
        $optionOS = $digitaloverride;
        break;

    case "USB":
        // unverified
        $optionOS = $usboverride;
        break;
}

// Preparo testo da scrivere
/*
- static: diverso testo immutabile
- injections: diverso testo dinamico nel testo immutabile
*/
$txt = "#!/usr/bin/pulseaudio -nF
#
# This file is part of PulseAudio.
#
# PulseAudio is free software; you can redistribute it and/or modify it
# under the terms of the GNU Lesser General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# PulseAudio is distributed in the hope that it will be useful, but
# WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
# General Public License for more details.
#
# You should have received a copy of the GNU Lesser General Public License
# along with PulseAudio; if not, see <http://www.gnu.org/licenses/>.

# This startup script is used only if PulseAudio is started per-user
# (i.e. not in system mode)

.fail

### Automatically restore the volume of streams and devices
load-module module-device-restore
load-module module-stream-restore restore_device=false
load-module module-card-restore

### Automatically augment property information from .desktop files
### stored in /usr/share/application
load-module module-augment-properties

### Should be after module-*-restore but before module-*-detect
load-module module-switch-on-port-available

### Load audio drivers statically
### (it's probably better to not load these drivers manually, but instead
### use module-udev-detect -- see below -- for doing this automatically)
#load-module module-alsa-sink
#load-module module-alsa-source device=hw:1,0
#load-module module-oss device=\"/dev/dsp\" sink_name=output source_name=input
#load-module module-oss-mmap device=\"/dev/dsp\" sink_name=output source_name=input
#load-module module-null-sink
#load-module module-pipe-sink

### Automatically load driver modules depending on the hardware available
.ifexists module-udev-detect.so
load-module module-udev-detect tsched=0
.else
### Use the static hardware detection module (for systems that lack udev support)
load-module module-detect
.endif

### Automatically connect sink and source if JACK server is present
.ifexists module-jackdbus-detect.so
.nofail
load-module module-jackdbus-detect channels=2
.fail
.endif

### Automatically load driver modules for Bluetooth hardware
.ifexists module-bluetooth-policy.so
load-module module-bluetooth-policy
.endif

.ifexists module-bluetooth-discover.so
load-module module-bluetooth-discover autodetect_mtu=yes
.endif

### Load several protocols
.ifexists module-esound-protocol-unix.so
load-module module-esound-protocol-unix
.endif
load-module module-native-protocol-unix

### Network access (may be configured with paprefs, so leave this commented
### here if you plan to use paprefs)
#load-module module-esound-protocol-tcp
#load-module module-native-protocol-tcp
#load-module module-zeroconf-publish

### Load the RTP receiver module (also configured via paprefs, see above)
#load-module module-rtp-recv

### Load the RTP sender module (also configured via paprefs, see above)
#load-module module-null-sink sink_name=rtp format=s16be channels=2 rate=44100 sink_properties=\"device.description='RTP Multicast Sink'\"
#load-module module-rtp-send source=rtp.monitor

### Load additional modules from GSettings. This can be configured with the paprefs tool.
### Please keep in mind that the modules configured by paprefs might conflict with manually
### loaded modules.
.ifexists module-gsettings.so
.nofail
load-module module-gsettings
.fail
.endif


### Automatically restore the default sink/source when changed by the user
### during runtime
### NOTE: This should be loaded as early as possible so that subsequent modules
### that look up the default sink/source get the right value
load-module module-default-device-restore

### Automatically move streams to the default sink if the sink they are
### connected to dies, similar for sources
load-module module-rescue-streams

### Make sure we always have a sink around, even if it is a null sink.
load-module module-always-sink

### Honour intended role device property
load-module module-intended-roles

### Automatically suspend sinks/sources that become idle for too long
load-module module-suspend-on-idle

### If autoexit on idle is enabled we want to make sure we only quit
### when no local session needs us anymore.
.ifexists module-console-kit.so
load-module module-console-kit
.endif
.ifexists module-systemd-login.so
load-module module-systemd-login
.endif

### Enable positioned event sounds
load-module module-position-event-sounds

### Cork music/video streams when a phone stream is active
load-module module-role-cork

### Modules to allow autoloading of filters (such as echo cancellation)
### on demand. module-filter-heuristics tries to determine what filters
### make sense, and module-filter-apply does the heavy-lifting of
### loading modules and rerouting streams.
load-module module-filter-heuristics
load-module module-filter-apply

### Make some devices default
set-default-sink $optionOS
#set-default-source input
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

setSessionVariable("statusPHP", "Salvataggio configurazione audio completato.");
setSessionVariable("statusPHPRedirect", null);
header("location: redirect.php?target=index.php&ms=300");
die;

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
