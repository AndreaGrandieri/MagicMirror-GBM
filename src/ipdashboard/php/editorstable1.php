<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    @import url(../css/style.css);
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Stable 1</title>
</head>

<body>
    <!-- Loading codemirror -->
    <script src="../codemirror-5.59.4/lib/codemirror.js"></script>
    <link rel="stylesheet" href="../codemirror-5.59.4/lib/codemirror.css">
    <script src="../codemirror-5.59.4/mode/javascript/javascript.js"></script>

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
        });
        myCodeMirror.setSize(700, 300);
    </script>

</body>

</html>
