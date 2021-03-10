<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Editor</title>
</head>

<body>

    <script src="../codemirror-5.59.4/lib/codemirror.js"></script>
    <link rel="stylesheet" href="../codemirror-5.59.4/lib/codemirror.css">
    <script src="../codemirror-5.59.4/mode/javascript/javascript.js"></script>

    <textarea id="textarea">
        </textarea>

    <script>
        var myCodeMirror = CodeMirror(function(elt) {
            var textarea = document.getElementById("textarea");
            textarea.parentNode.replaceChild(elt, textarea);
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
