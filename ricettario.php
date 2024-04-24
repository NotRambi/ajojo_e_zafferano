<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricettario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: flex-end;
        }

        .navbar a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
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
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="#recipes">Ricette</a>
        <a href="#about">About</a>
    </div>

    <p>Qui puoi tornare alla <a href="index.html">pagina iniziale</a>.</p>

    <?php
    
    //database:
    $dbconn = pg_connect("host=localhost port=5432 dbname=ajojo user=postgres password=biar") 
    or die('Could not connect: ' . pg_last_error());


    /*AGGIUNGERE RICETTE AL DB:
    INSERT INTO RICETTA
    VALUES ('amatriciana', 25, 'primo', 1, true, false, false, false, false, 'Per preparare');
    //nome, tempo, tipologia, difficolta, piccante, senzaGlutine, vegana, leggera, stellata, descrizione
    */


    $query = 'SELECT * FROM ricetta';
    $result = pg_query($dbconn,$query);

    //stampa query
    echo "<div class='content'>";
    while ($row = pg_fetch_assoc($result)) {
        echo "<div class='recipe'>";
            echo "<h2>";
                echo $row['nomericetta'];
            echo "</h2>";
            echo "<p>";
                echo $row['descrizione'];
                echo "<br>";
                echo $row['tempo'];
                echo " minuti";
            echo "</p>";
        echo "</div>";
      }
      echo "</div>";
    
    
    echo "<br><br><br>";
    ?>

</body>
</html>
