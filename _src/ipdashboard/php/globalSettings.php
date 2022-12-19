<?php
require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

// Connette al DB locale
try {
  $db = new SQLite3("../settings.sqlite", SQLITE3_OPEN_READWRITE);
} catch (Exception $e) {
  setSessionVariable("statusPHP", "Unable to query database.");
  setSessionVariable("statusPHPRedirect", null);
  header("location: redirect.php?target=index.php&ms=300");
  die;
}

if (!test_input_valid_get_isset("nomeGlobale")) {
  setSessionVariable("statusPHP", "Died of test_input_valid_get_isset. \"nomeGlobale\" parameter not found.");
  setSessionVariable("statusPHPRedirect", null);
  header("location: redirect.php?target=index.php&ms=300");
  die;
}

$nomeGlobale = test_input($_GET["nomeGlobale"]);

// Interrogo tabella "modules"
$results = $db->query("SELECT JsonFragment, JsonStableFragment FROM globals WHERE nomeGlobale='$nomeGlobale'");

if (gettype($results) !== "boolean") {
  $row = $results->fetchArray(SQLITE3_ASSOC);

  if (gettype($row) !== "boolean") {
    $jsonParsedGlobale = json_decode($row["JsonFragment"], true);
    $jsonContentGlobale = json_encode($jsonParsedGlobale, JSON_PRETTY_PRINT);

    $jsonParsedGlobaleStable = json_decode($row["JsonStableFragment"], true);
    $jsonContentGlobaleStable = json_encode($jsonParsedGlobaleStable, JSON_PRETTY_PRINT);
  } else {
    setSessionVariable("statusPHP", "Nessuna corrispondenza trovata per \"nomeGlobale\" specificato.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
  }
} else {
  setSessionVariable("statusPHP", "Error while querying the database.");
  setSessionVariable("statusPHPRedirect", null);
  header("location: redirect.php?target=index.php&ms=300");
  die;
}

/*
$jsonParsedGlobale = $jsonParsed["config"]["modules"][$index];
$jsonContentGlobaleHeader = array("module" => $jsonParsedGlobale["module"]);
unset($jsonParsedGlobale["module"]);

$jsonContentGlobale = json_encode($jsonParsedGlobale, JSON_PRETTY_PRINT);
$jsonParsedGlobaleHeader = json_encode($jsonContentGlobaleHeader, JSON_PRETTY_PRINT);
*/

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
  <title>Moduli Settings</title>
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

  <form action="saveEditorContentGlobal.php" method="POST">
    <h4>JSON</h4>
    <p>
    <div class="CODE">
      <textarea id="code-json" name="code-json"><?php echo "$jsonContentGlobale\n" ?></textarea>
    </div>
    <div class="CODE">
      <textarea id="code-json-stable" name="code-json-stable"><?php echo "$jsonContentGlobaleStable\n" ?></textarea>
    </div>
    </p>

    <p>
      <textarea id="nomeGlobale" name="nomeGlobale" hidden><?php echo "$nomeGlobale" ?></textarea>
    </p>

    <!--
    <p>
      <textarea id="jsonContent" name="jsonContent" hidden><?php echo "$jsonContent" ?></textarea>
    </p>
    -->

    <!-- Bottone per salvataggio modifiche -->
    <div id="submitButton"></div>

    <!-- Bottone per ripristino valori default -->
    <!-- QUI -->
  </form>

  <!-- Bottone copia contenuto da editor_json_stable a editor_json -->
  <div id="copyStableButton">
    <input type="button" id="copyStable" name="copyStable" onclick="copyStable()" value="COPIA DEFAULT">
  </div>

  <!-- Inizializzatore -->
  <script type="module">
    initModuloSettings();
  </script>

  <br>
  <a href="index.php">Home Page</a><br><br>
  <a href="globalsSelector.php">Globals Selector</a>

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
