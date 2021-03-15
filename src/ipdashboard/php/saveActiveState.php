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

if (!test_input_valid_post_isset("indici")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

if (!test_input_valid_post_isset("refOrdineModuli")) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

$attivazione = ($_POST["attivazione"]);
$indici = ($_POST["indici"]);
$refOrdineModuli = ($_POST["refOrdineModuli"]);

$results = $db->query("SELECT COUNT (*) AS NumRows FROM modules");
if (gettype($results) !== "boolean") {
    $numRows = $results->fetchArray(SQLITE3_ASSOC)["NumRows"];
} else {
    setSessionVariable("statusPHP", "Error while querying the database.");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// Fornisce una protezione contro (*)
// - indici ripetuti
// - indici oltre i limiti consentiti
// - indici vuoti (null)
// - oversizing dell'array indici con valori corretti
/// BEGIN
$campione = array();
for ($i = 0; $i < $numRows; $i++) {
    array_push($campione, $i);
}

if (count($campione) !== count($indici)) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova. (count fail)");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}

$intersezione = array_intersect($campione, $indici);

// DEBUG
// La comparazione di tipo "Equality" "grezza" tra array "classici" 
// (con gli indici) TIENE conto dell'ordine degli elementi!
// var_dump($intersezione != $indici);
// var_dump($intersezione == $indici);
// var_dump($campione);
// var_dump($intersezione);
// var_dump($indici);

// Il controllo, quindi, viene effettuato comparando
// gli elementi nell'array intersezione con il numero
// di elementi presenti nell'array "$campione".
// L'intersezione è stata effettuata tra gli array 
// "$campione" e "$indici". Se l'array "$indici" è correttamente
// formato, allora l'array intersezione lo sarà di conseguenza,
// avendo, di conseguenza, lo stesso identico numeri di elementi
// dell'array "$campione".
// E' facilmente deducibile come il verificarsi di una sola o di
// molteplici di queste condizioni (*) causa una malformazione
// dell'array intersezione.

if (count($intersezione) !== count($campione)) {
    setSessionVariable("statusPHP", "Rilevati valori non validi. Riprova. (intersect fail)");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=moduliSelector.php&ms=300");
    die;
}
/// END

// Disattivazione globale
$results = $db->exec("UPDATE modules 
                        SET Active = '0';");

if (!$results) {
    setSessionVariable("statusPHP", "Error while updating the database. (flag: 1)");
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

if (!$results) {
    setSessionVariable("statusPHP", "Error while updating the database. (flag: 2)");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// "Defer" grezzo (non ottimizzato, per adesso va comunque bene così)
// Costruzione dinamica per costrutto "$sql"
$sql = "";

for ($i = 0; $i < count($indici); $i++, $numRows++) {
    $sql .= "UPDATE modules
            SET RenderIndex = $numRows
            WHERE NomeModulo = '$refOrdineModuli[$i]';";
}

// Eseguo costrutto "$sql"
// Utilizzo "exec" in quanto il costrutto "$sql" contiene
// multiple query
$results = $db->exec($sql);

if (!$results) {
    setSessionVariable("statusPHP", "Error while updating the database. (flag: 4)");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

// Costruzione dinamica per costrutto "$sql"
$sql = "";

for ($i = 0; $i < count($indici); $i++) {
    $sql .= "UPDATE modules
            SET RenderIndex = $indici[$i]
            WHERE NomeModulo = '$refOrdineModuli[$i]';";
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
    setSessionVariable("statusPHP", "Error while updating the database. (flag: 3)");
    setSessionVariable("statusPHPRedirect", null);
    header("location: redirect.php?target=index.php&ms=300");
    die;
}

setSessionVariable("statusPHP", null);
setSessionVariable("statusPHPRedirect", null);
