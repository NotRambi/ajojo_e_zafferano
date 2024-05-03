<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
  <title>Ajojo & Zafferano</title>
  <link rel="icon" href="logohome.jpg" type="image/x-icon">
  <!--DA RISOLVERE:
  valida input dopo il primo campo, i campi errorex non funzionano più  
  se sposti submit dove dovrebbe stare non funziona piu il tasto aggiungi campo -->

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

    #myForm {
      background-color: #fff;
      border: 2px solid #ddd;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 10px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"] {
      width: calc(100% - 10px);
      padding: 5px;
      border: 1px solid #ddd;
      border-radius: 3px;
    }

    button {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      margin-right: 10px;
    }

    button:hover {
      background-color: #45a049;
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
  <!-- vado a prendere gli ingredienti possibili dal db -->
  <?php
    //connessione al db
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=biar") 
    or die('Could not connect: ' . pg_last_error());
    $result = pg_query($dbconn,'SELECT distinct ingrediente FROM ingredienti');
    //creao la datalist
    echo "<datalist id='suggerimenti'>";
      while ($row = pg_fetch_assoc($result)) {
        $ingrediente=$row['ingrediente'];
        
        echo "<option value=$ingrediente>";
      }
    echo "</datalist>";
    //chiusura connessione
    pg_free_result($result);
    pg_close($dbconn);
  ?>
 
  <form id="myForm" onsubmit="return controllaCampionSubmit()" onchange="return validaInput()"  action="ricettario.php" method="post">
  <div class="input-group">
    <label>Ingredienti</label><br><br>
    <input list="suggerimenti" id="campo1" name="campo1">
    <div id="errore1" style="color: red;"></div>
  </div>
  
</form>


<button onclick="aggiungiCampo(); ">Aggiungi Campo</button>
<button onclick="rimuoviCampo(); ">Rimuovi Ultimo Campo</button>
<button type="button" onclick="return submitForm()">prepara</button>

<!-- Modal -->
<div id="loginModal" class="modal">

  <!-- Contenuto del modal -->
  <div class="modal-content">
    <button class="close" onclick="closeModal()">&times;</button>
    <h2 style="font-weight: normal; text-align: center;">Accedi</h2>
    <form id="loginForm" style="text-align: center;">
      <input type="text" id="username" placeholder="Username" required><br>
      <input type="password" id="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
      <div>
        <h4 style="font-weight: normal; text-align: center;">Non hai un account? <a href="#" id="registerLink">Registrati</a></h4>
      </div>
      <div>
        <h4 style="font-weight: normal; text-align: center;"><a href="#" id="forgotPasswordLink">Hai dimenticato la password?</a></h4>
      </div>
    </form>
  </div>
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
          document.getElementById(actualerr).innerText = 'elemento insierito due volte';
          invalid=1;
          return false;
        }
      }  
        
    }
    return true;
  }


  function aggiungiCampo() {
    if(!validaInput()){
      document.getElementById("errore"+nuovoCampoNum).innerText = 'prima di creare un nuovo campo insierire un ingrediente valido nel campo precedente';
      return false;
    }
    var form = document.getElementById("myForm");
    var ultimoCampo = form.lastElementChild;
    nuovoCampoNum = parseInt(ultimoCampo.querySelector('input').id.replace('campo', '')) + 1;
    
    var campoprecedente = "campo"+(nuovoCampoNum-1);
    var campoerrprec = "errore"+(nuovoCampoNum-1);

    
    if(document.getElementById(campoprecedente).value=="" || invalid){
      document.getElementById(campoerrprec).innerText = 'prima di creare un nuovo campo insierire un ingrediente valido nel campo precedente';
      nuovoCampoNum--;
      return false;
    }
    document.getElementById(campoerrprec).innerText ="";

    var nuovoCampo = document.createElement("div");
    nuovoCampo.className = "input-group";
    //ho perso due ore e mezza per questa linea:
    nuovoCampo.innerHTML = '<input list="suggerimenti" id="campo' + nuovoCampoNum + '" name="campo' + nuovoCampoNum + '"><div id="errore' + nuovoCampoNum +'" style="color: red;"></div>';
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



  // Funzione per aprire il modal
  function openModal() {
    document.getElementById('loginModal').style.display = 'block';
  }

  // Funzione per chiudere il modal
  function closeModal() {
    document.getElementById('loginModal').style.display = 'none';
  }

  // Chiudi il modal quando l'utente clicca al di fuori di esso
  window.onclick = function(event) {
    var modal = document.getElementById('loginModal');
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  
</script>

</body>
</html>
