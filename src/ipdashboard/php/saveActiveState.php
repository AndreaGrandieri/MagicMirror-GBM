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

if (!test_input_valid_post_isset("attivazione")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

$attivazione = ($_POST["attivazione"]);

// Disattivazione globale
$results = $db->exec("UPDATE modules 
                        SET Active = '0';");

if (!$results) {
    setSessionVariable("statusPHP", "Error while updating the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// Costruzione dinamica per costrutto "$sql"
$sql = "";

for ($i = 0; $i < count($attivazione) - 1; $i++) {
    $sql .= "UPDATE modules
            SET Active = '1'
            WHERE NomeModulo = '$attivazione[$i]';";
}

// Eseguo costrutto "$sql"
// Utilizzo "exec" in quanto il costrutto "$sql" contiene
// multiple query
$results = $db->exec($sql);

if ($results) {
    setSessionVariable("statusPHP", "Stato di attivazione aggiornato con successo.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
} else {
    setSessionVariable("statusPHP", "Error while updating the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
