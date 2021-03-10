<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    @import url(../css/style.css);
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Editor</title>
</head>

<body>


    <!-- Loading codemirror -->
    <script src="../codemirror-5.59.4/lib/codemirror.js"></script>
    <link rel="stylesheet" href="../codemirror-5.59.4/lib/codemirror.css">
    <script src="../codemirror-5.59.4/mode/javascript/javascript.js"></script>

    <!-- Loading JSON linter -->
    <!--
    <link rel="stylesheet" href="../codemirror-5.59.4/addon/lint/lint.css">
    <script src="../codemirror-5.59.4/addon/lint/lint.js"></script>
    <script src="../codemirror-5.59.4/addon/lint/json-lint.js"></script>
-->

    <!-- Loading require -->
    <script src="../js/require.js"></script>

    <!-- Loading JSON linter dependencies -->
    <script>
        window.jsonlint = require("../jsonlint/lib/jsonlint.js");
        require("../codemirror-5.59.4/addon/lint/lint.css");
        require("../codemirror-5.59.4/addon/lint/lint.js");
        require("../codemirror-5.59.4/addon/lint/json-lint.js");
    </script>

    <textarea id="editorTextArea">
        </textarea>

    <script>
        var myCodeMirror = CodeMirror(function(elt) {
            var editorTextArea = document.getElementById("editorTextArea");
            editorTextArea.parentNode.replaceChild(elt, editorTextArea);
        }, {
            value: "{\n}",
            mode: "application/json",
            lineNumbers: true,
            gutters: ['CodeMirror-lint-markers'],
            lint: true
        });
        myCodeMirror.setSize(500, 300);
    </script>

</body>

</html>
