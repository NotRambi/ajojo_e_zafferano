<!DOCTYPE html>
<html lang="it">
<?php session_start();?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <title>Ajojo & Zafferano</title>
        <link rel="icon" href="logo.png" type="image/x-icon">
        <style>
            *{
                font-family: "Poppins", sans-serif;
            }
            body{
                background-color: #f8fadd;
                min-height: 100vh;
                min-width: 582px;
            }

            /* stili barra di navigazione */
            .navbgr{
                background-color: #f8fadd;
                height: 5rem;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
            }
            .nav{
                background-color: #333;
                height: 4.5rem;
                width: 98%;
                position: relative;
                top: 1rem;
                left: 1%;
                text-align: left;
                display: flex;
                align-items: center;
                border-radius: 10px;
                gap: 1.5rem;
            }
            .nav a{
                font-weight: 500;
                font-style: normal;
                font-size: 30px;
                position: relative;
                border-radius: 10px;
                color: white;
                text-decoration: none;
                transition: all 0.2s;
            }
            .nav a:not(.MainLogo){
                padding:1.2rem 0;
            }
            .nav a:not(.MainLogo):hover{
                text-decoration: underline; 
                scale: 1.1;
                transition: all 0.5s;
            }
            .nav a:is(.MainLogo):hover{
                margin-right: 1.5rem;
                transition: all 0.5s;
                .logo_img{
                    scale: 0.8;
                    transition: all 0.5s;
                }
                .logo_title {
                    left:0;
                    color: white;
                    transition: all 0.5s;
                }
                .logo_title p{
                    color: white;
                    transition: all 0.2s;
                }
            }
            .nav a:is(.RicettarioLink){
            text-decoration: underline; 
            }
            .ProfiloLink{
                margin-left: auto;
                margin-right: 1.5rem;
            }
            .MainLogo{
                margin-left: 1rem;
                margin-right: -6.5rem;
                display: flex;
                gap:0.2rem;
                align-items: center;
                justify-content: center;
                transition: all 0.5s;
            }
            .logo_img{
                z-index: 2;
                width: 70px;
                height: 70px;
                transition: all 0.5s;
                pointer-events: none;
            }
            .logo_title{
                position: relative;
                left:-5rem;
                transition: all 0.5s;
                pointer-events: none;
            }
            .logo_title p{
                display: flex;
                flex-direction: column;
                gap: 0rem;
                margin:0;
                margin-right: 1rem;   
                padding:0;
                top:0;
                bottom:0;
                font-size: 20px;
                position: relative;
                color:#333;
                transition: all 0.2s;
            }
            .logo_title .ajojo_{
                top:0.3rem
            }
            .logo_title .zafferano_{
                top: -0.3rem;
                left: 1.5rem;
            }

            /* stili ricette */
            .firstBtn{
                margin-left: 1rem;
            }
            .content {
                padding-top: 20px;
            }
            .recipe-container{
                display: grid;
                grid-template-columns: max-content max-content max-content;
                gap: 1rem;
                justify-content: center;
                place-items: center;
                max-width: 1700px;
                margin: 0 auto;
            }
            .recipe-div{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 550px;
                height: 400px;
            }
            .recipe{
                position: relative;
                width:500px;
                height:350px;
                perspective: 1000px;
            }
            .recipe:hover{
                cursor:pointer;
            }
            .recipe-inner{
                width: 100%;
                height: 100%;
                position: relative;
                transform-style: preserve-3d;
                transition: transform 0.999s;
            }
            .recipe-front,
            .recipe-back {
                border: 4px solid #333;
                background-color:#fff;
                border-radius: 10px;
                padding: 15px;
                top: -19px;
                left: -19px;
                position: absolute;
                width: 100%;
                height: 100%;
                backface-visibility: hidden;
            }

            .recipe-front {
                transform: rotateY(0deg);
            }

            .recipe-back {
                transform: rotateY(180deg);
            }

            .recipe-name{
                border: 4px solid #333;
                border-radius: 10px;
                display:flex;
                flex-direction:row;
                align-items:center;
                justify-content:center;
                gap:1rem;
                height:4rem;
            }
            .recipe-title {
                font-size:23px;
            }
            .recipe-name button{
                cursor:pointer;
                background:none;
                border:none;
                z-index: 2;
            }
            .togliprefBtn{
                display:flex;
                flex-direction:row;
                align-items:center;
                margin:0;
            }
            .togliprefBtn:hover{
                scale:1.1;
                .barrapref{
                    display:block;
                }
            }
            .material-symbols-outlined:is(.buttonprefe) {
                font-variation-settings:
                'FILL' 0,
                'wght' 700,
                'GRAD' 0,
                'opsz' 24
            }
            .togliprefe{
                color:#ed4f00;
            }
            .mettiprefe{
                color:#222;
            }
            .mettiprefe:hover{
                color:#ed4f00;
                scale:1.1;
            }
            .barrapref{
                display:none;
                scale:2;
                margin:0;
                padding:0;
                left:-19px;
                top: -1.5px;
                color:#ed4f00;
                position: relative;
                font-size:15px;
                font-weight:bold;
                transform: rotate(45deg);
            }
            .recipe-content-div{
                margin-top:1rem;
                height: 250px;
                display:flex;
                align-items:center;
            }
            .recipe-content{
                width: 100%;
                display:flex;
            }
            .recipe-desc{
                width:50%;
                font-size:18px;
            }
            .recipe-info{
                display:flex;
                align-items:center;
                gap:2rem;
            }
            .timer{
                display:flex;
                align-items:center;
                gap:0.5rem;
            }
            .recipe-flag{
                display:flex;
                flex-direction:row;
                align-items:center;
            }
            .recipe-img-div{
                width:50%;
                display:flex;
                align-items:center;
                justify-content:center;
            }
            .recipe-img{
                height: 10.5rem;
                width: 14rem;
                border:4px solid #333;
                background-color:#333;
                border-radius: 10px;
            }

            /* stili modal login/regirazione */
            .modal {
                display: none;
                position: fixed;
                z-index: 11;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                background-color: rgba(0, 0, 0, 0.8);
            }
            .form {
                margin: 15% auto;
                margin-top: 0%;
                top: 15%;
                padding: 20px;
                display: flex;
                flex-direction: column;
                gap: 10px;
                max-width: 400px;
                padding: 20px;
                border-radius: 20px;
                position: relative;
                background-color: #e8e8e8;
                color: #fff;
                border: 5px solid #111;
            }
            .title {
                font-size: 28px;
                font-weight: 600;
                letter-spacing: -1px;
                position: relative;
                display: flex;
                align-items: center;
                padding-left: 30px;
                color: #ed6700;
            }
            .title::before {
                width: 18px;
                height: 18px;
            }
            .title::after {
                width: 18px;
                height: 18px;
                animation: pulse 1s linear infinite;
            }
            .title::before,
            .title::after {
                position: absolute;
                content: "";
                height: 16px;
                width: 16px;
                border-radius: 50%;
                left: 0px;
                background-color: #ed6700;
            }
            .errorLabelLogin{
                display: none;
                color: #ed4f00;
                margin:0;
            } 
            .errorLabelSignin{
                display: none;
                color: #ed4f00;
                margin:0;
            }
            .message, 
            .signin {
                font-size: 14.5px;
                color: #333;
            }
            .signin {
                text-align: center;
            }
            .signin a {
                color: #ed6700;
                text-decoration: none;
            }
            .signin a:hover {
                text-decoration: underline;
            }
            .flex {
                display: flex;
                width: 97.5%;
                gap: 20px;
            }
            .form label {
                position: relative;
            }
            .form label .input {
                background-color: #fff;
                color: #333;
                width: 95%;
                padding: 20px 05px 05px 10px;
                outline: 0;
                border: 1px solid rgba(105, 105, 105, 0.397);
                border-radius: 10px;
            }
            .form label .input + span {
                color: #333;
                position: absolute;
                left: 10px;
                top: 0px;
                font-size: 0.9em;
                cursor: text;
                transition: 0.3s ease;
            }
            .form label .input:placeholder-shown + span {
                top: 12.5px;
                font-size: 0.9em;
            }
            .form label .input:focus + span,
            .form label .input:valid + span {
                color: #ed6700;
                top: 0px;
                font-size: 0.7em;
                font-weight: 600;
            }
            .input {
                font-size: medium;
            }
            .submit {
                border: none;
                outline: none;
                padding: 10px;
                border-radius: 10px;
                color: #fff;
                font-size: 16px;
                transform: .3s ease;
                background-color: #ed6700;
                transition: all 0.3s ease;
            }
            .submit:hover {
                background-color: #ed4f00;
                transition: all 0.3s ease;
            }
            @keyframes pulse {
                from {
                    transform: scale(0.9);
                    opacity: 1;
                }
                to {
                    transform: scale(1.8);
                    opacity: 0;
                }
            }

            /* FILTRI E BARRA DI RICERCA */
            .div-filtri-search{
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap:1rem;
            }
            .search-container{
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .search-container input{
                width: 250px;
                height: 40px;
                border-radius: 20px;
                border: 2px solid #333;
                padding: 0 20px;
                font-size: 18px;
                outline: none;
            }
            .search-div{
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
            }
            .search-div span{
                font-size: 30px;
                color: #333;
                margin-left: -40px;
            }
            .filtri-container{
                display: flex;
                align-items: center;
                gap: 0.3rem;
            }
            .butFiltro{
                background-color: #333;
                color: #fff;
                border: 2px solid #333;
                border-radius: 20px;
                padding: 5px 20px;
                font-size: 15px;
                cursor: pointer;
            }
            .butFiltro:is(.resetBtn){
                z-index:1;
            }
            .butTendina{
                background-color: #333;
                color: #fff;
                border: 2px solid #333;
                border-radius: 10px;
                padding: 5px 10px;
                font-size: 15px;
                min-width: 100px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.2rem;
            }
            .butTendina span{
                color: #fff;
            }
            .searchCatchNessunaRicetta{
                display: none;
            }
            .scritteZeroRisultati{
                text-align: center;
            }
            
            /* tendina scelta portata */
            .tendina {
                margin-left: auto;
                position: relative;
                display: inline-block;
            }
            .tendina-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 100px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                border: 2px solid #333;
                border-radius: 10px;
                cursor: pointer;
            }
            .tendina-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                border-radius: 10px;
            }
            .tendina-content a:hover {
                background-color: #f1f1f1;
            }
            .tendina:hover .tendina-content {
                display: block;
            }
            #result {
                margin-top: 20px;
                font-size: 18px;
                font-weight: bold;
            }
            
        </style>
        
    </head>

    <body>

        <!-- barra di navigazione -->
        <div class="navbgr">
            <div class="nav">
                <a class="MainLogo" href="index.php">
                    <img src="logo.png" class="logo_img">
                    <div class="logo_title">
                        <p class="ajojo_">Ajojo &</p>
                        <p class="zafferano_">Zafferano</p>
                    </div>
                </a>
                <a class="FrigoLink" href="frigo.php">Frigorifero</a>
                <a class="RicettarioLink" href="ricettario.php">Ricettario</a>
                <a class="ProfiloLink" id="profileBtn" href="profilo.php">Profilo</a>
                <a class="ProfiloLink" id="loginBtn" href="#">Accedi</a>
            </div>
        </div>
        <!-- funzione php per mostrare accedi o profilo in base alla sessione corrente -->
        <?php
            if(isset($_SESSION['user'])){
                echo "<script>document.getElementById('profileBtn').style.display = 'block';</script>";
                echo "<script>document.getElementById('loginBtn').style.display = 'none';</script>";
            } 
            else{
                echo "<script>document.getElementById('profileBtn').style.display = 'none';</script>";
                echo "<script>document.getElementById('loginBtn').style.display = 'block';</script>";
            }
        ?>

        <!-- funzione php per controllare lo stato dei filtri nella sessione -->
        <?php
            // aggiorna stato filtri
            $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=biar") 
            or die('Could not connect: ' . pg_last_error());
            if(!isset($_SESSION['flagpiccante']))
                $_SESSION['flagpiccante']='t';
            if(!isset($_SESSION['flagglut']))
                $_SESSION['flagglut']='t';
            if(!isset($_SESSION['flaglite']))
                $_SESSION['flaglite']='t';
            if(!isset($_SESSION['flagstar']))
                $_SESSION['flagstar']='t';
            if(!isset($_SESSION['flagvegan']))
                $_SESSION['flagvegan']='t';
            if(!isset($_SESSION['portata']))
                $_SESSION['portata']='seleziona';
        ?>
        
        <br><br><br><br>

        <!-- sezione bottoni filtri, barra di ricerca e tendina tipo di portata -->
        <div class="div-filtri-search">
            <div class="search-container">
                <button name="reset" id="reset" value="0" class="butFiltro resetBtn"> resetta filtri </button>
                <div class="search-div">
                    <input type="text" id="searchBar" placeholder="Cerca ricette">
                    <span class="material-symbols-outlined">search</span>
                </div>
                <div class="tendina">
                    <button id="tendinaButton" class="butTendina"><?php echo $_SESSION['portata'];?> <span class="material-symbols-outlined">arrow_drop_down</span> </button>
                    <div class="tendina-content">
                        <a onclick="selezionaPortata('antipasto')">Antipasto</a>
                        <a onclick="selezionaPortata('primo')">Primo</a>
                        <a onclick="selezionaPortata('secondo')">Secondo</a>
                        <a onclick="selezionaPortata('contorno')">Contorno</a>
                        <a onclick="selezionaPortata('dolce')">Dolce</a>
                    </div>
                    
                </div>
            </div>
            <div class="filtri-container">
                <button name="flagPiccante" id="flagPiccante" value="<?php if($_SESSION['flagpiccante']=='t') echo 'true'; else echo 'false';?>" class="butFiltro firstBtn">piccante</button>
                <button name="flagGlutine" id="flagGlutine" value="<?php if($_SESSION['flagglut']=='t') echo 'true'; else echo 'false';?>" class="butFiltro">no glutine</button>
                <button name="flagLeggero" id="flagLeggero" value="<?php if($_SESSION['flaglite']=='t') echo 'true'; else echo 'false';?>" class="butFiltro">leggero</button>
                <button name="flagStar" id="flagStar" value="<?php if($_SESSION['flagstar']=='t') echo 'true'; else echo 'false';?>" class="butFiltro">stellato</button>
                <button name="flagVegan" id="flagVegan" value="<?php if($_SESSION['flagvegan']=='t') echo 'true'; else echo 'false';?>" class="butFiltro">vegano</button>
            </div>

            
            
            
        </div>

        <!--Modal ad apparizione dei tasti  e signin-->

        <!-- Modal di login -->
        <div id="loginModal" class="modal">
                <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="tipo" value="login">
                    <p class="title">Login </p>
                    <p class="errorLabelLogin" id="erroreLogin"> credenziali errate </p>
                    <label>
                        <input class="input" type="text" id="usernameLogin" name="usernameLogin" placeholder="" required="">
                        <span>Username</span>
                    </label> 
                        
                    <label>
                        <input class="input" type="password" id="passwordLogin" name="passwordLogin" placeholder="" required="">
                        <span>Password</span>
                    </label>
                    <button class="submit" value="Accedi">Accedi</button>
                    <p class="signin">Non hai un account ? <a href="#" onclick="document.getElementById('registerModal').style.display='block';
                                                                                document.getElementById('loginModal').style.display='none';
                                                                                document.getElementById('erroreLogin').style.display = 'none'; document.getElementById('erroreSignin').style.display = 'none';">Registrati</a> </p>
                </form>
            </div>

        <!-- Modal di registrazione -->
        <div id="registerModal" class="modal">
            <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="tipo" value="registrazione">
                <p class="title">Registrazione </p>
                <p class="errorLabelSignin" id="erroreSignin"> errore registrazione </p>
                <p class="message">Registrati ora per avere accesso al servizio completo </p>
                    <div class="flex">
                    <label>
                        <input class="input" type="text" id="nome"  name="nome" placeholder="" required="">
                        <span>Nome</span>
                    </label>
            
                    <label>
                        <input class="input" type="text" id="cognome"  name="cognome" placeholder="" required="">
                        <span>Cognome</span>
                    </label>
                </div>  
                        
                <label>
                    <input class="input" type="text" id="username"  name="username" placeholder="" required="">
                    <span>Username</span>
                </label> 
                    
                <label>
                    <input class="input" type="password" id="password"  name="password" placeholder="" required="">
                    <span>Password</span>
                </label>
                <button class="submit" value="Registrati">Registrati</button>
                <p class="signin">Hai già un account ? <a href="#" onclick="document.getElementById('loginModal').style.display='block'; document.getElementById('registerModal').style.display='none';document.getElementById('erroreSignin').style.display = 'none';">Login</a> </p>
            </form>
        </div>
        
        <!-- HTML del sito che visualizza le ricette gestito dalle funzioni PHP -->
        <?php
        //GENERAZIONE QUERY:

        $query="SELECT * from ricetta";//caso default nessuna chiamata POST
        $flagFromFrigo=false;//una flag che mi serve bella stampa per un controllo
        if ($_SERVER["REQUEST_METHOD"] == "POST") {   
            
            //HO CLICCATO UN'IMMAGINE SULLA HOME
            if(isset($_POST["ricetta"])){
                $ricetta=pg_escape_string($_POST["ricetta"]);
                $query="select * from ricetta where nomericetta='$ricetta'";
            } 
            // HO PASSATO DEGLI INGREDIENTI DAL FRIFO
            else if(isset($_POST["frigo"])){
                    
                $flagFromFrigo=true;
                //COSTRISCO LA QUERY:
                $query = "select * from ricetta where nomericetta in ((SELECT distinct ricetta from ingredienti)except select distinct ricetta from(select * from ingredienti";
                $campi_valori = array();

                //vado a prendere gli ingredienti
                $i = 1;
                while (true) {
                    $ingrediente = "campo$i";
                    // Verifica se il campo è vuoto o non è impostato
                    if (!isset($_POST[$ingrediente]) || $_POST[$ingrediente] === "") {
                        break;
                    }
                    $valore_ingrediente = pg_escape_string($_POST[$ingrediente]);
                    $valore_ingrediente=str_replace(' ','_',$valore_ingrediente);
                    if ($valore_ingrediente !== false) {
                        $campi_valori[$ingrediente] = $valore_ingrediente;
                    }
                $_SESSION["ingredientiFrigo"]=$campi_valori;
                $i++;
                }
                
                //li metto nella query
                $condizioni = array();
                foreach ($campi_valori as $ingrediente => $valore) {
                    $condizioni[] = "ingrediente != '$valore'";
                }  
                $condizioni_sql = implode(" AND ", $condizioni); 
                if (!empty($condizioni_sql)) {
                    $query .= " WHERE $condizioni_sql";
                }
                $query.= "))";
            }
        }

        //METTO I FILTRI E INTOLLERANZE
        $row=pg_fetch_assoc(pg_query($dbconn,"select * from filtri"));
        if($_SESSION['flagpiccante']=='t') $piccante="true"; else $piccante="false";
        if($_SESSION['flagstar']=='t') $star="true"; else $star="false";
        if($_SESSION['flaglite']=='t') $lite="true"; else $lite="false";
        if($_SESSION['flagvegan']=='t') $flagvegan="true"; else $flagvegan="false";
        if($_SESSION['flagglut']=='t') $gluten="true"; else $gluten="false";
        $portata=$_SESSION['portata'];

        $prequery="select distinct nomericetta,tempo,tipologia,difficolta,isspicy,isglutenfree,a.isvegan,isstar,islite,descrizione
        from utenti,(";

        $postquery=") as a where ";
        if(isset($_SESSION['user'])){
            $utente=$_SESSION['user'];
            $postquery=$postquery."username='$utente' and
            (a.isvegan or ('$flagvegan' and not utenti.isvegan)) and
            (a.isglutenfree or ('$gluten' and not utenti.intgluten)) and
            ";
        }
        else{
            //non sono loggato
            $postquery=$postquery."
            (a.isvegan or '$flagvegan') and
            (a.isglutenfree or '$gluten') and
            ";
        }

        if($portata!='seleziona')
            $postquery=$postquery."(a.tipologia = '$portata') and";

        //per aggiungere il filtro non piccante (not a.isspicy or '$Notpiccante') and
        $postquery=$postquery."
        (a.isspicy or '$piccante') and
        (a.isstar or '$star') and
        (a.islite or '$lite')
        order by a.nomericetta;
        ";
        $query=$prequery.$query.$postquery;


        // SCURISCO IL BOTTONE QUANDO CLICCO UN FILTRO
        if($piccante=="true")
            echo "<script>
                document.getElementById('flagPiccante').style.backgroundColor= '#333';
                document.getElementById('flagPiccante').style.scale= 1;
            </script>";
        else
            echo "<script>
                document.getElementById('flagPiccante').style.backgroundColor= '#222';
                document.getElementById('flagPiccante').style.scale= 0.9;
            </script>";
        
        if($star=="true")
            echo "<script>
                document.getElementById('flagStar').style.backgroundColor= '#333';
                document.getElementById('flagStar').style.scale= 1;
            </script>";
        else
            echo "<script>
                document.getElementById('flagStar').style.backgroundColor= '#222';
                document.getElementById('flagStar').style.scale= 0.9;
            </script>";

        if($lite=="true")
            echo "<script>
                document.getElementById('flagLeggero').style.backgroundColor= '#333';
                document.getElementById('flagLeggero').style.scale= 1;
            </script>";
        else
            echo "<script>
                document.getElementById('flagLeggero').style.backgroundColor= '#222';
                document.getElementById('flagLeggero').style.scale= 0.9;
            </script>";
        
        if($flagvegan=="true")
            echo "<script>
                document.getElementById('flagVegan').style.backgroundColor= '#333';
                document.getElementById('flagVegan').style.scale= 1;
            </script>";
        else
            echo "<script>
                document.getElementById('flagVegan').style.backgroundColor= '#222';
                document.getElementById('flagVegan').style.scale= 0.9;
            </script>";

        if($gluten=="true")
            echo "<script>
                document.getElementById('flagGlutine').style.backgroundColor= '#333';
                document.getElementById('flagGlutine').style.scale= 1;
            </script>";
        else
            echo "<script>
                document.getElementById('flagGlutine').style.backgroundColor= '#222';
                document.getElementById('flagGlutine').style.scale= 0.9;
            </script>";
        
            
        //CONTROLLO LA QUERY SIA NON VUOTA IN CASO
        //LA RICREO CON RICETTE INCOMPLETE
        $result = pg_query($dbconn,$query);
        $flagVuota=false;//utile per un controllo nella stampa
        
        if(pg_num_rows($result)<=0 && $flagFromFrigo){
            $query="select * from ricetta where nomericetta in (select distinct ricetta from ingredienti";
            $condizioni = array();
            foreach ($campi_valori as $ingrediente => $valore) {
                $condizioni[] = "ingrediente = '$valore'";
            }  
            $condizioni_sql = implode(" OR ", $condizioni); 
            if (!empty($condizioni_sql)) {
                $query .= " WHERE $condizioni_sql";
            }
            $query.= ")";
            $query=$prequery.$query.$postquery;//intolleranze, e filtri
            $result = pg_query($dbconn,$query);
            $flagVuota=true;
        }
        if(pg_num_rows($result)==0){
            echo "<br><h2 class='scritteZeroRisultati'>non ci sono ricette con le tue intolleranze o questi filtri</h2>";
        } 
        else {
        //STAMPO LE RICETTE con tasti preferiti
        echo "<div class='content' id='recipeList'>";
            echo "<h2 class='searchCatchNessunaRicetta scritteZeroRisultati'>non ci sono ricette con questo nome</h2>";
            if($flagVuota) echo "<h2 class='scritteZeroRisultati' id='quasi'>non hai tutti gli ingredienti per una ricetta completa ma hai quasi:</h2>";
                echo "<div class='recipe-container'>";
            while ($row = pg_fetch_assoc($result)) {
                $vuota=false;
                echo "<div class='recipe-div'>";
                    echo "<div class='recipe' id='recipe_".$row['nomericetta']."'>";
                        echo "<div class='recipe-inner' id='inner_".$row['nomericetta']."'>";
                            echo "<div class='recipe-front'>";
                                echo "<div class='recipe-name'>";
                                    echo "<h2 class='recipe-title'>";
                                        echo str_replace('_', ' ', $row['nomericetta']);
                                        $ricetta=$row['nomericetta'];
                                    echo "</h2>";
                                    //BOTTONI PER I PREFERIRI UNO DEI DUE SARA INVISIBILE IN BASE ALL'UTENTE
                                    //SE NON LO LOGGATO INVISIBILI ENRTAMBI?
                                    if(isset($_SESSION['user'])){    
                                        $idmettiprefe="idBottonePrefeMetti".$ricetta;
                                        $idtogliprefe="idBottonePrefeTogli".$ricetta;
                                        $user=$_SESSION['user'];
                                        $querypreferiti="select * from preferiti where username='$user' and ricetta='$ricetta'";
                                        $resultpreferiti=pg_query($dbconn,$querypreferiti);
                                        echo "<button id=$idmettiprefe class='buttonprefe mettiprefe material-symbols-outlined'>favorite</button>";
                                        echo "<div class='togliprefBtn'><button id=$idtogliprefe class='buttonprefe togliprefe material-symbols-outlined'>favorite</button><p class='barrapref'>|</p></div>";
                                        if(pg_num_rows($resultpreferiti)>0){
                                            echo "
                                            <script>
                                            document.getElementById('$idmettiprefe').style.display = 'none';
                                            </script>";
                                        }else{
                                            echo "
                                            <script>
                                            document.getElementById('$idtogliprefe').style.display = 'none';
                                            </script>";
                                        }
                                    }
                                echo "</div>";
                                echo "<div class='recipe-content-div'>";
                                    echo "<div class='recipe-content'>";
                                        echo "<div class='recipe-desc'>";
                                            echo "<p>";
                                                $query2="SELECT * FROM ingredienti where ricetta= '$ricetta'";
                                                $result2=pg_query($dbconn,$query2);
                                                while($ingrediente=pg_fetch_assoc($result2)){
                                                    echo str_replace('_', ' ',$ingrediente['ingrediente']);
                                                    if($flagFromFrigo && !in_array($ingrediente['ingrediente'],$campi_valori))
                                                        echo "<span style='color: red;'> (ti manca)</span>";
                                                    echo "<br>";
                                                }
                                                pg_free_result($result2);
                                                
                                                echo "<div class='recipe-info'>";
                                                    echo "<div class='timer'>";
                                                        echo "<span class='material-symbols-outlined'>timer</span>";
                                                        echo $row['tempo']."'";
                                                    echo "</div>";
                                                    echo "<div class='recipe-flag'>";
                                                        echo"   
                                                            <span class='material-symbols-outlined' id='".$row['nomericetta']."piccante'>
                                                                local_fire_department
                                                            </span>
                                                            <span class='material-symbols-outlined' id='".$row['nomericetta']."glutenfree'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 48 48'><path fill='currentColor' fill-rule='evenodd' d='M44 24c0 11.046-8.954 20-20 20S4 35.046 4 24S12.954 4 24 4s20 8.954 20 20m-7.999 13.416A17.93 17.93 0 0 1 24 42c-9.941 0-18-8.059-18-18c0-4.738 1.83-9.048 4.823-12.263l3.97 3.97a1 1 0 0 0 1.414-1.414l-3.942-3.942A17.93 17.93 0 0 1 24 6c9.941 0 18 8.059 18 18c0 4.61-1.734 8.817-4.584 12.001l-8.545-8.544A5.73 5.73 0 0 0 31 23l-2.162.34A5.72 5.72 0 0 0 25 25.766v-2.923l1.162-.183A5.73 5.73 0 0 0 31 17l-2.162.34A5.72 5.72 0 0 0 25 19.766V18l.465-.465a5 5 0 0 0 0-7.07L24 9l-1.464 1.464a5 5 0 0 0 0 7.071L23 18v1.766a5.72 5.72 0 0 0-3.838-2.426L17 17a5.73 5.73 0 0 0 4.838 5.66l1.162.183v2.923a5.72 5.72 0 0 0-3.838-2.426L17 23a5.73 5.73 0 0 0 4.838 5.66l1.162.183v2.923a5.72 5.72 0 0 0-3.838-2.426L17 29a5.73 5.73 0 0 0 4.838 5.66l1.162.183V38h2v-3.547a1.78 1.78 0 0 0 1.162.207a5.73 5.73 0 0 0 4.15-2.935zm-7.907-7.907l-1.057-1.058a6 6 0 0 1-.875.209L25 28.843v2.923a5.73 5.73 0 0 1 3.094-2.257' clip-rule='evenodd'/></svg>
                                                            </span>
                                                            <span class='material-symbols-outlined' id='".$row['nomericetta']."fit'>
                                                                exercise
                                                            </span>
                                                            <span class='material-symbols-outlined' id='".$row['nomericetta']."stellato'>
                                                                filter_vintage
                                                            </span>
                                                            <span class='material-symbols-outlined' id='".$row['nomericetta']."vegan'>
                                                                eco
                                                            </span>
                                                            ";
                                                        if($row['isspicy']=='t')
                                                            echo "<script>document.getElementById('".$row['nomericetta']."piccante').style.display='block'</script>";
                                                        else
                                                            echo "<script>document.getElementById('".$row['nomericetta']."piccante').style.display='none'</script>";
                                                        if($row['isstar']=='t') 
                                                            echo "<script>document.getElementById('".$row['nomericetta']."stellato').style.display='block'</script>";
                                                        else
                                                            echo "<script>document.getElementById('".$row['nomericetta']."stellato').style.display='none'</script>";
                                                        if($row['islite']=='t') 
                                                            echo "<script>document.getElementById('".$row['nomericetta']."fit').style.display='block'</script>";
                                                        else
                                                            echo "<script>document.getElementById('".$row['nomericetta']."fit').style.display='none'</script>";
                                                        if($row['isvegan']=='t')
                                                            echo "<script>document.getElementById('".$row['nomericetta']."vegan').style.display='block'</script>";
                                                        else
                                                            echo "<script>document.getElementById('".$row['nomericetta']."vegan').style.display='none'</script>";
                                                        if($row['isglutenfree']=='t')
                                                            echo "<script>document.getElementById('".$row['nomericetta']."glutenfree').style.display='block'</script>";
                                                        else
                                                            echo "<script>document.getElementById('".$row['nomericetta']."glutenfree').style.display='none'</script>";
                                                    echo "</div>";
                                                echo"</div>";
                                            echo "</p>";
                                        echo "</div>";
                                        echo "<div class='recipe-img-div'>";
                                            echo "<div class='recipe-image'>";
                                                echo "<img src='immaginiricette/".$row['nomericetta'].".jpg' alt='' class='recipe-img'>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class='recipe-back'>";
                                echo "<p class='recipeDesc'>".$row['descrizione']."</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
            echo "</div>";

        echo "</div>";

        }
        pg_free_result($result);
        ?>

        <script>

            //funzione chiamata filtri
            var buttons = document.getElementsByClassName('butFiltro');
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener('click', function() {
                    if (this.value=="true") this.value="false";
                    else this.value="t";
                    console.log(this.value);
                    //mando tutti i filtri con una post con campo hidden filtri=true?
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'filtri.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('buttonclicked='+ encodeURIComponent(this.id) +'&'+ this.id +'=' + encodeURIComponent(this.value));
                    setTimeout(function() {
                        location.reload();
                    }, 10);
                });
            }

            //FUNZIONE TASTO TIPOLOGIA PIATTO
            function selezionaPortata(portata) {
                
                document.getElementById('tendinaButton').textContent = portata;
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'filtri.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('buttonclicked=flagPortata&portata=' + encodeURIComponent(portata));
                setTimeout(function() {
                    location.reload();
                }, 10);
                
            }
            //FUNZIONE SEARCHBAR
            document.getElementById('searchBar').addEventListener('input', function() {
                let nessunaricetta = document.getElementsByClassName('searchCatchNessunaRicetta');
                nessunaricetta=nessunaricetta[0];
                let filter = this.value.toLowerCase();
                let recipes = document.getElementById('recipeList').getElementsByClassName('recipe-div');
                var cont=0;

                for (let i = 0; i < recipes.length; i++) {
                    let recipe = recipes[i];
                    let text = recipe.getElementsByClassName('recipe')[0].id.replace("recipe_", "");

                    if (text.toLowerCase().indexOf(filter) > -1) {
                        recipe.style.display = "";//block
                        cont++;
                    } else {
                        recipe.style.display = "none";
                    }
                }

                if(cont==0){
                    nessunaricetta.style.display="block";
                    document.getElementById('quasi').style.display="none";
                }
                else{
                    nessunaricetta.style.display="none";
                    document.getElementById('quasi').style.display="";

                }
            });
    
            //FUNZIONI BOTTONI PREFERITI
            function fpreferiti(idbottone) {
                event.stopPropagation();
                var nomericettaprefe=idbottone.replace("Metti", "");
                document.getElementById("idBottonePrefeMetti"+nomericettaprefe).style.display = 'none';
                document.getElementById("idBottonePrefeTogli"+nomericettaprefe).style.display = 'inline-block';
                console.log(nomericettaprefe);
                var xhr = new XMLHttpRequest();
                // Set up our request
                xhr.open('POST', 'preferiti.php');
                // Set the content type that PHP is expecting
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                // Send the request with the JavaScript variable as data
                xhr.send('mettiORtogli='+ encodeURIComponent("metti") +'&ricetta=' + encodeURIComponent(nomericettaprefe));
            }
            function ftoglipreferiti(idbottone) {
                event.stopPropagation();
                var nomericettaprefe=idbottone.replace("Togli", "");
                document.getElementById("idBottonePrefeMetti"+nomericettaprefe).style.display = 'inline-block';
                document.getElementById("idBottonePrefeTogli"+nomericettaprefe).style.display = 'none';
                console.log(nomericettaprefe);
                var xhr = new XMLHttpRequest();
                // Set up our request
                xhr.open('POST', 'preferiti.php');
                // Set the content type that PHP is expecting
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                // Send the request with the JavaScript variable as data
                xhr.send('mettiORtogli='+ encodeURIComponent("togli") +'&ricetta=' + encodeURIComponent(nomericettaprefe));
            }
            
            window.onload = function() {
                var pulsanti = document.querySelectorAll('button[id^="idBottonePrefe"]');
                pulsanti.forEach(function(pulsante) {
                    pulsante.addEventListener('click', function() {
                        var nomericetta=this.id.replace("idBottonePrefe", "");
                        if(nomericetta.includes("Metti"))
                            fpreferiti(nomericetta);
                        if(nomericetta.includes("Togli"))
                            ftoglipreferiti(nomericetta);
                    });
                });
            };
        
            // funzione per ridurre il fontsize della nav a in base ai breakpoint
            var nav = document.querySelector('.nav');
            var nav_a = document.querySelectorAll('.nav a');
            var logo_title_p = document.querySelectorAll('.logo_title p');

            function adapt_size(){
                if(window.outerWidth < 890 && window.outerWidth > 590){
                    var newgap = 0.5 + (window.outerWidth-590)/60*0.2;
                    var newfontnav = 20 + (window.outerWidth-590)/60*2;
                    var newfontlogo = 15 + (window.outerWidth-590)/60;
                    nav.style.gap = newgap+'rem';   //0.5 + (width-590)/60*0.2
                    nav_a.forEach(element => {
                        element.style.fontSize = newfontnav+'px';  //20 + (width-590)/60*2
                    });
                    logo_title_p.forEach(element => {
                        element.style.fontSize = newfontlogo+'px'; //15 + (width-590)/60*1
                    });
                }
                else if(window.outerWidth <= 590 && window.outerWidth >= 0){
                    nav.style.gap = '0.5rem';
                    nav_a.forEach(element => {
                        element.style.fontSize = '20px';
                    });
                    logo_title_p.forEach(element => {
                        element.style.fontSize = '15px';
                    });
                }
                else{
                    nav.style.gap = '1.5rem';
                    nav_a.forEach(element => {
                        element.style.fontSize = '30px';
                    });
                    logo_title_p.forEach(element => {
                        element.style.fontSize = '20px';
                    });
                }
            }

            // funzione apertura e chiusura descrizione ricette
            function OpenCloseDesc(name){
                var inner = document.getElementById('inner_'+name);
                if(inner.style.transform == 'rotateY(180deg)')
                    inner.style.transform = 'rotateY(0deg)';
                else
                    inner.style.transform = 'rotateY(180deg)';        
            }
            var buttonsRecipe = document.querySelectorAll('div[id^="recipe_"]');
            buttonsRecipe.forEach(buttonRecipe => {
                buttonRecipe.addEventListener('click', function(){
                    var recipename = this.id.replace("recipe_", "");
                        OpenCloseDesc(recipename);
                });
            });
            function adapt_size_recipe(){
                var windowsize = window.outerWidth;
                var RecipeContainer = document.querySelector('.recipe-container');
                if(windowsize >= 1750){
                    RecipeContainer.style.gridTemplateColumns= "max-content max-content max-content";
                }
                else if(windowsize >= 1200 && windowsize < 1750){
                    RecipeContainer.style.gridTemplateColumns= "max-content max-content";
                }
                else if(windowsize < 1200 && windowsize >= 0){
                    RecipeContainer.style.gridTemplateColumns= "max-content";
                }
            }

            window.addEventListener('resize', function() {
                adapt_size();
                adapt_size_recipe();
            });
            adapt_size();
            adapt_size_recipe();

            // Funzioni modal Login/Signin

            // Fa apparire il modal del login
            document.getElementById('loginBtn').addEventListener('click', function(event) {
                document.getElementById('loginModal').style.display = 'block';
            });

            // Chiudi il modal cliccando fuori
            window.onclick = function(event) {
                if (event.target == document.getElementById('loginModal')) {
                    document.getElementById('loginModal').style.display = "none";
                    document.getElementById('erroreLogin').style.display = "none";
                    document.getElementById('erroreSignin').style.display = "none";
                }
                if (event.target == document.getElementById('registerModal')) {
                    document.getElementById('registerModal').style.display = "none";
                    document.getElementById('erroreLogin').style.display = "none";
                    document.getElementById('erroreSignin').style.display = "none";
                }
            } 

        </script>

        <?php
            // IL CODICE PHP GERSTISCE IL LOGIN/REGISTRAZIONE E IL PROFILO
            //DATABASE:
        
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tipo'])) {
                $tipo = $_POST['tipo'];
                //CASO LOGIN
                if($tipo == "login"){
                    $username = $_POST['usernameLogin'];
                    $password = $_POST['passwordLogin'];
                    $username = pg_escape_string($username);
                    $password = pg_escape_string($password);
                    $query = "SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
                    $result = pg_query($dbconn, $query);
                    if ($result) {
                        if (pg_num_rows($result) > 0) {  
                            if(!isset($_SESSION['user'])){               
                                $_SESSION['user'] = $username;
                                echo "<script>location.reload();</script>";
                            }
                        } 
                        else {
                            //echo "Nome utente o password non validi.";
                            echo "<script>
                            document.getElementById('loginModal').style.display = 'block';
                            document.getElementById('erroreLogin').style.display = 'block';
                            </script>";
                        }
                    }
                    else {
                        echo "Errore nella ricerca dell'utente: " . pg_last_error($dbconn);
                    }
                    pg_free_result($result);
                }
                //CASO REGISTRAZIONE
                if($tipo == "registrazione"){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $nome = $_POST['nome'];
                    $cognome = $_POST['cognome'];
                    if(!isset($_POST['isvegan'])) $isvegan="false"; else
                        $isvegan = $_POST['isvegan'];
                    if(!isset($_POST['intgluten'])) $intgluten = "false"; else
                        $intgluten = $_POST['intgluten'];  
                    $username = pg_escape_string($username);
                    $password = pg_escape_string($password);
                    $nome = pg_escape_string($nome);
                    $cognome = pg_escape_string($cognome);
                    $query="select * from utenti where username='$username'";
                    $result=pg_query($dbconn, $query);
                    if(pg_num_rows($result)>0){
                        echo "
                        <script>
                        document.getElementById('registerModal').style.display = 'block';
                        document.getElementById('erroreSignin').style.display = 'block';
                        </script>";
                    } else { 
                        if($username==""||$password=="")
                            echo "Registrazione fallita<br>inserisci i dati correttamente";
                        else{
                            $query="insert into utenti values ('$username','$nome','$cognome','$password',$isvegan,$intgluten); ";
                            pg_query($dbconn, $query);
                            // apri login
                            echo "<script>
                                document.getElementById('loginModal').style.display = 'block';
                            </script>";
                        }
                    }
                }
            }
            pg_close($dbconn);    
        ?>

    </body>
</html>