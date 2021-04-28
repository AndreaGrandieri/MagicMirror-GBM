<?php
require "../utils/utils.php";

/*
Regole generali per interazione con DB SQLite3
- $db->query() se la query produce dei risultati (e.g.: SELECT)
- $db->exec() se la query NON produce dei risultati (e.g.: UPDATE)
*/

// Gestione sessione
startNewSessionCheck();

// Ottengo "statusPHP"
$statusPHP = readSessionVariable("statusPHP");

// Controllo se esiste DB settings (file: "settings.sqlite").
// Se non esiste, lo recupero attraverso l'uso di "doRipristinaDatabaseBackdoor.php"
if (!file_exists("../settings.sqlite")) {
    setSessionVariable("statusPHP", "Inizializzazione Database...");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=doRipristinaDatabaseBackdoor.php&ms=300");
    die;
}

// Ottiene nome del branch checked out (git)
$output = array();
exec("git symbolic-ref HEAD --short", $output);

$branch = $output[0];

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
?>

<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    @import url(../css/style.css);
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagicMirror-GBM IP Dashboard</title>
</head>

<body>

    <h1>MagicMirror-GBM IP Dashboard</h1>

    <p>
        Checked out branch:
        <span style="color: darkviolet"><b><?php echo $branch ?></b></span>
    </p>

    <!-- Tabella delle scelte -->
    <table style=" width:60%">
        <tr>
            <th>Opzione</th>
            <th>Descrizione</th>
        </tr>
        <tr>
            <td><a href="moduliSelector.php">Moduli Selector</a></td>
            <td>Modifica i moduli in attività per il MagicMirror.</td>
        </tr>
        <tr>
            <td><a href="WIFIConfigurator.php">Configuratore WIFI</a></td>
            <td>Configura la connettivà WIFI (alla rete) per il MagicMirror.</td>
        </tr>
        <tr>
            <td><a href="AudioConfigurator.php">Configuratore Audio</a></td>
            <td>Configura l'output audio per il MagicMirror.</td>
        </tr>
        <tr>
            <td><a href="globalsSelector.php">Globals Selector</a></td>
            <td>Modifica le globali in attività per il MagicMirror.</td>
        </tr>
        <tr>
            <td><a href="aggiornamentoSoftware.php">Aggiornamento Software</a></td>
            <td>Aggiorna il software del MagicMirror.</td>
        </tr>
        <tr>
            <td><a href="doReboot.php">Riavvia MagicMirror</a></td>
            <td>
            Riavvia il MagicMirror.<br>
            Operazione necessaria dopo:
            <ul>
                <li>
                Compilazione (necessaria dopo):
                <ul>
                    <li>Modifica moduli</li>
                    <li>Modifica globali</li>
                    <li>Ripristino Database</li>
                </ul>
                </li>
                <li>Configurazione WIFI</li>
                <li>Configurazione Audio</li>
                <li>aggiornamento Software</li>
            </ul>
            </td>
        </tr>
        <tr>
            <td><a href="ripristinaDatabase.php">Ripristina Database</a></td>
            <td>Ripristina il Database ad uno stato stabile di default.</td>
        </tr>
        <tr>
            <td><a href="compila.php">Compila</a></td>
            <td>Compila lo stato del Database, <b>rendendo effettive le modifiche (che quindi saranno visibili nel MagicMirror).</b></td>
        </tr>
    </table>

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
