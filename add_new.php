<?php include 'view/header.php'; ?>
<?php include 'view/navbar.php'; ?>

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

                
            

            <tr>
            </tr>
            <?php endforeach; ?>

            <form action="add_recipe_form.php" method="post"
              id="add_recipe_form">
            <tr>    
                <!--<select name="phaseID">
                <?php foreach ($phases as $phase) : ?>
                    <option value="<?php echo $phase['phaseID']; ?>">
                        <?php echo $phase['phase_name']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br> !-->
                
                <input type="hidden" name="phaseID" value="<?php echo $phaseID; ?>">
                <td><input type="text" name="recipe_name"><br></td>
                <td><input type="text" name="recipe_link"><br></td>
                <td><input type="text" name="calories"><br></td>
                <td><input type="text" name="protein"><br></td>
                <td><input type="text" name="carbs"><br></td>
                <td><input type="text" name="fat"><br></td>
                <td><input type="text" name="fiber"><br></td>
                <td><input type="text" name="net_carbs"><br></td>

                <label>&nbsp;</label>
                <td><input type="submit" value="Add Product"><br></td>
            <tr>
                </form>
        </table>
        <p><a class = "navbar" href="add_new.php?phase_id=<?php echo $phaseID; ?>">Add New Recipe</a></p>
        <p><a href="/GitHub/Cycle-Syncing-Recipes/index.php">Back To Main</a></p>       
    </section>

    </body>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cycle Syncing Recipes, Inc.</p>
    </footer>
</html>