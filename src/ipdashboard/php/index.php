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

    <!-- Tabella delle scelte -->
    <table style="width:60%">
        <tr>
            <th>Opzione</th>
            <th>Descrizione</th>
        </tr>
        <tr>
            <td><a href="moduliSelector.php">Moduli Selector</a></td>
            <td>Modifica i moduli in attività per il MagicMirror.</td>
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
