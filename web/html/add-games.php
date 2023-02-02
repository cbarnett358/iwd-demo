<?php
$pageTitle = "Welcome to Northwind!">
    include "includes/header.php";
?>
<?php
// get the token, or create one if it doesn't exist
$_SESSION['csrf_token'] = $_SESSION['csrf_token'] ?? md5(uniqid());



// get country code from url
$id = $_GET['id'] ?? '1';

$id = intval($id);

// build query
$query = "SELECT * FROM levelup__products WHERE ID = '$id'";

// execute query
$result = mysqli_query($db, $query) or die('Error loading products.');

// get one record from the database
$city = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<h1>Add Place</h1>


<?php
// if form was submitted
if(isset($_POST['add'])) {
    // validate the CSRF (Cross Site Request Forgery) token
    if($_POST['csrf_token'] != $_SESSION['csrf_token']){
        die('Invalid token.');
    }


    // get values from form
    $ItemID = $_POST['ItemID'] ?? '';
    $ItemName = $_POST['ItemName'] ?? '';
    $ItemPrice = $_POST['ItemPrice'] ?? '';
    $ItemsInStock = $_POST['ItemsInStock'] ?? '';
    $ItemConsole = $_POST['ItemConsole'] ?? '';
    $ItemDescription = $_POST['ItemDescription'] ?? '';
    $ItemRating = $_POST['ItemRating'] ?? '';

    // TODO: validate inputs

    // strip HTML tags (prevent XSS - Cross Site Scripting)
    $ItemName = strip_tags($ItemName);
    $address = strip_tags($ItemsInStock, '<b><i>');

    $address = str_replace(['onmouseover', 'onmouseout', 'onload', '.......'], 'xxxxx', $address);


    $query = "INSERT INTO `levelup__products` 
        (`ItemID`, `ItemName`, `ItemPrice`, `ItemsInStock`, `ItemConsole`, `ItemDescription`, `ItemRating`) 
    VALUES 
        (NULL, ?, ?, ?, ?, ?);";

    $stmt = mysqli_prepare($db, $query) or die('Invalid query');


    mysqli_stmt_bind_param($stmt, 'isssi',
        $ItemID, $ItemName, $ItemsInStock, $ItemConsole,  $ItemDescription, $ItemRating);

    mysqli_stmt_execute($stmt);

    // check if record was added
    // this will give you the id of the record that was just added
    if(mysqli_insert_id($db)){
        // redirect
        header('Location: includes/header.php?id=' . $ItemID);
    }else{
        // TODO: let the user know there was an error
    }
}

// close database connection (put in footer to avoid doing multiple times)
mysqli_close($db);
?>

<form method="post">
    <p>
        <label for="ItemName">Name: </label>
        <input type="text" id="name" name="name">
    </p>
    <p>
        <label for="ItemPrice">Price: </label>
        <input type="text" id="address" name="address">
    </p>
    <p>
        <label for="ItemsInStock">Quantity: </label>
        <input type="text" id="address" name="address">
    </p>
    <p>
        <label for="ItemConsole">Console: </label>
        <input type="hidden" name="cityId" value="<?= $city['ID'] ?>">
        <input type="text" id="city" value="<?= $city['Name'] ?>" disabled>
    </p>
    <p>
        <label for="ItemDescription">Description: </label>
        <textarea id="description" name="description"></textarea>
    </p>
    <p>
        <label for="ItemRating">Rating: </label>
        <select id="rating" name="rating">
            <option value="1">⭐️</option>
            <option value="2">&starf;&starf;️</option>
            <option value="3">⭐⭐⭐️</option>
            <option value="4">⭐⭐⭐⭐️</option>
            <option value="5">⭐⭐⭐⭐⭐️</option>
        </select>
    </p>
    <p>
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <button type="submit" name="add" class="btn btn-primary">Add Place</button>
    </p>
</form>

<?php include "includes/footer.php" ?>
