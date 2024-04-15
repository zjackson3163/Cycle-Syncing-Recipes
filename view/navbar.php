<?php include 'setup.php'; ?>
<!-- make navigation bar to have phases, add new recipe, add new food type, etc !-->
<nav class = "navbar">
    <ul class = "navbar">
        <li><a class = "navbar" href="/GitHub/Cycle-Syncing-Recipes/index.php">Home</a></li> 
        <li class = "navbar" >
            <?php foreach ($phases as $phase) : ?>
            <li><a class = "navbar" href="recipe_list.php?phase_id=<?php echo $phase->getID(); ?>">
                    <?php echo $phase->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </li>
        <li><a class = "navbar" href="research.php">Learn More</a></li>
        <li><a class = "navbar" href="add_new_recipe.php">Add New Recipe</a></li>
    </ul>
    </nav>  
