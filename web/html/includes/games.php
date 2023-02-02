<?php
require_once "database.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../includes/style.css">
    <title>Shop Our Games</title>
</head>
<body>

<?php
$pageTitle = "View Used Games!">
    include "header.php";
?>
<div class="container-lg">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>
    <?php
    // Query to run on database
    $orderBy = array('ProductName', 'UnitPrice', 'UnitsInStock');

    $order = 'asc';
    if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
        $order = $_GET['orderBy'];
    }
    $query = "isset SELECT ItemName, ItemPrice, ItemsInStock
          FROM `levelup__products`
          WHERE (((Discontinued)=False) AND ((UnitsInStock)>=UnitsOnOrder))
          ORDER BY '.$order'";


    //run the query

    //what you would do for a production database
    //$result = @mysqli_query($db, $query) or die('Error in query.');

    // In development
    $result = @mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));
    ?>
    <table class="table">
        <tbody>
        <thead>
        <tr>
            <td>
                <a href="?orderBy=ProductName">ProductName</a>
            </td>
            <td>
                <a href="?orderBy=UnitPrice">UnitPrice</a>
            </td>
            <td>
                <a href="?orderBy=UnitsInStock">UnitsInStock</a>
            </td>
            <td>
                <form action="searchdb.php" method="post">
                    <input
                        type="text"
                        placeholder="Enter your search term"
                        name="search"
                        required>
                    <button type="submit" name="submit">Search</button>
                </form>
            </td>
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
                <td><a href="product-info.php?code="><?= $row['ProductName'] ?></td>
                <td><?= $row['UnitPrice'] ?></td>
                <td><?= $row['UnitsInStock'] ?></td>

            </tr>

            <?php
        }

        //close the database connection
        // (this usually happens in a footer)
        mysqli_close($db);
        ?>
    </table>
</div>
<?php include "footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>