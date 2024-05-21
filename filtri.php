<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($_POST["buttonclicked"]){
        case "flagPiccante":
            $_SESSION['flagpiccante']=$_POST["flagPiccante"];
            break;
        case "flagGlutine":
            $_SESSION['flagglut']=$_POST["flagGlutine"];
            break;
        case "flagStar":
            $_SESSION['flagstar']=$_POST["flagStar"];
            break;
        case "flagLeggero":
            $_SESSION['flaglite']=$_POST["flagLeggero"];
            break;
        case "flagVegan":
            $_SESSION['flagvegan']=$_POST["flagVegan"];
            break;
        case "reset":
            $_SESSION['flagpiccante']='t';
            $_SESSION['flagglut']='t';
            $_SESSION['flagstar']='t';
            $_SESSION['flaglite']='t';
            $_SESSION['flagvegan']='t';            
            break;
    }

} else {
    // Handle invalid requests or no data sent
    echo "Invalid request!";
}
?>