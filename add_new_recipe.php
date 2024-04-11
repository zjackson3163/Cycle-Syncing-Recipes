<?php
require('database.php');
$query = 'SELECT *
          FROM phases
          ORDER BY phaseID';
$statement = $db->prepare($query);
$statement->execute();
$phases = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html class = "outside">

<!-- the head section -->
<head>
        <!-- Need a play on words title for cycle cyncing recipes !-->
        <meta charset="UTF-8">
        <title>Cycle Syncing Recipes || Home Page</title>
        <link rel = "stylesheet" type="text/css" href="main.css"/>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    </head>

<!-- make navigation bar to have phases, add new recipe, add new food type, etc !-->
<nav class = "navbar">
        <ul class = "navbar">
            <li><a class = "navbar" href="/GitHub/Cycle-Syncing-Recipes/index.php">Home</a></li> 
            <li class = "navbar" >
                <?php foreach ($phases as $phase) : ?>
                <li><a class = "navbar" href="recipe_list.php?phase_id=<?php echo $phase['phaseID']; ?>">
                        <?php echo $phase['phase_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </li>
            <li><a class = "navbar" href="research.php">Learn More</a></li>
            <li><a class = "navbar" href="add_new.php">Add New Recipe</a></li>
        </ul>
        </nav>  

<!-- the body section -->
<body class = "inside">

    <main>
        <h1> - Add Recipe -</h1>
        <form action="add_recipe_form.php" method="post"
              id="add_recipe_form">

            <label>Phase:</label>
            <select name="phaseID">
            <?php foreach ($phases as $phase) : ?>
                <option value="<?php echo $phase['phaseID']; ?>">
                    <?php echo $phase['phase_name']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Recipe Name:</label>
            <input type="text" name="recipe_name"><br>

            <label>Link:</label>
            <input type="text" name="recipe_link"><br>

            <label>Calories:</label>
            <input type="text" name="calories"><br>

            <label>Protein:</label>
            <input type="text" name="protein"><br>

            <label>Carbs:</label>
            <input type="text" name="carbs"><br>

            <label>Fat:</label>
            <input type="text" name="fat"><br>

            <label>Fiber:</label>
            <input type="text" name="fiber"><br>

            <label>Net Carbs:</label>
            <input type="text" name="net_carbs"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">Back to Main Page</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cycle Syncing Recipes, Inc.</p>
    </footer>
</body>
</html>