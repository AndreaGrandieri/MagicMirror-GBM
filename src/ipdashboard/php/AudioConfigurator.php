<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

// Ottengo "statusPHP"
$statusPHP = readSessionVariable("statusPHP");

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuratore Audio</title>
</head>

<body>
    <h1>Configuratore Audio</h1>

    Da qui puoi modificare le impostazioni relative alla configurazione
    dei dispositivi di output audio per il MagicMirror.<br>
    Solitamente non dovresti avere la necessità di modificare questi parametri.<br>

    <br>

    Inserisci le informazioni qui di seguito richieste:
    <form action="doAudioConfigurator.php" method="POST">
        Dispositivo di output audio: 
        <select name="dispositivioutputaudio" id="dispositivioutputaudio">
            <option value="Jack 3.5mm">Jack 3.5mm</option>
            <option value="HDMI">HDMI</option>
            <option value="USB">USB</option>
        </select>

        <input type="submit" id="submit" name="submit" value="SALVA">
    </form>

    <br>
    <a href="index.php">Home Page</a><br><br>

    <?php
    echo "
    <br><br>
    <div id='statusJS'></div>
    <br>
    <div id='status'>$statusPHP</div>
    "
    ?>
</body>

</html>
