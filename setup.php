<?php
require_once('model/database.php');
require_once('model/phase.php');
require_once('model/get_phase.php');
require_once('model/recipe.php');
require_once('model/get_recipe.php');

// create the PhaseDB object
$phaseDB = new PhaseDB();
$recipeDB = new RecipeDB();

$action = filter_input(INPUT_POST, 'action');

$phase_id = filter_input(INPUT_GET, 'phase_id', FILTER_VALIDATE_INT);
if ($phase_id === null || $phase_id === false) {
    $phase_id = 1; // Set default phase ID if not provided or invalid
}

// Get product and category data
$current_phase = $phaseDB->getPhase($phase_id);
if ($current_phase === null) {
    //Unable to retrieve current phase
    throw new Exception("Unable to retrieve current phase, current_phase var is null");
}

$phases = $phaseDB->getPhases();
if ($phases === null) {
    //Unable to retrieve phases
    throw new Exception("Unable to retrive phases, phases array empty");
}

$recipes = $recipeDB->getRecipesByPhase($phase_id);


if ($action == 'list_recipes') {
    
    $phase_id = filter_input(INPUT_GET, 'phase_id', 
            FILTER_VALIDATE_INT);
    if ($phase_id == NULL || $phase_id == FALSE) {
        $category_id = 1;
    }

    // Get product and category data
    $phases = $phaseDB->getPhases();
    $recipes = $RecipeDB->getRecipesByPhase($phase_id);


} else if ($action == 'delete_recipe') {
    // Get the IDs
    $recipe_id = filter_input(INPUT_POST, 'recipe_id', 
            FILTER_VALIDATE_INT);
    $phase_id = filter_input(INPUT_POST, 'phase_id', 
            FILTER_VALIDATE_INT);

    // Delete the recipe
    $recipeDB->deleteRecipe($recipe_id);

} 

else if ($action == 'show_add_form') {
    $categories = $categoryDB->getCategories();
    include('add_recipe_form.php');
} 

else if ($action == 'add_recipe') {
    $phaseID = filter_input(INPUT_POST, 'phaseID'   );
    $recipe_name = filter_input(INPUT_POST, 'recipe_name');
    $recipe_link = filter_input(INPUT_POST, 'recipe_link');
    $calories = filter_input(INPUT_POST, 'calories', FILTER_VALIDATE_INT);
    $protein = filter_input(INPUT_POST, 'protein', FILTER_VALIDATE_INT);
    $carbs = filter_input(INPUT_POST, 'carbs', FILTER_VALIDATE_INT);
    $net_carbs = filter_input(INPUT_POST, 'net_carbs', FILTER_VALIDATE_INT);
    $fat = filter_input(INPUT_POST, 'fat', FILTER_VALIDATE_INT);
    $fiber = filter_input(INPUT_POST, 'fiber', FILTER_VALIDATE_INT);
    
    if ($phaseID == null || $phaseID == null ||
        $recipe_name == null || $recipe_link == null || $calories == null || $protein == null || $carbs == null || $net_carbs == null || $fat == null || $fiber == null) {
    $error = "Invalid recipe data. Check all fields and try again.";
    include('error.php');
    } else {
        $current_phase = $phaseDB->getPhase($phaseID);

        // Create the Product object
        $recipe = new Recipe();
        $recipe->setPhase($phaseID);
        $recipe->setName($recipe_name);
        $recipe->setLink($recipe_link);
        $recipe->setCalories($calories);
        $recipe->setProtein($protein);
        $recipe->setCarbs($carbs);
        $recipe->setFat($fat);
        $recipe->setFiber($fiber);
        $recipe->setNet_Carbs($net_carbs);

        // Add the Product object to the database
        $recipeDB->addRecipe($recipe);

        // Display the Product List page for the current category
        header("recipe_list.php");
    }
}

?>