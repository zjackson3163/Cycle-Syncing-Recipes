<?php include 'view/header.php'; ?>
<?php include 'view/navbar.php'; ?>
<?php include 'setup.php'; ?>



    <body class = "inside">
        <section>
        <!-- display a table of recipes -->
        <h1 id = "phase_name">- <?php echo $phaseDB->getPhase($phase_id)->getName(); ?> -</h1>
        <p id = "phase_desc"> <?php echo $phaseDB->getPhase($phase_id)->getDesc(); ?></p>
        <table>
            <tr id = "table_labels">
                <th class="labels">Recipe Name</th>
                <th class="labels">Link</th>
                <th class="right, labels">Calories</th>
                <th class="right, labels">Protein</th>
                <th class="right, labels">Carbs</th>
                <th class="right, labels">Net Carbs</th>
                <th class="right, labels">Fat</th>
                <th class="right, labels">Fiber</th>
                <!--<th>&nbsp;</th>!-->
            </tr>

            <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td id="edge-left"><?php echo $recipe -> getName(); ?></td>
                <td><a target="_blank" href = "<?php echo $recipe -> getLink() ?>"><?php echo $recipe -> getLink() ?></a></td>
                <td><?php echo $recipe -> getCalories(); ?></td>
                <td><?php echo $recipe -> getProtein(); ?></td>
                <td><?php echo $recipe -> getCarbs(); ?></td>
                <td><?php echo $recipe -> getNet_Carbs(); ?></td>
                <td><?php echo $recipe -> getFat(); ?></td>
                <td id="edge-right"><?php echo $recipe -> getFiber(); ?></td>

                <!--<td><form action="." method="post"
                          id="delete_product_form">
                    <input type="hidden" name="action"
                           value="delete_recipe">
                    <input type="hidden" name="recipe_id"
                           value="<?php echo $recipe->getID(); ?>">
                    <input type="hidden" name="phase_id"
                           value="<?php echo $phaseDB->getPhase($phase_id)->getID(); ?> ?>">
                    <input type="submit" value="Delete">
                </form></td>!-->
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- This link is a work in progress for what I want it to do... !-->
        <p><a href="recipe_list.php?phase_id=<?php echo $phase->getID(); ?>">Add New Recipe</a></p>
        
        <p><a href="/GitHub/Cycle-Syncing-Recipes/index.php">Back To Main</a></p>       
    </section>

    </body>

<?php include 'view/footer.php'; ?>