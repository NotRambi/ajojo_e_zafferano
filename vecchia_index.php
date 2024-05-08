<!DOCTYPE html>
<html lang="it">
<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--per qualche motivo con questi due il titolo non è piu in grassetto-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <title>Ajojo & Zafferano</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8fadd;
            padding: 30px;
            font-size: 20px;
            margin: 0;
            justify-content: center;
            align-items: center;
        }

        
        /* Stili della barra di navigazione */
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
            padding: 0px 25px 10px;
            text-decoration: none;
            border-right: 1px solid white; /* Separatore tra i link */
        }

        #profileBtn,
        #changeAccount,
        #loginBtn{
            float: right;
        }
        /* Rimuove il bordo destro dall'ultimo link */
        nav a:last-child {
            border-right: none;
        }

        nav a:hover {
            background-color: #6c6a6a;
        }

        /* Stili per lo scorrimento delle img */

        .carousel-item img {
            width: 40%;
            height: auto; /* Imposta l'altezza in proporzione alla larghezza */
            object-fit: cover; /* Per mantenere le proporzioni e riempire l'area */
        }
        .carousel-control-prev,.carousel-control-next{
            width: 25%;
            height: auto;
            
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
            padding: 20px;
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
        }
        #loginForm button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 80%;
        }

        #loginForm button:hover {
            opacity: 0.8;
        }
        /* Stili per il link di chiusura del modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            width: 40px;
            position:absolute;
            right:5%;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .immaginecliccabile {
            cursor: pointer;
        }
    </style>

    
</head>
<body class="text-center">
    
<br><br><br>

    <?php
    // IL CODICE PHP GERSTISCE IL LOGIN/REGISTRAZIONE E IL PROFILO
    //DATABASE:
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
    or die('Could not connect: ' . pg_last_error());    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $tipo = $_POST['tipo'];
        //CASO LOGIN
        if($tipo == "login"){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
            $result = pg_query($dbconn, $query);
            if ($result) {
                if (pg_num_rows($result) > 0) {
                    echo "Accesso consentito!";
                    //nascondo login e mostro profilo
                    echo "<script>document.getElementById('profileBtn').style.display = 'block';</script>";
                    echo "<script>document.getElementById('loginBtn').style.display = 'none';</script>";
                    
                    $_SESSION['user'] = $username;
                } else {
                    echo "Nome utente o password non validi.";
                }
            } else {
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


            if($username==""||$password=="")
                echo "Registrazione fallita<br>inserisci i dati correttamente";
            else{
                $query="insert into utenti values ('$username','$nome','$cognome','$password',$isvegan,$intgluten); ";
                pg_query($dbconn, $query);
                echo "query returned succesfully";  
            }
        }
    }
    pg_close($dbconn);    
    ?>



    <nav>
        <a href="index.php"> <img src="logo.png" width="50" height="50"> </a> </a>
        <a href="frigo.php"><img src="frigo.jpg" width="50" height="50"> </a>
        <a href="ricettario.php">ricettario</a>
        <a id="loginBtn" class="button" href="#">Login/SignIn</a>
        <a id="profileBtn" class="button" style="display:none;" href="profilo.php"> Profilo </a>
        
    </nav>
    <br><br><br>

    <?php
    if(isset($_SESSION['user'])){
        echo "<script>document.getElementById('changeAccount').style.display = 'block';</script>";
        echo "<script>document.getElementById('profileBtn').style.display = 'block';</script>";
        echo "<script>document.getElementById('loginBtn').style.display = 'none';</script>";
    } 
    ?>

    

<!-- carosello immagine e script che gestisce l'invio al ricettario co quella ricetta-->
    
    <h1>Ricette consigliate</h1>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
        <div class="carousel-indicators">
            <button data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
            <button data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
            <button data-bs-target="#myCarousel" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="immaginihome/homeimg1.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="ajojo">
            </div>
            <div class="carousel-item">
                <img src="immaginihome/homeimg2.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="carbonara">
            </div>
            <div class="carousel-item">
                <img src="immaginihome/homeimg3.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="amatriciana">
            </div>
            <div class="carousel-item">
                <img src="immaginihome/homeimg4.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="puntarelle">
            </div>
        </div>
        

        <button class="carousel-control-prev" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <br><br>

    
    <h1>Antipasti</h1>

    <div id="myCarousel2" class="carousel slide">
        <div class="carousel-indicators">
            <button data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
            <button data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
            <button data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
            <button data-bs-target="#myCarousel" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="immaginihome/homeimg1.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="ajojo">
            </div>
            <div class="carousel-item">
                <img src="immaginihome/homeimg2.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="carbonara">
            </div>
            <div class="carousel-item">
                <img src="immaginihome/homeimg3.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="amatriciana">
            </div>
            <div class="carousel-item">
                <img src="immaginihome/homeimg4.jpg" alt="Immagine Cliccabile" class="immaginecliccabile" id="puntarelle">
            </div>
            
        </div>
        <button class="carousel-control-prev" data-bs-target="#myCarousel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" data-bs-target="#myCarousel2" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    
    <!-- CLICK SULL'IMMAGINE CHE TI MANDA AL RICETTARIO -->
    <script>
        function inviaForm(event) {
            // form nascosta 
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

        // Aggiungi un evento di click a tutte le immagini
        var immaginiCliccabili = document.getElementsByClassName("immaginecliccabile");
        for (var i = 0; i < immaginiCliccabili.length; i++) {
            immaginiCliccabili[i].addEventListener("click", inviaForm);
        }
    </script>

    <!--Modal ad apparizione dei tasti login e signin-->
    <!-- Modal di login -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
        <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
            <h2>Login</h2>
            
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="tipo" value="login">
                <label>Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label>Password:</label><br>
                <input type="text" id="password" name="password"><br><br>        
            <input type="submit" value="Accedi">
            </form>
            <p>Non hai un account? <a href="#" onclick="document.getElementById('registerModal').style.display='block'; document.getElementById('loginModal').style.display='none'">Registrati</a></p>
        
        </div>
    </div>

    <!-- Modal di registrazione -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('registerModal').style.display='none'">&times;</span>
            <h2>Registrazione</h2>
            
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="tipo" value="registrazione">
                <label>Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label>Password:</label><br>
                <input type="text" id="password" name="password"><br>   
                <label>Nome:</label><br>
                <input type="text" id="nome" name="nome"><br>
                <label>Cognome:</label><br>
                <input type="text" id="cognome" name="cognome"><br>
                <label>Sei intollerante al glutine? <input type="checkbox" name="intgluten" value="true"> </label> <br>
                <label>Sei vegano? <input type="checkbox" name="isvegan" value="true" > </label><br>
                <br> <input type="submit" value="Registrati">
            </form>
            <p>torna al login: <a href="#" onclick="document.getElementById('loginModal').style.display='block'; document.getElementById('registerModal').style.display='none'">login</a></p>
        
        </div>
    </div>

<script>
    // Fa apparire il modal del login
    document.getElementById('loginBtn').addEventListener('click', function(event) {
        document.getElementById('loginModal').style.display = 'block';
    });
    document.getElementById('changeAccount').addEventListener('click', function(event) {
        document.getElementById('loginModal').style.display = 'block';
    });

    // Chiudi il modal cliccando fuori
    window.onclick = function(event) {
    if (event.target == document.getElementById('loginModal')) {
        document.getElementById('loginModal').style.display = "none";
    }
    if (event.target == document.getElementById('registerModal')) {
        document.getElementById('registerModal').style.display = "none";
    }
    }
</script>

</body>
</html>
