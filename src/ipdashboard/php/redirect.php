<?php
/*
@author Andrea Grandieri g.andreus02@gmail.com
*/

// $target è DAL PUNTO DI VISTA DI "redirect.php"

require "../utils/utils.php";

// Gestione sessione
startNewSessionCheck();

if (
    test_input_valid_get("target") &&
    test_input_valid_get_isset("ms")
) {
    // Normalizzo valori    
    $target = test_input($_GET["target"]);
    $msg = readSessionVariable("statusPHP");
    $msgOnlyHere = readSessionVariable("statusPHPRedirect");
    $ms = test_input($_GET["ms"]);
} else {
    $target = "cul-de-sac.php";
    $msg = null;
    $msgOnlyHere = "Safe redirect";
    $ms = 1500;
}

echo "
<html>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Redirect</title>
    </head>

    <script type='text/javascript'>
        setTimeout(() => {
            window.location = '$target';
        }, $ms);
    </script>

    <body>
        <p>Redirecting...</p>
";

if (isset($msg)) {
    echo "
        <p>$msg</p>
        <br>
        ";
}

if (isset($msgOnlyHere)) {
    echo "
        <p>$msgOnlyHere</p>
    ";
}

echo "
    </body>
</html>
";

setSessionVariable("statusPHPRedirect", null);
