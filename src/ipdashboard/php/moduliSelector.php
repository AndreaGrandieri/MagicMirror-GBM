<?php
// Compilazione dinamica tabella dei moduli
// sulla base di "config.js"

$filePath = "../../config/config.json";

$file = fopen($filePath, "r") or die("Unable to parse 'config.json'");
$jsonContent = fread($file, filesize($filePath));
$jsonParsed = json_decode($jsonContent, true);
$jsonParsedModuli = $jsonParsed["config"]["modules"];

$dynTable = "
<table style='width:60%'>
<tr>
    <th>Nome Modulo</th>
    <th>Attiva / Disattiva</th>
</tr>
";

for ($i = 0; $i < count($jsonParsedModuli); $i++) {
    $nomeModulo = $jsonParsedModuli[$i]["module"];
    $dynTable .= "
            <tr>
            <td><a href='moduloSettings.php?index=$i'>$nomeModulo</a></td>
            <td>'CHECKBOX'</td>
        </tr>
    ";
}

$dynTable .= "</table>"

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
        echo $dynTable;
        ?>
    </div>

</body>

</html>
