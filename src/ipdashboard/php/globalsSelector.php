<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

// Compilazione dinamica tabella dei moduli
// sulla base di "settings.sqlite"

// Connette al DB locale
try {
    $db = new SQLite3("../settings.sqlite", SQLITE3_OPEN_READWRITE);
} catch (Exception $e) {
    setSessionVariable("statusPHP", "Unable to query database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$dynTable = "
<table style='width:60%'>
<tr>
    <th>Nome Globale</th>
</tr>
";

// Interrogo tabella "globals"
$results = $db->query("SELECT NomeGlobale FROM globals ORDER BY NomeGlobale");
if (gettype($results) !== "boolean") {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $nomeGlobale = $row["NomeGlobale"];
        $dynTable .= "
            <tr>
            <td><a href='globalSettings.php?nomeGlobale=$nomeGlobale'>$nomeGlobale</a></td>
            </tr>
    ";
    }
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$dynTable .= "</table>";

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
    <title>Globals Selector</title>
</head>

<body>

    <h1>Globals Selector</h1>

    <div>
        <?php
        echo $dynTable;
        ?>
    </div>

    <br>
    <a href="index.php">Home Page</a>

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
