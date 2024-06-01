<?php

// FUNZIONE GESTIONE FILTRI RICETTARIO

session_start();
// chiamata tramite una form in modalità POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($_POST["buttonclicked"]){ 
        case "flagPiccante": // caso filtro Piccante
            $_SESSION['flagpiccante']=$_POST["flagPiccante"];
            break;
        case "flagGlutine": // caso filtro Senza Glutine
            $_SESSION['flagglut']=$_POST["flagGlutine"];
            break;
        case "flagStar": // caso filtro Stellato
            $_SESSION['flagstar']=$_POST["flagStar"];
            break;
        case "flagLeggero": // caso filtro Leggero
            $_SESSION['flaglite']=$_POST["flagLeggero"];
            break;
        case "flagVegan": // caso filtro Vegano
            $_SESSION['flagvegan']=$_POST["flagVegan"];
            break;
        case "flagPortata": // caso selezione tipo di portata
            $_SESSION['portata']=$_POST["portata"];
            break;
        case "reset": // reset di tutti i filtri
            $_SESSION['flagpiccante']='t';
            $_SESSION['flagglut']='t';
            $_SESSION['flagstar']='t';
            $_SESSION['flaglite']='t';
            $_SESSION['flagvegan']='t';     
            $_SESSION['portata']='seleziona';   
            break;
    }

} else {
    // gestione errori
    echo "Invalid request!";
}
?>