<?php
// NECESSARI CONTROLLI!
$index = $_GET["index"];

$filePath = "../../config/config.json";

$file = fopen($filePath, "r") or die("Unable to parse 'config.json'");
$jsonContent = fread($file, filesize($filePath));
$jsonParsed = json_decode($jsonContent, true);
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
  <title>Editor Stable 3</title>
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

<body>

  <p>

  </p>
  <textarea id="code-json-header"><?php echo "$jsonParsedModuloHeader\n" ?></textarea>
  <p>
    <textarea id="code-json"><?php echo "$jsonContentModulo\n" ?></textarea>
  </p>

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