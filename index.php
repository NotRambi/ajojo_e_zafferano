<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //echo converte in html
    echo "bella<br>";

    //array
    $arr1=array("id"=>"1","nome"=>"carbonara","cognome"=>"primo","email"=>"psdia");
    echo json_encode($arr1);

    //        localhost     la porta puo cambiare  il db sarà ajojo   postgres    password di pgadmin
    $dbconn = pg_connect("host=localhost port=5432 dbname=sicurezza user=postgres password=biar") 
    or die('Could not connect: ' . pg_last_error());



/*
CREATE TABLE ricetta (
    nomericetta VARCHAR(50) PRIMARY KEY,
    tempo int, --in minuti
	tipologia varchar(20), --primo secondo contorno antipasto dolce
	difficolta int, --1 2 o 3
	isSpicy boolean,
	isGlutenFree boolean,
	isVegan boolean,
	isLite boolean,
	isStar boolean,
	descrizione VARCHAR(500)-- come cazzo se fa
);

CREATE TABLE ingred (
	ricetta VARCHAR(50) PRIMARY KEY,
	ingrediente varchar(50)
);

INSERT INTO ricetta (nomericetta, tempo, tipologia, difficolta, isSpicy, isGlutenFree, isVegan, isLite, isStar, descrizione) 
VALUES ('Carbonara', 35, 'primo', 2, FALSE, FALSE, FALSE, FALSE, FALSE, 'Preparazione degli ingredienti: Taglia il guanciale a cubetti o a strisce, a seconda delle tue preferenze.');

*/

    //una query tipo:
    $query = 'SELECT * FROM utenti where true';
    $result = pg_query($dbconn,$query);

    echo "<br><br><br>";
    
    echo "<table>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    pg_free_result($result);
    pg_close($dbconn);
    
    
    ?>
</body>
</html>