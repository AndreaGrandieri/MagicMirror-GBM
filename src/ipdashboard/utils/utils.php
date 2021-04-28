<?php
/*
@author: Andrea Grandieri g.andreus02@gmail.com
*/

// Normalizza input per sicurezza e standard
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Controlla presenza / validità input per POST
function test_input_valid_post($nameInput)
{
    return !empty($_POST[$nameInput]);
}

// Controlla presenza / validità input per GET
function test_input_valid_get($nameInput)
{
    return !empty($_GET[$nameInput]);
}

// Controlla presenza / validità input per POST
function test_input_valid_post_isset($nameInput)
{
    return isset($_POST[$nameInput]);
}

// Controlla presenza / validità input per GET
function test_input_valid_get_isset($nameInput)
{
    return isset($_GET[$nameInput]);
}

// Validatore campo "Name"
function test_name_valid($name)
{
    return preg_match("/^[a-zA-Z-' ]*$/", $name);
}

// Validatore campo "Email"
function test_email_valid($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validatore campo "URL"
function test_url_valid($website)
{
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website);
}

// Creazione cookie solo con parametri fondamentali
function createBasicCookie($cookieName, $cookieValue, $secondsExpire)
{
    // La funzione può essere anche usata per modificare valore di un cookie
    // già esistente.
    // "expire": in SECONDI contati dalla creazione del cookie
    setcookie($cookieName, $cookieValue, $secondsExpire);
}

// Leggere valore di un cookie
function readCookie($cookieName)
{
    return isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : null;
}

// Elimina cookie
function deleteCookie($cookieName)
{
    setcookie($cookieName, "", time() - 3600);
}

// Avvia sessione
function startNewSession()
{
    session_start();
}

// Avvia sessione se non già avviata
function startNewSessionCheck()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}

// Distrugge sessione, se esiste
function destroySession()
{
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}

// Legge valore variabile sessione se esiste
function readSessionVariable($variableName)
{
    return isset($_SESSION[$variableName]) ? $_SESSION[$variableName] : null;
}

// Imposta valore variabile sessione, creandola se necessario
function setSessionVariable($variableName, $value)
{
    $_SESSION[$variableName] = $value;
}

// Stabilisce una connessione con il MySQL SERVER
function connectMySQLServer($servername, $username, $password)
{
    // Parametri per connessione al DB
    /*
    Esempio:
    $servername = "localhost";
    $username = "root";
    $password = "";
    */

    // Create connection to MySQL SERVER
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        return null;
    }

    // Tutto quello da qui a seguire verrà eseguito solo e solamente
    // se la connessione al DB MySQL è riuscita (quindi è valida)    
    return $conn;
}

// Stabilisce una connessione con un determinato database memorizzato nel 
// MySQL SERVER che si sta contattando (per stabilirci una connessione)
function connectMySQLDB($servername, $username, $password, $db)
{
    // Parametri per connessione al DB
    /*
    Esempio:
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "DBName";
    */

    // Create connection to MySQL DATABASE: "DBName"
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        return null;
    }

    // Tutto quello da qui a seguire verrà eseguito solo e solamente
    // se la connessione al DB MySQL è riuscita (quindi è valida)    
    return $conn;
}

// Disconnessione dal MySQL SERVER e/o MySQL DATABASE
function disconnectMySQL($conn)
{
    $conn->close();
}

// Controlla la "strength" della password
function checkPassword($pssw, $strengthRequired)
{
    // $strengthRequired -> 0, 1, 2, 3, 4

    $strength = 0;

    if (preg_match("/[a-z]+/", $pssw)) {
        $strength += 1;
    }

    if (preg_match("/[A-Z]+/", $pssw)) {
        $strength += 1;
    }

    if (preg_match("/[0-9]+/", $pssw)) {
        $strength += 1;
    }

    if (preg_match("/[$@#&!]+/", $pssw)) {
        $strength += 1;
    }


    return $strength >= $strengthRequired;
}

// Esegue un comando terminal (cmd o terminal) IN BACKGROUND
function execInBackground($cmd) {
    // This will execute $cmd in the background (no cmd window) 
    // without PHP waiting for it to finish, on both Windows and Unix.

    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
        exec($cmd . " > /dev/null &");  
    }
}
