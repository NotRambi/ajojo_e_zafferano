<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();    
    $user=$_SESSION['user'];

    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402");
    $query="DELETE FROM utenti where username='$user'";
    pg_query($dbconn, $query);
    pg_close($dbconn);
} else {
    // Handle invalid requests or no data sent
    echo "Invalid request!";
}
?>