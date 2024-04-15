<?php
class RecipeDB {

    #This method...
    public function getrecipes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM recipes
                  INNER JOIN phases
                      ON recipes.phaseID = recipes.phaseID'; //?
        $result = $db->query($query);
        $recipes = array();
        foreach ($result as $row) {
            // create the Category object
            $phase = new Phase();
            $phase->setID($row['phaseID']);
            $phase->setName($row['phase_name']);
            
            // create the recipe object
            $recipe = new Recipe();
            $recipe->setPhase($phase); //?
            $recipe->setId($row['recipe_ID']);
            $recipe->setName($row['recipe_name']);
            $recipe->setLink($row['recipe_link']);
            $recipe->setCalories($row['calories']);
            $recipe->setProtein($row['protein']);
            $recipe->setCarbs($row['carbs']);
            $recipe->setFat($row['fat']);
            $recipe->setFiber($row['fiber']);
            $recipe->setNet_Carbs($row['net_carbs']);
            $recipes[] = $recipe;
        }
        return $recipes;
    }

    #This method...
    public function getRecipesByPhase($phase_id) {
        $db = Database::getDB();

        $phaseDB = new PhaseDB();
        $phase = $phaseDB->getPhase($phase_id);

        $query = "SELECT * FROM recipes
                  WHERE phase_ID = '$phase_id' #??
                  ORDER BY recipe_ID";
        $result = $db->query($query);
        $recipes = array();

        foreach ($result as $row) {
            $recipe = new Recipe();
            $recipe->setPhase($phase); //?
            $recipe->setId($row['recipe_ID']);
            $recipe->setLink($row['recipe_link']);
            $recipe->setName($row['recipe_name']);
            $recipe->setCalories($row['calories']);
            $recipe->setProtein($row['protein']);
            $recipe->setCarbs($row['carbs']);
            $recipe->setFat($row['fat']);
            $recipe->setFiber($row['fiber']);
            $recipe->setNet_Carbs($row['net_carbs']);

            $recipes[] = $recipe;
        }
        return $recipes;
    }

    public function getRecipe($recipe_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM recipes
                  WHERE recipeID = '$recipe_id'";
        $result = $db->query($query);
        $row = $result->fetch();

        $categoryDB = new PhaseDB();
        $phase = $categoryDB->getPhase($row['phaseID']);

        $recipe = new Recipe();
        $recipe->setName($row['recipe_name']);
        $recipe->setPhase($phase); //?
        $recipe->setId($row['recipe_ID']);
        $recipe->setName($row['recipe_name']);
        $recipe->setLink($row['recipe_link']);
        $recipe->setCalories($row['calories']);
        $recipe->setProtein($row['protein']);
        $recipe->setCarbs($row['carbs']);
        $recipe->setFat($row['fat']);
        $recipe->setFiber($row['fiber']);
        $recipe->setNet_Carbs($row['net_carbs']);

        return $recipe;
    }

    public function deleteRecipe($recipe_id) {
        $db = Database::getDB();
        $query = "DELETE FROM recipes
                  WHERE recipe_ID = '$recipe_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }

    public function addRecipe($recipe) {
        $db = Database::getDB();

        $phase_id = $recipe->getID();
        $name = $recipe->getName();
        $link = $recipe->getLink();
        $calories = $recipe->getCalories();
        $protein = $recipe->getProtein();
        $carbs = $recipe->getCarbs();
        $fat = $recipe->getFat();
        $fiber = $recipe->getFiber();
        $net_carbs = $recipe->getNet_Carbs();

        $query =
            "INSERT INTO recipes
                 (phase_ID, recipe_name, recipe_link, calories, protein, carbs, fat, fiber, net_carbs)
             VALUES
                 ('$phase_id', '$name', '$link', '$calories', '$protein', '$carbs', '$fat', '$fiber', '$net_carbs')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>