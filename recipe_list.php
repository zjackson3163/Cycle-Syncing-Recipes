<?php
require_once('database.php');

// Get category ID
if (!isset($phase_id)) {
    $phaseID = filter_input(INPUT_GET, 'phase_id', 
            FILTER_VALIDATE_INT);
    if ($phaseID == NULL || $phaseID == FALSE) {
        $phaseID = 1;
    }
}
// Get name for selected category
$queryCategory = 'SELECT * FROM phases
                  WHERE phaseID = :phase_id'; //phase_id is a named variable  
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':phase_id', $phaseID);
$statement1->execute();
$phase = $statement1->fetch();
$phase_name = $phase['phase_name'];
$statement1->closeCursor();


// Get all categories
$query = 'SELECT * FROM phases
                       ORDER BY phaseID';
$statement = $db->prepare($query);
$statement->execute();
$phases = $statement->fetchAll();
$statement->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM recipes
                  WHERE phase_ID = :phase_id
                  ORDER BY recipe_ID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':phase_id', $phaseID);
$statement3->execute();
$recipes = $statement3->fetchAll();
$statement3->closeCursor();
?>

<!DOCTYPE html>
<html class = "outside">
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
            <li><a class = "navbar" href="add_new_recipe.php?phase_id=<?php echo $phaseID; ?>">Add New Recipe</a></li>
        </ul>
        </nav>   

    <body class = "inside">
        <section>
        <!-- display a table of recipes -->
        <h1 id = "phase_name">- <?php echo $phase_name; ?> -</h1>
        <table>
            <tr>
                <th>Recipe Name</th>
                <th>Link</th>
                <th class="right">Calories</th>
                <th class="right">Protein</th>
                <th class="right">Carbs</th>
                <th class="right">Net Carbs</th>
                <th class="right">Fat</th>
                <th class="right">Fiber</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?php echo $recipe['recipe_name']; ?></td>
                <td><a target="_blank" href = "<?php echo $recipe["recipe_link"] ?>"><?php echo $recipe["recipe_link"] ?></a></td>
                <td><?php echo $recipe['calories']; ?></td>
                <td><?php echo $recipe['protein']; ?></td>
                <td><?php echo $recipe['carbs']; ?></td>
                <td><?php echo $recipe['net_carbs']; ?></td>
                <td><?php echo $recipe['fat']; ?></td>
                <td><?php echo $recipe['fiber']; ?></td>

                <td><form action="delete_product.php" method="post">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_new.php?phase_id=<?php echo $phase['phaseID']; ?>">Add New Recipe</a></p>
        <p><a href="/GitHub/Cycle-Syncing-Recipes/index.php">Back To Main</a></p>       
    </section>

    </body>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cycle Syncing Recipes, Inc.</p>
    </footer>
</html>