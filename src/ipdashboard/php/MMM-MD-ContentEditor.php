<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

$file = fopen("../../modules/MMM-MD/public/content.md", "r");

// Controllo stato di apertura file (in lettura)
if (!$file) {
    setSessionVariable("statusPHP", "Impossibile comunicare con lo stream IO. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// Lettura file
$filesUperContent = fread($file, filesize("../../modules/MMM-MD/public/content.md"));

// Chiudo risorsa (file)
fclose($file);

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
    <title>MMM-MD-Content Editor</title>
</head>

<link rel="stylesheet" href="../codemirror-5.59.4/lib/codemirror.css">
<link rel="stylesheet" href="../codemirror-5.59.4/addon/lint/lint.css">
<script src="../codemirror-5.59.4/lib/codemirror.js"></script>
<script src="../codemirror-5.59.4/mode/javascript/javascript.js"></script>
<script src="../codemirror-5.59.4/mode/css/css.js"></script>
<script src="https://unpkg.com/jshint@2.9.6/dist/jshint.js"></script>
<script src="https://unpkg.com/jsonlint@1.6.3/web/jsonlint.js"></script>
<!--
<script src="https://unpkg.com/csslint@1.0.5/dist/csslint.js"></script>
-->
<script src="../codemirror-5.59.4/addon/lint/lint.js"></script>
<script src="../codemirror-5.59.4/addon/lint/javascript-lint.js"></script>
<script src="../codemirror-5.59.4/addon/lint/json-lint.js"></script>
<script src="../utils/utils.js" type="module"></script>
<script src="../utils/editor.js" type="module"></script>

<body>

    <h1>Embedded Editor</h1>

    <form action="saveMMM-MD-ContentEditor.php" method="POST">
        <h4>MD</h4>
        <p>
        <div class="CODE">
            <textarea id="code-md" name="code-md"><?php echo "$filesUperContent\n" ?></textarea>
        </div>
        </p>

        <!-- Bottone per salvataggio modifiche -->
        <div id="submitButton">
            <input type='submit' id='save' name='save' value='SALVA'>
        </div>
    </form>

    <!-- Inizializzatore -->
    <script type="module">
        initModuloSettingsMD();
    </script>

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
