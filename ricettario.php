<!DOCTYPE html>
<html lang="it">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricettario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 30px;
            font-size: 20px;
            margin: 0;
            justify-content: center;
            align-items: center;
        }

        nav {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            font-size: 55px;
        }
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 15px 25px 10px;
            text-decoration: none;
            border-right: 1px solid white; /* Separatore tra i link */
        }
        nav a img{
            padding-top: 6px;
            height: 50px;
            width: 50px;
        }
        .ricettarioButton{
            padding-top: 10px;
            padding-bottom: 20px;
        }
        .loginButton{
            float: right;
            padding-top: 10px;
            padding-bottom: 20px;
        }

        nav a:last-child {
            border-right: none;
        }

        nav a:hover {
            background-color: #6c6a6a;
        }

        .content {
            padding: 20px;
        }

        .recipe {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .recipe h2 {
            margin-top: 0;
        }

        /* Stili per il modal */
        .modal {
            display: none; /* Il modal è nascosto per impostazione predefinita */
            position: fixed;
            z-index: 11;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.7);
        }
        body.modal-open, html.modal-open {overflow: hidden;}

        .modal-content {
            background-color: #fdfdfdce;
            margin: 15% auto;
            margin-top: 0%;
            top: 15%;
            padding: 0px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            height: 550px;
            position:relative;
        }
        /* Stili per il form di login */
        #loginForm input[type=text], 
        #loginForm input[type=password] {
            width: 80%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 20px;
            font-style: normal;
            text-align: center;
        }
        #loginForm button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 80%;
            font-size: 20px;
            font-style: normal;
        }
        
        #loginForm button:hover {
            opacity: 0.8;
        }
        /* Stili per il link di chiusura del modal */
        .close {
            background-color: white;
            color: #aaa;
            border: 1px solid black;
            float: right;
            font-size: 28px;
            font-weight: bold;
            width: 40px;
            height: 50px;
            position:absolute;
            right:5%;
        }
        .close:hover,
        .close:focus {
            background-color: white;
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    <nav>
      <a href="index.php"> <img src="logohome.jpg" width="50" height="50"> </a> </a>
      <a href="frigo.php"><img src="frigo.jpg" width="50" height="50"> </a>
      <a href="ricettario.php" class="ricettarioButton">ricettario</a>
      <a class="loginButton" onclick="openModal()">Login</a> 
    </nav>
  
    <br><br><br><br>
    
    
    <button name="flagPiccante" id="flagPiccante" value="true" class="butFiltro"> picante </button>
    <button name="flagGlutine" id="flagGlutine" value="true" class="butFiltro"> glutine </button>
    <button name="flagLeggero" id="flagLeggero" value="true" class="butFiltro"> leggero </button>
    <button name="flagStar" id="flagStar" value="true" class="butFiltro"> stella </button>
    
    
    <script>
        
    //funzione chiamata filtri
    var buttons = document.getElementsByClassName('butFiltro');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            if (this.value=="true") this.value="false";
            else this.value="true";
            
            //mando tutti i filtri con una post con campo hidden filtri=true?
        });
    }
    </script>


    <?php
    
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=biar") 
    or die('Could not connect: ' . pg_last_error());
    $flagFromFrigo=false;//una flag che mi serve bella stampa per un controllo
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //HO CLICCATO UN'IMMAGINE SULLA HOME
        if(isset($_POST["ricetta"])){

            $ricetta=pg_escape_string($_POST["ricetta"]);
            
            $query="select * from ricetta where nomericetta='$ricetta'";
            echo $query;
        } else {

            //arrivo dal frigo
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
        //se ho refreshato cancello il frigo cosi se clicco su un filtro non mi ricarica il frigo
    }




    

    //METTO I FILTRI
    /*
    select distinct nomericetta,tempo,tipologia,difficolta,isspicy,isglutenfree,a.isvegan,isstar,islite,descrizione
    from utenti, ( ... ) as a where username='$utente' and
    (a.isvegan=true or utenti.isvegan=false) and
    (a.isglutenfree=true or utenti.intgluten=false)
    */
    

    if(isset($_SESSION['user'])){

        $utente=$_SESSION['user'];

        //$notpiccante="true";
        //$star="true";
        //$lite="true";
        //$flagvegan="true";
        //$notpiccante=$_SESSION['flagPiccante'];
        //$star=$_SESSION['flagStar'];
        //if(isset($_SESSION['flagLeggero']))
        //    $lite=$_SESSION['flagLeggero'];
        //echo $lite;
        //$flagvegan=$_SESSION['user'];
        


        $prequery="select distinct nomericetta,tempo,tipologia,difficolta,isspicy,isglutenfree,a.isvegan,isstar,islite,descrizione
        from utenti,(";
        
        $postquery=") as a where username='$utente' and
        (a.isvegan=true or utenti.isvegan=false) and
        (a.isglutenfree=true or utenti.intgluten=false)
        ";
        $query=$prequery.$query.$postquery;
    }
    //CONTROLLO LA QUERY SIA NON VUOTA IN CASO
    //LA RICREO CON RICETTE INCOMPLETE
    $result = pg_query($dbconn,$query);
    $flagVuota=false;//utile per un controllo nella stampa
    
    if(pg_num_rows($result)==0){
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
        $query=$prequery.$query.$postquery;//intolleranze, e filtri?
        $result = pg_query($dbconn,$query);
        $flagVuota=true;
    }
    if(pg_num_rows($result)==0){
        echo "<br><h2>non ci sono ricette per te che sei date le tue intolleranze con questi ingredienti</h2>";
    } else {



    



        //STAMPO LE RICETTE con tasti preferiti
        echo "<div class='content'>";
        if($flagVuota) echo "<h2>non hai tutti gli ingredienti per una ricetta completa ma hai quasi:</h2>";
        while ($row = pg_fetch_assoc($result)) {
            $vuota=false;
            echo "<div class='recipe'>";
                echo "<h2>";
                
                    echo str_replace('_', ' ', $row['nomericetta']);
                    $ricetta=$row['nomericetta'];

                    //BOTTONI PER I PREFERIRI UNO DEI DUE SARA INVISIBILE IN BASE ALL'UTENTE
                    //SE NON LO LOGGATO INVISIBILI ENRTAMBI?
                    
                    if(isset($_SESSION['user'])){
                        
                        $idmettiprefe="idBottonePrefeMetti".$ricetta;
                        $idtogliprefe="idBottonePrefeTogli".$ricetta;
                        $user=$_SESSION['user'];
                        $querypreferiti="select * from preferiti where username='$user' and ricetta='$ricetta'";
                        
                        $resultpreferiti=pg_query($dbconn,$querypreferiti);
                        echo "<button id=$idmettiprefe class='buttonprefe mettiprefe'> &star; </button>";
                        echo "<button id=$idtogliprefe class='buttonprefe togliprefe'> togli prefe </button>";
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


                    echo "</h2>";
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
                    echo "<br>";


                    echo $row['descrizione'];
                    echo "<br>";
                    echo $row['tempo'];
                    echo " minuti";
                echo "</p>";
            echo "</div>";
        }

            
    }        

    echo "</div>";
    echo "<br><br><br>";
    pg_free_result($result);
    pg_close($dbconn);
    ?>

    <script>
        //da aggiungere funzioni modal e i modal di sopra


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

        
        

    </script>

</body>
</html>