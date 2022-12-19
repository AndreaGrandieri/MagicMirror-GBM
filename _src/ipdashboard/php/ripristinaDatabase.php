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
    <title>Ripristina Database</title>
</head>

<body>
    <h1>Ripristina Database</h1>

    La procedura di ripristino database consiste nel recupero di un database
    in stato stabile garantito. Questo, ovviamente, significa perdere
    tutte le personalizzazioni effettuate nel database corrente.<br>
    Questa procedura è essenziale nel caso in cui il database corrente
    risulti danneggiato e, di conseguenza, inutilizzabile.

    <p style="color: red">
        <b>Questa procedura è irreversibile!</b>
    </p>

    <form action="doRipristinaDatabase.php" method="POST">
        <input type="submit" id="submit" name="submit" value="RIPRISTINA">
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
