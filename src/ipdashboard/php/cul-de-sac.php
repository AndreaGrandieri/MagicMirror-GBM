<?php
/*
@author Andrea Grandieri g.andreus02@gmail.com
*/

require "../utils/utils.php";
// Gestione sessione
startNewSessionCheck();

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
?>

<!-- -- Flusso degli headers -- -->

<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    @import url(css/style.css);
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cul-de-sac</title>
</head>

<body>

    <a href="index.php">Home Page</a>

</body>

</html>
