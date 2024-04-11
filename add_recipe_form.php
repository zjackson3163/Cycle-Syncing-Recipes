<?php
// Get the product data
$phaseID = filter_input(INPUT_POST, 'phaseID'   );
$recipe_name = filter_input(INPUT_POST, 'recipe_name');
$recipe_link = filter_input(INPUT_POST, 'recipe_link');
$calories = filter_input(INPUT_POST, 'calories', FILTER_VALIDATE_INT);
$protein = filter_input(INPUT_POST, 'protein', FILTER_VALIDATE_INT);
$carbs = filter_input(INPUT_POST, 'carbs', FILTER_VALIDATE_INT);
$net_carbs = filter_input(INPUT_POST, 'net_carbs', FILTER_VALIDATE_INT);
$fat = filter_input(INPUT_POST, 'fat', FILTER_VALIDATE_INT);
$fiber = filter_input(INPUT_POST, 'fiber', FILTER_VALIDATE_INT);

// Validate inputs
if ($phaseID == null || $phaseID == null ||
        $recipe_name == null || $recipe_link == null || $calories == null || $protein == null || $carbs == null || $net_carbs == null || $fat == null || $fiber == null) {
    $error = "Invalid recipe data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the recipe to the database  
    $query = 'INSERT INTO recipes
                 (phase_ID, recipe_name, recipe_link, calories, protein, carbs, fat, fiber, net_carbs)
              VALUES
                 (:phaseID, :recipe_name, :recipe_link, :calories, :protein, :carbs, :fat, :fiber, :net_carbs)';
    $statement = $db->prepare($query);
    $statement->bindValue(':phaseID', $phaseID);
    $statement->bindValue(':recipe_name', $recipe_name);
    $statement->bindValue(':recipe_link', $recipe_link);
    $statement->bindValue(':calories', $calories);
    $statement->bindValue(':protein', $protein);
    $statement->bindValue(':carbs', $carbs);
    $statement->bindValue(':net_carbs', $net_carbs);
    $statement->bindValue(':fat', $fat);
    $statement->bindValue(':fiber', $fiber);
    $statement->execute();
    $statement->closeCursor();

    // Display the home page
    include('index.php');
}
