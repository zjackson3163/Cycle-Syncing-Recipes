<?php include 'view/header.php'; ?>
<?php include 'view/navbar.php'; ?>
<?php include 'setup.php'; ?>


    <body class = "inside">
        <section>
        <!-- display a table of recipes -->
        <h1 id = "phase_name">- <?php echo $phaseDB->getPhase($phase_id)->getName(); ?> -</h1>
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
                <td><?php echo $recipe -> getName(); ?></td>
                <td><a target="_blank" href = "<?php echo $recipe -> getLink() ?>"><?php echo $recipe -> getLink() ?></a></td>
                <td><?php echo $recipe -> getCalories(); ?></td>
                <td><?php echo $recipe -> getProtein(); ?></td>
                <td><?php echo $recipe -> getCarbs(); ?></td>
                <td><?php echo $recipe -> getNet_Carbs(); ?></td>
                <td><?php echo $recipe -> getFat(); ?></td>
                <td><?php echo $recipe -> getFiber(); ?></td>

                <td><form action="." method="post"
                          id="delete_product_form">
                    <input type="hidden" name="action"
                           value="delete_recipe">
                    <input type="hidden" name="recipe_id"
                           value="<?php echo $recipe->getID(); ?>">
                    <input type="hidden" name="phase_id"
                           value="<?php echo $phaseDB->getPhase($phase_id)->getID(); ?> ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="recipe_list.php?phase_id=<?php echo $phase['phaseID']; ?>">Add New Recipe</a></p>
        <p><a href="/GitHub/Cycle-Syncing-Recipes/index.php">Back To Main</a></p>       
    </section>

    </body>

<?php include 'view/footer.php'; ?>