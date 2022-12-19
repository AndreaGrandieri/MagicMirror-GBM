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
    <th>Nome Modulo</th>
    <th>Attiva / Disattiva</th>
    <th>Indice</th>
</tr>
";

// Interrogo tabella "modules"
$results = $db->query("SELECT NomeModulo, Active, RenderIndex FROM modules ORDER BY RenderIndex");
$results2 = $db->query("SELECT COUNT (*) AS NumRows FROM modules");
if (gettype($results2) !== "boolean") {
    $numRows = $results2->fetchArray(SQLITE3_ASSOC)["NumRows"];
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$indexes = array();
if (gettype($results) !== "boolean") {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $nomeModulo = $row["NomeModulo"];
        $dynTable .= "
            <tr>
            <td>
            <a href='moduloSettings.php?nomeModulo=$nomeModulo'>$nomeModulo</a>
            <input type='checkbox' id='$nomeModulo' name='refOrdineModuli[]' value='$nomeModulo' checked hidden>
            </td>
    ";

        if ($row["Active"]) {
            $dynTable .= "<td><input type='checkbox' id='$nomeModulo' name='attivazione[]' value='$nomeModulo' checked></td>";
        } else {
            $dynTable .= "<td><input type='checkbox' id='$nomeModulo' name='attivazione[]' value='$nomeModulo'></td>";
        }

        $id = $nomeModulo . "RenderIndex";
        $index = $row["RenderIndex"];
        // array_push($indexes, $index);
        $max = $numRows - 1;
        $dynTable .= "<td><input type='number' id='$nomeModulo' name='indici[]' value='$index' min='0' max='$max' required></td></tr>";
    }
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// asort($indexes);
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
    <title>Moduli Selector</title>
</head>

<body>

    <h1>Moduli Selector</h1>

    <div>
        <?php
        echo "<form action='saveActiveState.php' method='POST'>
        $dynTable <br>
        <input type='checkbox' id='invalidationPreventer' name='attivazione[]' value='invalidationPreventer' checked hidden>
        <input type='submit' id='save' name='save' value='SALVA STATO'>
        </form>";
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
