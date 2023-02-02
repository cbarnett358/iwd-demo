<?php
$pageTitle = "Welcome to Northwind!">
    include "../includes/header.php";
?>

<?php
$code = $_GET['code'] ?? '';
$query = "isset SELECT * 
FROM levelup__products

";
$result = mysqli_query($db, $query) or die('Error in Query');
$country = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<?php



//run the query

//what you would do for a production database
//$result = @mysqli_query($db, $query) or die('Error in query.');

// In development
$result = @mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));

if(mysqli_num_rows($result) > 0){
    ?>
    <div class="container-lg">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../game-info.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Info</li>
        </ol>
    </nav>

    <table class="table">

    <tbody>

    <thead>
    <tr>
        <th>ItemID</th>
        <th>ItemName</th>
        <th>ItemPrice</th>
        <th>ItemsInStock</th>
        <th>ItemDescription</th>
        <th>ItemRating</th>
        <th>ItemsOnOrder</th>
        <th>ItemConsole</th>


    </tr>
    </thead>
    </tbody>

    <?php
    //loop through results
    //each time mysqli_fetch_array is called, it retrieves the next record.
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        // $row represents a record in the database
        //echo $row['Name'] . '<br>';
        ?>
        <tr>
            <!-- Use primary key when passing to another page (code in this case_ -->
            <td><?= $row['ItemID'] ?></td>
            <td><?= $row['ItemName'] ?></td>
            <td><?= $row['ItemPrice'] ?></td>
            <td><?= $row['ItemsInStock'] ?></td>
            <td><?= $row['ItemDescription'] ?></td>
            <td><?= $row['ItemRating'] ?></td>
            <td><?= $row['ItemsOnOrder'] ?></td>
            <td><?= $row['ItemConsole'] ?></td>


        </tr>
        <?php
    }
}
//close the database connection
// (this usually happens in a footer)
mysqli_close($db);
?>

    </table>

    </div>

<?php include "../includes/footer.php" ?>