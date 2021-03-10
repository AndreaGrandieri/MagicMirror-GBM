<?php
function isAssoc(array $arr)
{
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}

// NECESSARI CONTROLLI!
$nomeModulo = $_GET["nomeModulo"];
$index = $_GET["index"];

$filePath = "../../config/config.json";

$file = fopen($filePath, "r") or die("Unable to parse 'config.json'");
$jsonContent = fread($file, filesize($filePath));
$jsonParsed = json_decode($jsonContent, true);
$jsonParsedModulo = $jsonParsed["config"]["modules"][$index];

$dynTable = "
<table style='width:60%'>
<tr>
    <th>Proprietà</th>
    <th>Modifica</th>
</tr>
";

$i = -1;
foreach ($jsonParsedModulo as $nomeProprieta => $valoreProprieta) {
    $i++;

    if ($i == 0) {
        continue;
    }

    switch (gettype($valoreProprieta)) {
        case "string":
            $dynTable .= "
            <tr>
            <td>$nomeProprieta</td>
            <td>$valoreProprieta</td>
        </tr>
    ";
            break;

        case "boolean":
            $dynTable .= "
            <tr>
            <td>$nomeProprieta</td>
            <td>$valoreProprieta</td>
        </tr>
    ";
            break;

        case "integer":
            $dynTable .= "
            <tr>
            <td>$nomeProprieta</td>
            <td>$valoreProprieta</td>
        </tr>
    ";
            break;

        case "double":
            $dynTable .= "
            <tr>
            <td>$nomeProprieta</td>
            <td>$valoreProprieta</td>
        </tr>
    ";
            break;

        case "array":
            if (isAssoc($valoreProprieta)) {
                foreach ($valoreProprieta as $nomeProprieta2 => $valoreProprieta2) {
                    $dynTable .= "
                    <tr>
                        <td>$nomeProprieta2</td>
                        <td>$valoreProprieta2</td>
                    </tr>
                    ";
                }
            } else {
            }
            break;
    }
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
    <title>Modulo Settings</title>
</head>

<body>

    <?php
    echo "<h1>Modulo Settings per $nomeModulo</h1>";
    echo $dynTable;
    ?>

</body>

</html>
