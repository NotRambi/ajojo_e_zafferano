<?php 

// FUNZIONE ELIMINAZIONE UTENTE

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();    
    $user=$_SESSION['user']; // recupero nome utente dalla sessione
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402");
    $query="DELETE FROM utenti where username='$user'"; // query SQL per l'eliminazione della riga riferita all'utente
    pg_query($dbconn, $query);
    pg_close($dbconn);
} else {
    // gestione errori
    echo "Invalid request!";
}
?>