<!DOCTYPE html>
<html lang="it">
<?php session_start(); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <title>Il mio Profilo</title>
        <link rel="icon" href="logo.png" type="image/x-icon">
        <style>
            *{
                font-family: "Poppins", sans-serif;
            }
            body{
                background-color: #f8fadd;
                min-height: 600px;
                min-width: 582px;
            }
            .logoDiv{
                align-items: center;
                justify-content: center;
                display: flex;
                width: 100%;
                margin-top:1rem;
            }
            .MainLogo{
                width: 270px;
                border-radius:20px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
            }
            .logo_img{
                width: 100px;
                height: 100px;
            }
            .logo_title{
                position: relative;
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
                position: relative;
                font-weight: bold;
                font-size: 30px;
                color: #ed6700;
            }
            .logo_title .ajojo_{
                top:0.1rem
            }
            .logo_title .zafferano_{
                top: -0.1rem;
                left: 1.5rem;
            }
            .profile-container {
                max-width: 600px;
                margin: 50px auto;
                margin-top:2rem;
                padding: 20px;
                border: 5px solid #333;
                border-radius: 20px;
                background-color: #fff;
                display: flex;
                flex-direction: column;
                align-items: left;
            }
            .title{
                color:#ed6700;
                font-size: 30px;
                font-weight: bold;
                text-align: center;
            }

            /* Stile per le informazioni del profilo */
            .profile-info {
                margin-bottom: 1rem;
                text-align: left;
            }
            .profile-info p{
                margin: 0.5rem;
                font-size:20px;
            }
            .profile-info input:not(.check){
                font-size:20px;
                border-radius:5px;
                width: 200px;
            }
            .check{
                width: 20px;
                height: 20px;
            }
            .div-campoprofilo{
                display: flex;
                justify-content: row;
                align-items:center;
            }

            /* Stile per il titolo delle informazioni */
            .info-title {
                font-weight: bold;
            }
            .valore{
                font-style: italic;
            }
            .modifica{
                display: none;
            }
            .form-btn button,
            .form-btn input,
            .btn-vari button:not(.delBtn){
                border: none;
                outline: none;
                padding: 10px;
                border-radius: 10px;
                width: 200px;
                color: #fff;
                font-size: 16px;
                background-color: #ed6700;
                transition: all 0.3s ease;
            }
            .form-btn button:hover,
            .form-btn input:hover,
            .btn-vari button:not(.delBtn):hover {
                background-color: #ed4f00;
                transition: all 0.3s ease;
            }
            .profileBtn{
                width: 100%;
                display:flex;
                gap:1rem;
                justify-content: center;
            }
            .form-btn{
                width: 100%;
                display:flex;
                gap:1rem;
                justify-content: center;
                align-items:center;
            }
            .preferiti{
                margin-top:2rem;
                display:flex;
                flex-direction:column;
                gap:0.5rem;
                font-size: 22px;
                font-style:normal;
            }
            .ricette-div-title{
                margin:0;
                padding:0;
                margin-left:1rem;
                margin-bottom:1rem;
            }
            .divpref{
                height: 2rem;
                display:flex;
                flex-direction:row;
                align-items:center;
                gap:1rem;
                font-size: 20px;
                margin-left:1rem;
                margin-bottom:1rem;
            }
            .prefBtn{
                display:flex;
                flex-direction:row;
                align-items:center;
                margin:0;
            }
            .prefBtn:hover{
                scale:1.1;
                .barrapref{
                    display:block;
                }
            }
            .divpref button{
                background:none;
                border:none;
                z-index: 2;
            }
            .material-symbols-outlined {
                font-variation-settings:
                'FILL' 0,
                'wght' 700,
                'GRAD' 0,
                'opsz' 24
            }
            .pref-logo{
                color:#ed4f00;
            }
            .barrapref{
                display:none;
                scale:1.1;
                margin:0;
                padding:0;
                left:-21px;
                top: -1.5px;
                color:#ed4f00;
                position: relative;
                font-size:25px;
                font-weight:bold;
                transform: rotate(45deg);
            }
            .nopref{
                margin:0;
                padding:0;
                margin-left:1rem;
                font-size:20px;
                font-weight:500;
            }
            .divDelBtn{
                width: 100%;
                display:flex;
                justify-content: center;
            }
            .delBtn{
                border: none;
                outline: none;
                padding: 10px;
                border-radius: 10px;
                width: 200px;
                color: #fff;
                font-size: 16px;
                transition: all 0.3s ease;
                background-color:#222;
                position:relative;
                margin-top:3rem;
                margin-bottom:1rem;
            }
            .delBtn:hover{
                background-color:#111;
                transition: all 0.3s ease;
            }

            .ricettapreferita{

                cursor:pointer;
            }

        </style>
    </head>

    <body>

        <!-- div logo cliccabile per tornare alla pagina principale -->
        <div class="logoDiv">
            <a class="MainLogo" href="index.php">
                <img src="logo.png" class="logo_img">
                <div class="logo_title">
                    <p class="ajojo_">Ajojo &</p>
                    <p class="zafferano_">Zafferano</p>
                </div>
            </a>
        </div>

        <?php
            // FUNZIONE PHP PER LA GESTIONE DELL'UTENTE DA MOSTRARE
            // in questo file il corpo del sito è creato interamente da php visto che bisognerà gestire gli elementi da mostrare in base all'utente connesso

            $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
            or die('Could not connect: ' . pg_last_error());

            $utente=$_SESSION['user'];

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST['username'];
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                $password = $_POST['password'];

                if(!isset($_POST['isvegan']))
                    $isvegan="false"; 
                else
                    $isvegan = $_POST['isvegan'];
                if(!isset($_POST['intgluten'])) 
                    $intgluten = "false"; 
                else
                    $intgluten = $_POST['intgluten'];

                if($username==""||$password=="")
                    echo "aggiornamento credenziali fallito<br>inserisci i dati correttamente";
                else{
                    $username = pg_escape_string($username);
                    $nome = pg_escape_string($nome);
                    $cognome = pg_escape_string($cognome);
                    $password = pg_escape_string($password);
                    $query="UPDATE utenti SET username='$username',nome='$nome',cognome='$cognome',password='$password',isvegan='$isvegan',intgluten='$intgluten' WHERE username='$utente'";
                    pg_query($dbconn, $query);
                    $_SESSION['user']=$username;  
                }
            }

            $utente=$_SESSION['user'];
            $query="select * from utenti where username = '$utente'";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_assoc($result);

            // HTML DELLA PAGINA
            echo "<div class='profile-container'>";
                echo "<form action='profilo.php' method='post'>";
                    echo "<h2 class='title'>Il mio Profilo</h2>";

                    echo "<div class='profile-info'>";

                        echo "<div class='div-campoprofilo'>";
                            echo "<p class='info-title'>Nome:</p>";
                            echo "<p class='modifica'>";
                                echo "<input type='text' name='nome' value='" . $row['nome'] . "'>";
                            echo "</p>";
                            echo "<p class='valore'>";
                                echo $row['nome'];
                            echo "</p>";
                        echo "</div>";

                        echo "<div class='div-campoprofilo'>";
                            echo "<p class='info-title'>Cognome:</p>";
                            echo "<p class='modifica'>";
                                echo "<input type='text' name='cognome' value='" . $row['cognome'] . "'>";
                            echo "</p>";
                            echo "<p class='valore'>";
                                echo $row['cognome'];
                            echo "</p>";
                        echo "</div>";

                        echo "<div class='div-campoprofilo'>";
                            echo "<p class='info-title'>Username:</p>";
                            echo "<p class='modifica'>";
                                echo "<input type='text' name='username' value='" . $row['username'] . "'>";
                            echo "</p>";
                            echo "<p class='valore'>";
                                echo $row['username'];
                            echo "</p>";
                        echo "</div>";

                        echo "<div class='div-campoprofilo'>";
                            echo "<p class='info-title'>Password:</p>";
                            echo "<p class='modifica'>";
                                echo "<input type='text' name='password' value='" . $row['password'] . "'>";
                            echo "</p>";
                            echo "<p class='valore'>";
                                echo $row['password'];
                            echo "</p>";
                        echo "</div>";

                        echo "<div class='div-campoprofilo'>";
                            echo "<p class='info-title'>Sei vegano:</p>";
                                    echo "<p class='modifica'>";
                                    if($row['isvegan']=='f')
                                        echo "<input class='check' type='checkbox' name='isvegan' value='true'>";
                                    else
                                        echo "<input class='check' type='checkbox' name='isvegan' value='true' checked>";
                                    echo "</p>";
                            echo "<p class='valore'>";
                                if($row['isvegan']=='f') echo "no";
                                else echo "si";
                            echo "</p>";
                        echo "</div>";

                        echo "<div class='div-campoprofilo'>";
                            echo "<p class='info-title'>Sei intollerante al glutine:</p>";
                                    echo "<p class='modifica'>";
                                    if($row['intgluten']=='f')
                                        echo "<input class='check' type='checkbox' name='intgluten' value='true'>";
                                    else
                                        echo "<input class='check' type='checkbox' name='intgluten' value='true' checked>";
                                    echo "</p>";
                            echo "<p class='valore'>";
                                if($row['intgluten']=='f') echo "no";
                                else echo "si";
                            echo "</p>";
                        echo "</div>";

                    echo "</div>";
                    echo "<div class='form-btn'>";
                        echo "<input type='submit' value='Invia modifiche' class='modifica subBtn'>";
                        echo "<button onclick='mostraModulo()' class='modifica'>Annulla modifiche</button>";
                    echo "</div>";
                echo "</form>";

                echo "<div class='btn-vari'>";
                    echo "<div class='divDelBtn'>";
                        echo "<button class='modifica delBtn' onclick='cancellaProfilo()'>Elimina profilo</button>";
                    echo"</div>";
                    echo "<div class='profileBtn'>";
                        echo "<button onclick='mostraModulo()' class='valore'>Modifica Profilo</button> ";
                        echo "<button onclick='logOut()' class='valore'>Logout</button>";
                    echo "</div>";
                echo "</div>";

                echo "<div class='preferiti valore'>";
                    echo "<h3 class='ricette-div-title'>ricette preferite:</h3>";
                    $query="select distinct ricetta from preferiti where username='$utente' order by ricetta";
                    $result = pg_query($dbconn, $query);

                    if(pg_num_rows($result)<=0){
                        echo "<h4 class='nopref'>nessuna ricetta preferita</h4>" ;
                    }
                    while ($row = pg_fetch_assoc($result)) {
                        $ricetta=$row["ricetta"];
                        $idtogliprefe="idBottonePrefeTogli".$ricetta;
                        echo "<div class='divpref'>";
                            echo "<div class='ricettapreferita' id='$ricetta'>".str_replace('_', ' ', $ricetta)."</div><div class='prefBtn'><button class='material-symbols-outlined pref-logo' id=$idtogliprefe>favorite</button><p class='barrapref'>|</p></div>";
                        echo"</div>";
                    }
                echo "</div>";

            echo "</div>";

            pg_free_result($result);
            pg_close($dbconn);
        ?>

        <script>

            // funzioni per la modifica del profilo
            flag=true;
            flagLogOut=false;
            function mostraModulo() {
                event.preventDefault();
                if(flag){
                    var paragrafi = document.querySelectorAll(".modifica");
                    for (var i = 0; i < paragrafi.length; i++) {
                        paragrafi[i].style.display = "block";
                    }
                    var paragrafi = document.querySelectorAll(".valore");
                    for (var i = 0; i < paragrafi.length; i++) {
                        paragrafi[i].style.display = "none";
                    }
                }
                else{
                    var paragrafi = document.querySelectorAll(".modifica");
                    for (var i = 0; i < paragrafi.length; i++) {
                        paragrafi[i].style.display = "none";
                    }
                    var paragrafi = document.querySelectorAll(".valore");
                    for (var i = 0; i < paragrafi.length; i++) {
                        paragrafi[i].style.display = "block";
                    }
                    location.reload();
                }
                flag=!flag;
            }

            // funzione gestione preferiti, tramite XML
            function ftoglipreferiti(idbottone) {
                var nomericettaprefe=idbottone.replace("Togli", "");
                console.log(nomericettaprefe);
                var xhr = new XMLHttpRequest();
                // Set up our request
                xhr.open('POST', 'preferiti.php');
                // Set the content type that PHP is expecting
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                // Send the request with the JavaScript variable as data
                xhr.send('mettiORtogli='+ encodeURIComponent("togli") +'&ricetta=' + encodeURIComponent(nomericettaprefe));
                location.reload();
            }

            window.onload = function() {
                var pulsanti = document.querySelectorAll('button[id^="idBottonePrefe"]');
                pulsanti.forEach(function(pulsante) {
                    pulsante.addEventListener('click', function() {
                        var nomericetta=this.id.replace("idBottonePrefe", "");
                        
                        if(nomericetta.includes("Togli"))
                            ftoglipreferiti(nomericetta);
                    });
                });
            };

            // funzione log out, tramite XML
            function logOut() {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'logout.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send();
                window.location.href="index.php";
            }

            // funzione cancella profilo, tramite XML
            function cancellaProfilo(){
                event.preventDefault();

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delUser.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send();
                logOut();
            }

            // funzione reinderizzamento a ricettario cliccando sulle ricette nei preferiti
            function inviaForm(event) {
                resetFiltri();

                // form nascosta 
                console.log(event.target.id);
                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "ricettario.php");

                // input nascosto con il nome della ricetta
                var input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "ricetta");
                input.setAttribute("value", event.target.id);

                // Aggiunta input alla form e submit
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
            
            var ricettapreferita = document.getElementsByClassName("ricettapreferita");
            for (var i = 0; i < ricettapreferita.length; i++) {
                // salva in una variabile l'id della card cliccata
                ricettapreferita[i].addEventListener("click", inviaForm);
                
            }

            // reset filtri
            function resetFiltri() {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'filtri.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('buttonclicked=reset');
            }

        </script> 
        
    </body>
</html>
