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

// Interrogo tabella "modules"
$results = $db->query("SELECT JsonFragment FROM modules ORDER BY RenderIndex");

$jsonContent = "{\"modules\": [";

if (gettype($results) !== "boolean") {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {

        $jsonContent .= $row["JsonFragment"] . ",";
    }
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

$jsonContent .= "]}";

echo $jsonContent;
