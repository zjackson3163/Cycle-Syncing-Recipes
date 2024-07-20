<?php include 'setup.php'; ?>
<!-- make navigation bar to have phases, add new recipe, add new food type, etc !-->
<nav class = "navbar">
    <ul class = "navbar">
        <!--<li><img src="" alt="">(Pic)</li>!-->
        <li><a class = "title" href="index.php">Cycle Syncing Recipes</a></li>
        <li><a class = "navbar" href="add_new_recipe.php">Add New Recipe</a></li>
        <li><a class = "navbar" href="research.php">Learn More</a></li>
        <li>
            <div class="dropdown">
                <button class="dropbtn">Phases
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <?php foreach ($phases as $phase) : ?>
                        <a class = "phases" href="recipe_list.php?phase_id=<?php echo $phase->getID(); ?>">
                            <?php echo $phase->getName(); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
        <li><a class = "navbar" href="breakdown.php">Breakdown</a></li>
        <li><a class = "navbar" href="/GitHub/Cycle-Syncing-Recipes/index.php">Home</a></li> 
    </ul>
    </nav>  
