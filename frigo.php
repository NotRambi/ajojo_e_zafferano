<!DOCTYPE html>
<html lang="it">
<?php session_start();?>    
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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
    .descrizione-div{
        text-align: center;
        margin: 0px 20px;
        font-size: 20px;
    }
    .descrizione-div h2{
        margin-top: 3rem;
        margin-bottom: 1rem;
    }
    .descrizione-div p{
        margin: 0;
    }
    .body2 {
        padding: 30px;
        font-size: 20px;
        margin: 0;
        justify-content: center;
        align-items: center;
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
            left:0rem;
            color: white;
            transition: all 0.5s;
        }
        .logo_title p{
            color: white;
            transition: all 0.2s;
        }
    }
    .nav a:is(.FrigoLink){
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

    /* stili form */
    #myForm {
      background-color: #fff;
      border: 2px solid #333;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .input-group {
      margin-bottom: 10px;
    }
    .formLabel {
      font-weight: bold;
      font-size:25px;
    }
    .formInput{
      width: 300px;
      padding: 5px;
      border: 2px solid #bbb;
      border-radius: 10px;
      font-size:15px;
    }
    .formError{
      color: red; 
      font-size: 15px;
    }
    .formBtn {
      background-color: #ed6700;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      margin-right: 10px;
      transition: all 0.3s ease;
    }
    .formBtn:hover {
      background-color: #ed4f00;
      transition: all 0.3s ease;
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
  
    <br><br><br>

    <div class="descrizione-div">
        <h2>Cosa c'è nel tuo frigorifero?</h2>
        <p> Inserisci gli ingredienti che hai a disposizione e ti diremo cosa puoi cucinare! </p>
    </div>

    <div class="body2">
    <!-- vado a prendere gli ingredienti possibili dal db -->
    <?php
        //connessione al db
        $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
        or die('Could not connect: ' . pg_last_error());
        $result = pg_query($dbconn,'SELECT distinct ingrediente FROM ingredienti');
        //creao la datalist
        echo "<datalist id='suggerimenti'>";
        while ($row = pg_fetch_assoc($result)) {
            $ingrediente=$row['ingrediente'];
            $ingrediente=str_replace('_',' ',$ingrediente);
            echo "<option value='$ingrediente'></option>";
        }
        echo "</datalist>";
        //chiusura connessione
        pg_free_result($result);

        
    ?>
    
    <form id="myForm" onsubmit="return controllaCampionSubmit()" onchange="return validaInput()"  action="ricettario.php" method="post">
        <input type="hidden" name="frigo" value="true">
            <div class="input-group">
                <label class="formLabel">Ingredienti</label><br><br>
                <input class="formInput" list="suggerimenti" id="campo1" name="campo1">
                <div id="errore1" class="formError"></div>
            </div>
    </form>

    <button class="formBtn" onclick="aggiungiCampo(); ">Aggiungi Campo</button>
    <button class="formBtn" onclick="rimuoviCampo(); ">Rimuovi Ultimo Campo</button>
    <button class="formBtn" type="button" onclick="return submitForm()">prepara</button>
    </div>

    <!--Modal ad apparizione dei tasti login e signin-->
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
      
    <script>

        var nuovoCampoNum=1;
        var invalid=0;
    
        function validaInput() {
            //all'inizio di ogni chiamata resetto i campi errore
            invalid=0;
            for(var z=1;z<nuovoCampoNum+1;z++){
            var pulizia='errore'+z;
            document.getElementById(pulizia).innerText = "";
            }

            //controllo per ogni campo della form se l'ingrediente inserito è valido
            //se cosi non è scrivo nel suo campo errore e returno false
            for(var j=nuovoCampoNum;j>0;j--)
            {
            var actualcamp='campo'+j;
            var actualerr='errore'+j;
            var input = document.getElementById(actualcamp).value;
            var suggerimenti = Array.from(document.getElementById('suggerimenti').options);
            var trovato = false;
            for (var i = 0; i < suggerimenti.length; i++)
            {
                if (input === suggerimenti[i].value) {
                trovato = true;
                break;
                }
            }
            if (!trovato) {
                document.getElementById(actualerr).innerText = 'Si prega di selezionare un valore valido dall\'elenco.';
                invalid=1;
                return false;
            }
            
            for(var z=1;z<nuovoCampoNum+1;z++)
            {
                var campoz='campo'+z;
                if(z!=j && document.getElementById(campoz).value == document.getElementById(actualcamp).value){
                document.getElementById(actualerr).innerText = 'elemento inserito due volte';
                invalid=1;
                return false;
                }
            }  
                
            }
            return true;
        }

        function aggiungiCampo() {
            if(!validaInput()){
            document.getElementById("errore"+nuovoCampoNum).innerText = 'prima di creare un nuovo campo inserire un ingrediente valido nel campo precedente';
            return false;
            }
            var form = document.getElementById("myForm");
            var ultimoCampo = form.lastElementChild;
            nuovoCampoNum = parseInt(ultimoCampo.querySelector('.formInput').id.replace('campo', '')) + 1;
            
            var campoprecedente = "campo"+(nuovoCampoNum-1);
            var campoerrprec = "errore"+(nuovoCampoNum-1);

            
            if(document.getElementById(campoprecedente).value=="" || invalid){
            document.getElementById(campoerrprec).innerText = 'prima di creare un nuovo campo inserire un ingrediente valido nel campo precedente';
            nuovoCampoNum--;
            return false;
            }
            document.getElementById(campoerrprec).innerText ="";

            var nuovoCampo = document.createElement("div");
            nuovoCampo.className = "input-group";
            //ho perso due ore e mezza per questa linea:
            nuovoCampo.innerHTML = '<input class="formInput" list="suggerimenti" id="campo' + nuovoCampoNum + '" name="campo' + nuovoCampoNum + '"><div id="errore' + nuovoCampoNum +'" class="formError"></div>';
            form.appendChild(nuovoCampo);
        }

        function rimuoviCampo() {
            var form = document.getElementById("myForm");
            var campi = form.getElementsByClassName("input-group");
            if (campi.length > 1) {
            nuovoCampoNum=nuovoCampoNum-1;
            form.removeChild(campi[campi.length - 1]);
            validaInput();
            } else {      
            document.getElementById("campo1").value="";
            document.getElementById("errore1").innerText = "";
            }
        }

        function submitForm() {
            if(!controllaCampionSubmit())
            return false;
            else
            document.getElementById("myForm").submit();
        }

        function controllaCampionSubmit() {
            if(validaInput==false) return false;
            for(var z=1;z<nuovoCampoNum+1;z++){
            var campoz='campo'+z;
            if(document.getElementById(campoz).value==""){
                //DA CAMBIARE CON QUALCOSA DI PIU CARINO
                alert('Si prega di compilare tutti i campi.');
                return false;
            }
            }
            return true;
        }

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
        window.addEventListener('resize', function() {
            adapt_size();
        });
        adapt_size();

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
