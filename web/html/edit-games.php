<?php
$pageTitle = "Edit Products!">
    include "includes/header.php";
?>
<div class="container-lg">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="games.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Products</li>

        </ol>
    </nav>
<h1>Edit Products</h1>


<?php
// if form was submitted
if(isset($_POST['update'])) {
    // get values from form
    $ItemID = $_POST['ItemID'] ?? '';
    $ItemName = $_POST['ItemName'] ?? '';
    $ItemPrice = $_POST['ItemPrice'] ?? '';
    $ItemsInStock = $_POST['ItemsInStock'] ?? '';
    $ItemDescription = $_POST['ItemDescription'] ?? '';
    $ItemRating = $_POST['ItemRating'] ?? '';
    $ItemRating = $_POST['ItemRating'] ?? '';
    $ItemsOnOrder = $_POST['ItemsOnOrder'] ?? '';
    $ItemConsole = $_POST['ItemConsole'] ?? '';


    // TODO: validate inputs

    // query to add record
    $query = "isset UPDATE `levelup__products` SET 
                       `ItemName` = '$ItemName', 
                       `ItemPrice` = '$ItemPrice', 
                       `ItemsInStock` = '$ItemsInStock', 
                       `ItemDescription` = '$ItemDescription', 
                       `ItemRating` = '$ItemRating', 
                       `ItemsOnOrder` = '$ItemsOnOrder', 
                       `ItemConsole` = '$ItemConsole' 
                WHERE `ItemName`.`$ItemID` = $ItemID;";

    // execute query
    $result = mysqli_query($db, $query) or die("Error adding place.");

    // check if record was edited
    //if(mysqli_affected_rows($db)){
        // redirect
        header('Location: city.php?id=' . $ItemID);
    //}
}

// close database connection (put in footer to avoid doing multiple times)
mysqli_close($db);
?>

<form method="post">
    <p>
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" value="<?= $ItemName['Name'] ?>">
    </p>
    <p>
        <label for="address">Address: </label>
        <input type="text" id="address" name="address" value="<?= $ItemName['Address'] ?>">
    </p>
    <p>
        <label for="city">City: </label>
        <input type="hidden" name="cityId" value="<?= $ItemName['CityID'] ?>">
        <input type="text" id="city" value="<?= $ItemName['CityName'] ?>" disabled>
    </p>
    <p>
        <label for="description">Description: </label>
        <textarea id="description" name="description"><?= $ItemName['Description'] ?></textarea>
    </p>
    <p>
        <label for="ItemRating">Rating: </label>
        <select id="ItemRating" name="ItemRating">
            <option value="1" <?= $ItemName['ItemRating'] == 1 ? 'selected' : '' ?>>⭐️</option>
            <option value="2" <?= $ItemName['ItemRating'] == 2 ? 'selected' : '' ?>>&starf;&starf;️</option>
            <option value="3" <?= $ItemName['ItemRating'] == 3 ? 'selected' : '' ?>>⭐⭐⭐️</option>
            <option value="4" <?= $ItemName['ItemRating'] == 4 ? 'selected' : '' ?>>⭐⭐⭐⭐️</option>
            <option value="5" <?= $ItemName['ItemRating'] == 5 ? 'selected' : '' ?>>⭐⭐⭐⭐⭐️</option>
        </select>
    </p>
    <p>
        <input type="hidden" name="cityPlaceId" value="<?= $ItemName['CityPlaceID'] ?>">
        <button type="submit" name="update" class="btn btn-warning">Update Place</button>
    </p>
</form>
</div>
<?php

    include "includes/footer.php";
?>