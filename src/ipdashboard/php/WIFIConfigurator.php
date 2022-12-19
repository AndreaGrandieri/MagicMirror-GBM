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
    <title>Configuratore WIFI</title>
</head>

<body>
    <h1>Configuratore WIFI</h1>

    Da qui puoi modificare le impostazioni relative alla configurazione
    della connettivà WIFI (alla rete) per il MagicMirror.<br>
    Se sei qui durante la (prima) fase di setup, allora sarai collegato alla
    rete in modalità cablata (utilizzando un cavo di rete (ethernet)).<br>
    Una volta completata la procedura qui di seguito riportata, potrai utilizzare
    il tuo MagicMirror unicamente via rete wireless (WIFI), potendo disconnettere
    il cavo di rete (ethernet).<br>

    Inserisci le informazioni qui di seguito richieste:
    <p style="color: red">
        <b>CaSe SeNsItIvE</b>
    </p>

    <form action="doWIFIConfigurator.php" method="POST">
        SSID: <input type="text" id="SSID" name="SSID"><br><br>
        Password: <input type="password" id="pssw" name="pssw"><br><br>
        Country Code: 
        <select name="countrycode" id="countrycode">
            <?php
            // Parsing di "iso3166-1_country-code.csv"
            $csvFile = fopen("../assets/iso3166-1_country-code.csv", "r");
            fgetcsv($csvFile);
            $countrycodeArray = array();
            while ($csvResult = fgetcsv($csvFile)) {
                echo "<option value='$csvResult[1]'>$csvResult[0] ($csvResult[1])</option>";
                array_push($countrycodeArray, $csvResult[1]);
            }
            fclose($csvFile);

            // Salvo in sessione
            setSessionVariable("countrycodeArray", $countrycodeArray);
            ?>
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
