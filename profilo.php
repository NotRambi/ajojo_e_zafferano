<!DOCTYPE html>
<html lang="it">
<?php session_start(); ?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Il mio Profilo</title>
<style>
    /* Stile per il contenitore del profilo */
    .profile-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    /* Stile per le informazioni del profilo */
    .profile-info {
        margin-bottom: 20px;
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
$dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=biar") 
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
        $query="UPDATE utenti SET username='$username',nome='$nome',cognome='$cognome',password='$password',isvegan='$isvegan',intgluten='$intgluten' WHERE username='$utente'";
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
    echo "<h2>Il mio Profilo</h2>";

    echo "<div class='profile-info'>";
    echo "<p class='info-title'>Username:</p>";
            echo "<p class='modifica'>";
            echo "<input type='text' name='username' value='" . $row['username'] . "'>";
            echo "</p>";
    echo "<p class='valore'>";
        echo $row['username'];
    echo "</p>";

    echo "<p class='info-title'>Nome:</p>";
            echo "<p class='modifica'>";
            echo "<input type='text' name='nome' value='" . $row['nome'] . "'>";
            echo "</p>";
    echo "<p class='valore'>";
        echo $row['nome'];
    echo "</p>";

    echo "<p class='info-title'>Cognome:</p>";
            echo "<p class='modifica'>";
            echo "<input type='text' name='cognome' value='" . $row['cognome'] . "'>";
            echo "</p>";
    echo "<p class='valore'>";
        echo $row['cognome'];
    echo "</p>";

    echo "<p class='info-title'>Password:</p>";
            echo "<p class='modifica'>";
            echo "<input type='text' name='password' value='" . $row['password'] . "'>";
            echo "</p>";
    echo "<p class='valore'>";
        echo $row['password'];
    echo "</p>";

    echo "<p class='info-title'>Sei vengano:</p>";
            echo "<p class='modifica'>";
            echo "<input type='checkbox' name='isvegan' value='true'>";
            echo "</p>";
    echo "<p class='valore'>";
        if($row['isvegan']=='f') echo "no";
        else echo "si";
    echo "</p>";

    echo "<p class='info-title'>Sei intollerante al glutine:</p>";
            echo "<p class='modifica'>";
            echo "<input type='checkbox' name='intgluten' value='true'>";
            echo "</p>";
    echo "<p class='valore'>";
        if($row['intgluten']=='f') echo "no";
        else echo "si";
    echo "</p>";

            echo "<p class='modifica'>";
            echo "<input type='submit' value='invia modifiche'>";
            echo "</p>";
    echo "</form>";
echo "</div>";


echo "<br><button onclick='mostraModulo()'>Modifica Profilo</button><br><br><br><br>";


$query="select distinct ricetta from preferiti where username='$utente'";


echo "ricette preferite:<br>";
$result = pg_query($dbconn, $query);

if(pg_num_rows($result)<=0){
    echo "nessuna ricetta preferita";
}
while ($row = pg_fetch_assoc($result)) {
    $ricetta=$row["ricetta"];
    $idtogliprefe="idBottonePrefeTogli".$ricetta;
    echo $ricetta." <button id=$idtogliprefe> togli prefe </button><br>";

}

pg_free_result($result);
pg_close($dbconn);
?>
<script>
    flag=true;
function mostraModulo() {
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
</script>
        
    
    
</div>

</body>
</html>
