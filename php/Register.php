<?php
include '../DB/DB.php';
session_start();

DB::$user="root";
DB::$dbName="portfolio";
if (!isset($_POST['vorname']) && !isset($_POST['nachname']) && !isset($_POST['benutzer']) && !isset($_POST['mail']) && !isset($_POST['password']) && !isset($_POST['iban'])){
    header("Location: ../Welcome.php");
    echo "<script>alert('Bei der Registrierung ist etwas schiefgelaufen. Bitte füllen Sie alle Felder aus!');</script>";
}else{
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $benutzer = $_POST['benutzer'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $iban = $_POST['iban'];

    DB::insert("benutzer", array("vorname" => $vorname,
        "nachname" => $nachname,
        "benutzername" => $benutzer,
        "emailadresse" => $mail,
        "passwort" => $password,
        "iban" => $iban));

    echo "<script>alert('Sie haben sich erfolgreich registriert!');</script>";
    header("Refresh:0; url=../Welcome.php");
}
?>