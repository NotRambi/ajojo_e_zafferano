<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
    or die('Could not connect: ' . pg_last_error());
    switch ($_POST["buttonclicked"]){
        case "flagPiccante":
            $query="update filtri set flagpiccante=".$_POST["flagPiccante"];
            pg_query($dbconn,$query);
            break;
        case "flagGlutine":
            $query="update filtri set flagglut=".$_POST["flagGlutine"];
            pg_query($dbconn,$query);
            break;
        case "flagStar":
            $query="update filtri set flagstar=".$_POST["flagStar"];
            pg_query($dbconn,$query);
            break;
        case "flagLeggero":
            $query="update filtri set flaglite=".$_POST["flagLeggero"];
            pg_query($dbconn,$query);
            break;
        case "flagVegan":
            $query="update filtri set flagvegan=".$_POST["flagVegan"];
            pg_query($dbconn,$query);
            break;
        case "reset":
            $query="update filtri set flagvegan=true,flaglite=true,flagstar=true,flagglut=true,flagpiccante=true";
            pg_query($dbconn,$query);
            break;
    }
    pg_free_result($result);
    pg_close($dbconn);

} else {
    // Handle invalid requests or no data sent
    echo "Invalid request!";
}
?>