<?php include 'view/header.php'; ?>
<?php include 'view/navbar.php'; ?>

<!-- the body section -->
<body>
    <header><h1>Cycle Syncing Recipes</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed.</p>
        <p>MySQL must be running.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

<?php include 'view/footer.php'; ?>