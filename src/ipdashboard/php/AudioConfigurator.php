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

    Inserisci le informazioni qui di seguito richieste:
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
                array_push($countrycodeArray, $csvResult);
            }
            fclose($csvFile);

            // Salvo in sessione
            setSessionVariable("countrycodeArray", $countrycodeArray);
            ?>
        </select>

        <input type="submit" id="submit" name="submit" value="SALVA">
    </form>

    <br>
    <hr>
    <br>



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
