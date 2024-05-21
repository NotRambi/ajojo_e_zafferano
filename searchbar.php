<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricette</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .search-container {
            margin: 20px;
        }
        .recipe-list {
            list-style-type: none;
            padding: 0;
        }
        .recipe-list li {
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="search-container">
    <input type="text" id="searchBar" placeholder="Cerca ricette...">
</div>

<ul class="recipe-list" id="recipeList">
<div class="ricetta" id="Lasagna">
        <li>Lasagna</li>
    </div>
    <div class="ricetta" id="Tiramisu">
        <li>Tiramisu</li>
    </div>
    <div class="ricetta" id="Pizza_Margherita">
        <li>Pizza Margherita</li>
    </div>
    <div class="ricetta" id="Risotto_alla_Milanese">
        <li>Risotto alla Milanese</li>
    </div>
</ul>

<script>
    document.getElementById('searchBar').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let recipes = document.getElementById('recipeList').getElementsByClassName('ricetta');

        for (let i = 0; i < recipes.length; i++) {
            let recipe = recipes[i];
            let text = recipe.textContent || recipe.innerText;

            if (text.toLowerCase().indexOf(filter) > -1) {
                recipe.style.display = "";
            } else {
                recipe.style.display = "none";
            }
        }
    });
</script>

</body>
</html>
