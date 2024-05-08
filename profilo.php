<!DOCTYPE html>
<html lang="it">
<?php session_start(); ?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<title>Il mio Profilo</title>
<style>
    *{
        font-family: "Poppins", sans-serif;
    }
    body{
        background-color: #f8fadd;
    }
    .profile-container {
        max-width: 600px;
        margin: 50px auto;
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
    }
    .div-campoprofilo{
        display: flex;
        justify-content: row;
    }

    /* Stile per il titolo delle informazioni */
    .info-title {
        font-weight: bold;
    }

    .modifica{
        display: none;
    }

    
</style>
</head>
<body>

<a href="index.php">home</a>
<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=180402") 
or die('Could not connect: ' . pg_last_error());

$utente=$_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $password = $_POST['password'];
    if(!isset($_POST['isvegan'])) $isvegan="false"; else
        $isvegan = $_POST['isvegan'];
    if(!isset($_POST['intgluten'])) $intgluten = "false"; else
        $intgluten = $_POST['intgluten'];

    if($username==""||$password=="")
        echo "aggiornamento credenziali fallito<br>inserisci i dati correttamente";
    else{
        $query="UPDATE utenti SET username='$username',nome='$nome',cognome='$cognome',password='$password',isvegan='$isvegan',intgluten='$intgluten' 
        WHERE username='$utente'";
        pg_query($dbconn, $query);
        $_SESSION['user']=$username;  
    }
}
//UPDATE ingredienti
//SET ricetta = 'tiramisu'
//WHERE ricetta = 'tiramoisu';



$utente=$_SESSION['user'];
$query="select * from utenti where username = '$utente'";
$result = pg_query($dbconn, $query);
$row = pg_fetch_assoc($result);


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
                echo "<p class='info-title'>Sei vengano:</p>";
                        echo "<p class='modifica'>";
                        if($row['isvegan']=='f')
                            echo "<input type='checkbox' name='isvegan' value='true'>";
                        else
                            echo "<input type='checkbox' name='isvegan' value='true' checked>";
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
                            echo "<input type='checkbox' name='intgluten' value='true'>";
                        else
                            echo "<input type='checkbox' name='intgluten' value='true' checked>";
                        echo "</p>";
                echo "<p class='valore'>";
                    if($row['intgluten']=='f') echo "no";
                    else echo "si";
                echo "</p>";
            echo "</div>";

        echo "</div>";
        echo "<div class='form-btn modifica'>";
            echo "<input type='submit' value='invia modifiche'>";
            echo "<button onclick='mostraModulo()'>cancella modifiche</button>";
        echo "</div>";
    echo "</form>";

    echo "<div class='btn-vari'>";
        echo "<button class='modifica' onclick='cancellaProfilo()'>cancella profilo</button>";
        echo "<button onclick='mostraModulo()' class='valore'>Modifica Profilo</button> ";
        echo "<button onclick='logOut()' class='valore'>Logout</button>";
    echo "</div>";

    echo "<div class='preferiti valore'>";
        echo "ricette preferite: <br>";
        $query="select distinct ricetta from preferiti where username='$utente'";
        $result = pg_query($dbconn, $query);

        if(pg_num_rows($result)<=0){
            echo "nessuna ricetta preferita";
        }
        while ($row = pg_fetch_assoc($result)) {
            $ricetta=$row["ricetta"];
            $idtogliprefe="idBottonePrefeTogli".$ricetta;
            echo $ricetta." <button id=$idtogliprefe> togli prefe </button> ";

        }
    echo "</div>";

echo "</div>";

pg_free_result($result);
pg_close($dbconn);
?>
<script>
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

    function logOut() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'logout.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send();
        window.location.href="index.php";
    }

    function cancellaProfilo(){
        event.preventDefault();

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delUser.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send();

        logOut();

    }

</script>
        
    
    
</div>

</body>
</html>
