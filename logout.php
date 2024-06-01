<?php 

// FUNZIONE CHE CHIUDE LA SESSIONE 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    unset($_SESSION['user']);
}
?>