<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mettiORtogli=$_POST["mettiORtogli"];
    $ricetta = $_POST["ricetta"];
    $user=$_SESSION['user'];
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402");

    if($mettiORtogli=="metti"){
        $query="insert into preferiti values ('$user','$ricetta')";
    }
    if($mettiORtogli=="togli"){
        $query="DELETE FROM preferiti where username='$user' AND ricetta='$ricetta'";
        
    }
    pg_query($dbconn,$query);
    
    pg_close($dbconn);

} else {
    // Handle invalid requests or no data sent
    echo "Invalid request!";
}
?>
