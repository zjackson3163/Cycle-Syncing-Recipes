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
            <li><a class = "navbar" href="add_new_recipe.php">Add New Recipe</a></li>
        </ul>
        </nav>  

    <body class = "inside">
        <h1>- Research - &#x1F50E </h1>
        <p class = "para">Below are some resources I found interesting while learning about cycle syncing. Of course it's great to do your own research as well. These are a great place to start!</p>

        <ul class = "research">
            <li>In the Flo by Alissa Vitti</li>
            <li>Other Research</li>
        </ul>

    </body>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cycle Syncing Recipes, Inc.</p>
    </footer>
</html>
