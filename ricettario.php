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

        /* stili nav */
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
            padding:0.8rem 0;
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
                left:0rem;
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
        }
        .logo_title{
            position: relative;
            left:-5rem;
            transition: all 0.5s;
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
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            gap:1rem;
        }
        .recipe-div{
            display:flex;
        }
        .recipe{
            width:500px;
            border: 4px solid #333;
            background-color:#fff;
            border-radius: 10px;
            padding: 15px;
        }
        .recipe:hover{
            cursor:pointer;
        }
        .recipe-descSlide{
            display:none;
            border: 4px solid #333;
            background-color:#fff;
            border-radius: 10px;
            padding: 15px;
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
        .recipe-content{
            margin-top:0.5rem;
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
            border-radius: 10px;
        }

        /* stili modal */
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
    </style>
    
</head>
<body>

    

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
    
    <br><br><br><br>

    <?php
        $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
        or die('Could not connect: ' . pg_last_error());
        $result = pg_query($dbconn,"select * from filtri");
        $row = pg_fetch_assoc($result);
        //setto i pulsanti
    ?>
    
    <button name="flagPiccante" id="flagPiccante" value="<?php if($row['flagpiccante']=='t') echo 'true'; else echo 'false';?>" class="butFiltro firstBtn"> piccante </button>
    <button name="flagGlutine" id="flagGlutine" value="<?php if($row['flagglut']=='t') echo 'true'; else echo 'false';?>" class="butFiltro"> glutine </button>
    <button name="flagLeggero" id="flagLeggero" value="<?php if($row['flaglite']=='t') echo 'true'; else echo 'false';?>" class="butFiltro"> leggero </button>
    <button name="flagStar" id="flagStar" value="<?php if($row['flagstar']=='t') echo 'true'; else echo 'false';?>" class="butFiltro"> stella </button>
    <button name="flagVegan" id="flagVegan" value="<?php if($row['flagvegan']=='t') echo 'true'; else echo 'false';?>" class="butFiltro"> vegano </button>
    <button name="reset" id="reset" value="0" class="butFiltro"> resetta filtri </button>


    
    <!--Modal ad apparizione dei tasti login e signin-->
    <!-- Modal di login -->
    <div id="loginModal" class="modal">
            <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="tipo" value="login">
                <p class="title">Login </p>
                <p style="display:none;" id="erroreLogin"> credenziali errate </p>
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
            <p style="display:none;" id="erroreSignin"> errore registrazione </p>
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
    
    <script>
        
    //funzione chiamata filtri
    var buttons = document.getElementsByClassName('butFiltro');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            if (this.value=="true") this.value="false";
            else this.value="true";
            console.log(this.value);
            //mando tutti i filtri con una post con campo hidden filtri=true?
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'filtri.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('buttonclicked='+ encodeURIComponent(this.id) +'&'+ this.id +'=' + encodeURIComponent(this.value));
            location.reload();
        });
    }
    </script>


    <?php
    
    $query="SELECT * from ricetta";
    $flagFromFrigo=false;//una flag che mi serve bella stampa per un controllo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        //HO CLICCATO UN'IMMAGINE SULLA HOME
        if(isset($_POST["ricetta"])){
            
            $ricetta=pg_escape_string($_POST["ricetta"]);
            $query="select * from ricetta where nomericetta='$ricetta'";

        } else //ARRIVO DAL FRIGO
            if(isset($_POST["frigo"])){
                
                

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
            
        } else {
            $query="SELECT * from ricetta";
    }





    //METTO I FILTRI E INTOLLERANZE
    $row=pg_fetch_assoc(pg_query($dbconn,"select * from filtri"));
    if($row['flagpiccante']=='t') $piccante="true"; else $piccante="false";
    if($row['flagstar']=='t') $star="true"; else $star="false";
    if($row['flaglite']=='t') $lite="true"; else $lite="false";
    if($row['flagvegan']=='t') $flagvegan="true"; else $flagvegan="false";
    if($row['flagglut']=='t') $gluten="true"; else $gluten="false";

    if($piccante=="true")
        echo "<script>
        document.getElementById('flagPiccante').style.color = 'green';
        </script>";
    else
        echo "<script>
        document.getElementById('flagPiccante').style.color = 'red';
        </script>";

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
    else{//non sono loggato

        $postquery=$postquery."
        (a.isvegan or '$flagvegan') and
        (a.isglutenfree or '$gluten') and
        ";


    }
    

    

    //per aggiungere il filtro non piccante (not a.isspicy or '$Notpiccante') and
    $postquery=$postquery."
    (a.isspicy or '$piccante') and
    (a.isstar or '$star') and
    (a.islite or '$lite')
    ";
    $query=$prequery.$query.$postquery;
    
    
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
        echo "<br><h2>non ci sono ricette per te che sei date le tue intolleranze o filtri con questi ingredienti</h2>";
    } else 


    //STAMPO LE RICETTE con tasti preferiti
    echo "<div class='content'>";
        if($flagVuota) echo "<h2>non hai tutti gli ingredienti per una ricetta completa ma hai quasi:</h2>";
            echo "<div class='recipe-container'>";
        while ($row = pg_fetch_assoc($result)) {
            $vuota=false;
            echo "<div class='recipe-div'>";
                echo "<div class='recipe' id='recipe_".$row['nomericetta']."'>";
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

                    echo "<div class='recipe-content'>";
                        echo "<div class='recipe-desc'>";
                            echo "<p>";
                                $query2="SELECT * FROM ingredienti where ricetta= '$ricetta'";
                                $result2=pg_query($dbconn,$query2);
                                while($ingrediente=pg_fetch_assoc($result2)){
                                    echo $ingrediente['ingrediente'];
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
                                                hotel_class
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
                echo "<div class='recipe-descSlide' id='slider_".$row['nomericetta']."'>";
                    echo "<p class='recipeDesc'>".$row['descrizione']."</p>";
                echo "</div>";
            echo "</div>";
        }
        echo "</div>";

    echo "</div>";
    pg_free_result($result);
    pg_close($dbconn);
    ?>

    <script>
 
        //FUNZIONI BOTTONI
        function fpreferiti(idbottone) {
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
            var user='rambi'; //DA TOGLIERE
            xhr.send('mettiORtogli='+ encodeURIComponent("metti") +'&ricetta=' + encodeURIComponent(nomericettaprefe));
            
        }


        function ftoglipreferiti(idbottone) {
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

    // funzione apertura e chiusura descrizione ricette
    function OpenCloseDesc(name){
        var slider = document.getElementById('slider_'+name);
        if(slider.style.display == 'block')
            slider.style.display = 'none';
        else
            slider.style.display = 'block';
    }
    var buttonsRecipe = document.querySelectorAll('div[id^="recipe_"]');
    buttonsRecipe.forEach(buttonRecipe => {
        buttonRecipe.addEventListener('click', function(){
            var recipename = this.id.replace("recipe_", "");
                OpenCloseDesc(recipename);
        });
    });
    function adapt_size_desc(){
        var windowsize = window.outerWidth;
        var RecipeSlide = document.querySelectorAll('.recipe-descSlide');
        var RecipeDiv = document.querySelectorAll('.recipe-div');
        if(windowsize >= 960){
            RecipeSlide.forEach(element => {
                element.style.width = "300px";
            });
            RecipeDiv.forEach(element => {
                element.style.flexDirection = "row";
            });
        }
        else if(windowsize < 960 && windowsize >= 0){
            RecipeSlide.forEach(element => {
                element.style.width = "500px";
            });
            RecipeDiv.forEach(element => {
                element.style.flexDirection = "column";
            });
        }
    }

    window.addEventListener('resize', function() {
        adapt_size();
        adapt_size_desc();
    });
    adapt_size();
    adapt_size_desc();

    </script>

<?php
        // IL CODICE PHP GERSTISCE IL LOGIN/REGISTRAZIONE E IL PROFILO
        //DATABASE:
        $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
        or die('Could not connect: ' . pg_last_error());    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipo = $_POST['tipo'];
            //CASO LOGIN
            if($tipo == "login"){
                $username = $_POST['usernameLogin'];
                $password = $_POST['passwordLogin'];
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
                        echo "registrazione avvenuta con successo";
                    }
                }
            }
        }
        pg_close($dbconn);    
        ?>

</body>
</html>