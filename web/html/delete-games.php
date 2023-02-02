<?php
$pageTitle = "Edit Products!">
    include "includes/header.php";
?>
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="games.php">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Delete Products</li>

            </ol>
        </nav>
        <h1>Delete Products</h1>
<?php
        $id = $_GET['id'] ?? '1';

        // build query
        $query = "SELECT levelup__itemplace.*, levelup_products.ItemName AS Name
        FROM levelup__games
        JOIN levelup_products ON levelup__itemplace.ItemyID = Item.ID
        WHERE ItemPlaceID = '$id'";

        // execute query
        $result = mysqli_query($db, $query) or die('Error loading products.');

        // get one record from the database
        $cityPlace = mysqli_fetch_array($result, MYSQLI_ASSOC);
        ?>

        <h1>Delete Place</h1>


        <?php
        // if form was submitted
        if(isset($_POST['delete'])) {
            // get values from form
            $ItemPlaceID = $_POST['ItemPlaceID'] ?? '';

            // TODO: validate inputs

            // query to add record
            $query = "DELETE FROM `levelup__itemplace` 
                WHERE `levelup__itemplace`.`ItemPlaceID` = $ItemPlaceID
                LIMIT 1;";

            // execute query
            $result = mysqli_query($db, $query) or die("Error deleting place.");

            // check if record was edited
            //if(mysqli_affected_rows($db)){
            // redirect
            header('Location: products.php?id=' . $levelup__itemplace['ItemID']);
            //}
        }

        // close database connection (put in footer to avoid doing multiple times)
        mysqli_close($db);
        ?>

        <form method="post">
            <p>Are you sure you want to delete "<?= $cityPlace['Name'] ?>" from <?= $cityPlace['CityName'] ?>?</p>
            <p>
                <input type="hidden" name="$ItemPlaceID" value="<?= $levelup__itemplace['ItemPlaceID'] ?>">
                <button type="submit" name="delete" class="btn btn-danger">Delete Place</button>
            </p>
        </form>

    </div>
<?php

include "includes/footer.php";
?>