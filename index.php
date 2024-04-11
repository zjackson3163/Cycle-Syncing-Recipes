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
        <h1 id = "main_head">&#x1F31B&#x1FA78 Cycle Syncing Recipes &#x1FA78&#x1F31C</h1>

        <section class = "para">
        <p>Research shows that eating certain foods during various phases of the menstrual cycle help your body to produce or release hormones the hormones needed during different phases. Eating this way can possibly hep to control PMS symptoms. While it all boils down to eating healthier, less inflammatory foods. I found that it helps me to narrow down recipes if I eat by what phase I'm in. This website was created as a personal project to keep track of recipes that help hormones during different phases of the menstrual cycle.</p>

        <p>To use this website simply click which phase you'd like to see recipes for and a list of "phase-friendly" recipes will be listed. Below will be a rundown of what season the body is in and what ingredients will help you in each phase. There is also a tab in the navigation bar for articles or books that I found interesting while learning if you'd like to do more research.</p>
        </section>
        

        <h3>Menstrual (Winter)</h3>
        <pre>       + The Menstrual phase is the first phase of your period. The bleeding. This lasts from 3-5 days. </pre>

        <h3>Follicular (Spring)</h3>
        <pre>       + The Follicular phase is the second phase of your period. This lasts from 13-14 days.</pre>

        <h3>Ovulation (Summer)</h3>
        <pre>       + The Ovulation phase is the third phase of your period. This lasts from 3-5 days.</pre>

        <h3>Luteal (Fall)</h3>
        <pre>       + The Luteal phase is the fourth phase of your period. This lasts from 12-14 days.</pre>

    </body>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cycle Syncing Recipes, Inc.</p>
    </footer>
</html>
