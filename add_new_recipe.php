<?php include 'view/header.php'; ?>
<?php include 'view/navbar.php'; ?>

<!-- the body section -->
<body class = "inside">

    <main>
        <h1> - Add Recipe -</h1>
        <form action="setup.php" method="post"
              id="add_recipe_form">

            <input type="hidden" name="action" value="add_recipe" />

            <label>Phase:</label>
            <select name="phaseID">
            <?php foreach ($phases as $phase) : ?>
                <option value="<?php echo $phase->getID(); ?>">
                    <?php echo $phase->getName(); ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Recipe Name:</label>
            <input type="text" name="recipe_name"><br>

            <label>Link:</label>
            <input type="text" name="recipe_link"><br>

            <label>Calories:</label>
            <input type="text" name="calories"><br>

            <label>Protein:</label>
            <input type="text" name="protein"><br>

            <label>Carbs:</label>
            <input type="text" name="carbs"><br>

            <label>Fat:</label>
            <input type="text" name="fat"><br>

            <label>Fiber:</label>
            <input type="text" name="fiber"><br>

            <label>Net Carbs:</label>
            <input type="text" name="net_carbs"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">Back to Main Page</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Cycle Syncing Recipes, Inc.</p>
    </footer>
</body>
</html>