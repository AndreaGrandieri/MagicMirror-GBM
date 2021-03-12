<?php
// Controlla presenza / validità input per GET
function test_input_valid_get($nameInput)
{
  return isset($_GET[$nameInput]);
}

if (!test_input_valid_get("index")) {
  die("Died of test_input_valid_get. \"index\" parameter not found.");
}

$filePath = "../../config/config.json";

$file = fopen($filePath, "r") or die("Unable to parse 'config.json'");
$jsonContent = fread($file, filesize($filePath));
fclose($file);

$jsonParsed = json_decode($jsonContent, true);

$index = $_GET["index"];

if (!ctype_digit($index)) {
  die("Died of ctype_digit. \"index\" is not positive integer.");
}

if (!array_key_exists($index, $jsonParsed["config"]["modules"])) {
  die("Died of index check. \"index\" is out of range.");
}

$jsonParsedModulo = $jsonParsed["config"]["modules"][$index];
$jsonContentModuloHeader = array("module" => $jsonParsedModulo["module"]);
unset($jsonParsedModulo["module"]);

$jsonContentModulo = json_encode($jsonParsedModulo, JSON_PRETTY_PRINT);
$jsonParsedModuloHeader = json_encode($jsonContentModuloHeader, JSON_PRETTY_PRINT);
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
<!--
<script src="../js/utils.js" type="module"></script>
-->
<script src="../js/all.js"></script>

<body>

  <h1>Embedded Editor</h1>

  <form action="saveEditorContent.php" method="POST">
    <p>
      <textarea id="code-json-header" name="code-json-header"><?php echo "$jsonParsedModuloHeader\n" ?></textarea>
    </p>

    <h4>JSON</h4>
    <p>
      <textarea id="code-json" name="code-json"><?php echo "$jsonContentModulo\n" ?></textarea>
    </p>

    <p>
      <textarea id="index" name="index" hidden><?php echo "$index" ?></textarea>
    </p>

    <p>
      <textarea id="jsonContent" name="jsonContent" hidden><?php echo "$jsonContent" ?></textarea>
    </p>

    <!-- Bottone per salvataggio modifiche -->
    <input type="submit" id="save" name="save" value="SALVA">

    <!-- Bottone per ripristino valori default -->
    <!-- QUI -->
  </form>

  <script>
    var editor_json = CodeMirror.fromTextArea(document.getElementById("code-json"), {
      lineNumbers: true,
      mode: "application/json",
      gutters: ["CodeMirror-lint-markers"],
      lint: true
    });
    editor_json.setSize(700, 300);

    var editor_json_header = CodeMirror.fromTextArea(document.getElementById("code-json-header"), {
      lineNumbers: true,
      mode: "application/json",
      gutters: ["CodeMirror-lint-markers"],
      lint: true,
      readOnly: true
    });
    editor_json_header.setSize(700, 100);
  </script>

</body>

</html>
