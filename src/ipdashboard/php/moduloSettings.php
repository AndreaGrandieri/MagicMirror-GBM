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

if (!test_input_valid_get_isset("nomeModulo")) {
  setSessionVariable("statusPHP", "Died of test_input_valid_get_isset. \"nomeModulo\" parameter not found.");
  setSessionVariable("statusPHPRedirect", null);
  header("location: redirect.php?target=index.php&ms=300");
  die;
}

$nomeModulo = test_input($_GET["nomeModulo"]);

// Interrogo tabella "modules"
$results = $db->query("SELECT JsonFragment FROM modules WHERE NomeModulo='$nomeModulo'");

if (gettype($results) !== "boolean") {
  $row = $results->fetchArray(SQLITE3_ASSOC);

  if (gettype($row) !== "boolean") {
    $jsonParsedModulo = json_decode($row["JsonFragment"], true);
    $jsonParsedModuloHeader = array("module" => $jsonParsedModulo["module"]);
    unset($jsonParsedModulo["module"]);

    $jsonContentModulo = json_encode($jsonParsedModulo, JSON_PRETTY_PRINT);
    $jsonContentModuloHeader = json_encode($jsonParsedModuloHeader, JSON_PRETTY_PRINT);
  } else {
    setSessionVariable("statusPHP", "Nessuna corrispondenza trovata per \"nomeModulo\" specificato.");
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
$jsonParsedModulo = $jsonParsed["config"]["modules"][$index];
$jsonContentModuloHeader = array("module" => $jsonParsedModulo["module"]);
unset($jsonParsedModulo["module"]);

$jsonContentModulo = json_encode($jsonParsedModulo, JSON_PRETTY_PRINT);
$jsonParsedModuloHeader = json_encode($jsonContentModuloHeader, JSON_PRETTY_PRINT);
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

<body>

  <h1>Embedded Editor</h1>

  <form action="saveEditorContentModulo.php" method="POST">
    <p>
      <textarea id="code-json-header" name="code-json-header"><?php echo "$jsonContentModuloHeader\n" ?></textarea>
    </p>

    <h4>JSON</h4>
    <p>
      <textarea id="code-json" name="code-json"><?php echo "$jsonContentModulo\n" ?></textarea>
    </p>

    <p>
      <textarea id="nomeModulo" name="nomeModulo" hidden><?php echo "$nomeModulo" ?></textarea>
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

  <script type="module">
    import * as utils from "../utils/utils.js";

    var editor_json = CodeMirror.fromTextArea(document.getElementById("code-json"), {
      lineNumbers: true,
      mode: "application/json",
      gutters: ["CodeMirror-lint-markers"],
      lint: {
        "getAnnotations": jsonValidator,
        "async": true
      }
    });
    editor_json.setSize(700, 300);

    // Semplice aggiunta event handler "change" (riferimento GOOD)
    editor_json.on("change", safeLock);

    var editor_json_header = CodeMirror.fromTextArea(document.getElementById("code-json-header"), {
      lineNumbers: true,
      mode: "application/json",
      gutters: ["CodeMirror-lint-markers"],
      lint: true,
      readOnly: true
    });
    editor_json_header.setSize(700, 100);

    function jsonValidator(cm, updateLinting, options) {
      var errors = CodeMirror.lint.json(cm, options);

      updateLinting(errors);

      if (errors.length > 0) {
        utils.clearAndInject("submitButton", "<input type='submit' id='save' name='save' value='SALVA' disabled>");
      } else {
        utils.clearAndInject("submitButton", "<input type='submit' id='save' name='save' value='SALVA'>");
      }
    }

    function safeLock(cm, changeObj) {
      utils.clearAndInject("submitButton", "<input type='submit' id='save' name='save' value='SALVA' disabled>");
    }
  </script>

  <br>
  <a href="index.php">Home Page</a><br><br>
  <a href="moduliSelector.php">Moduli Selector</a>

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
