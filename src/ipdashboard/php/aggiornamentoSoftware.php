<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

// Ottengo "statusPHP"
$statusPHP = readSessionVariable("statusPHP");

// Ottiene nome del branch checked out (git)
$output = array();
exec("git symbolic-ref HEAD --short", $output);

$branch = $output[0];

// Controllo l'esistenza del branch in remoto, altrimenti
// non ha senso parlare di aggiornamento
$output = array();
exec("git ls-remote --heads origin $branch", $output);

if (!array_key_exists(0, $output)) {
    // Il branch checked out è SOLO LOCALE
    // Discussione di aggiornamenti non possibile in questo contesto
    $isScopeValid = false;
} else {
    $isScopeValid = true;

    // Controllo la presenza di aggiornamenti software
    // (aka) Controlla il numero di commits di cui il "checked_out_branch"
    // è behind in confronto a "origin/checked_out_branch"
    $output = array();
    exec("git fetch");
    exec("git rev-list --left-only --count origin/$branch...$branch", $output);

    if ($output[0] == 0) {
        // Nessun aggiornamento disponibile
        $button = '<input type="submit" id="submit" name="submit" value="AGGIORNA" disabled>';
    } else {
        // Aggiornamento disponibile
        $button = '<input type="submit" id="submit" name="submit" value="AGGIORNA">';
    }
    if ($output[0] == 1) {
        $commits = "$output[0] commit";
    } else {
        $commits = "$output[0] commits";
    }
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiornamento Software</title>
</head>

<body>
    <h1>Aggiorna Software</h1>

    La procedura di aggiornamento del software consiste nello scaricamento
    del software del MagicMirror aggiornato all'ultima versione, se la versione
    correntemente installata risulta datata.

    <br>

    <?php
    if ($isScopeValid) {
        echo "<br>
    <div id=\"commitsCounter\">
        <span style=\"color: blue\"><b>remote (origin/$branch)</b></span> è avanti di
        <span style=\"color: green\"><b>$commits</b></span>
        in confronto a
        <span style=\"color: darkviolet\"><b>local ($branch)</b></span>.
    </div>

    <p style=\"color: red\">
        <b>Durante l'aggiornamento software, NON chiudere la finestra del browser! Al termine
            della procedura si verrà riportati alla schermata principale automaticamente.</b>
    </p>

    <form action=\"doAggiornamentoSoftware.php\" method=\"POST\">
        <div id=\"submitdiv\">
            $button
        </div>
    </form>";
    } else {
        echo "<p><span style=\"color: darkviolet\"><b>local ($branch)</b></span> non ha
        un riferimento remoto come fonte degli aggiornamenti. Dunque, non è possibile procedere.
        Effettuare il checkout di un altro <span style=\"color: darkviolet\"><b>local</b></span> che abbia
        un riferimento remoto.</p>";
    }
    ?>

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
