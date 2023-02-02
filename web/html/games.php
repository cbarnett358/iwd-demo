<?php
$pageTitle = "Browse Games">
    include "includes/header.php";
?>

<div class="container-lg">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>
    <?php


       $sort = $_GET['sort'] ?? 'ItemRating, ItemName, ItemConsole, ItemsInStock';

    //}
    $query = "SELECT ItemName, ItemPrice, ItemsInStock, ItemDescription, ItemConsole, ItemRating, ItemID
          FROM `levelup__products`
          WHERE ItemsInStock >= ItemsOnOrder
          ORDER BY $sort";


    //run the query

    //what you would do for a production database
    //$result = @mysqli_query($db, $query) or die('Error in query.');

    // In development
    $result = @mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));
    ?>
    <h1>Products</h1>

    <table class="table">
        <tbody>
        <thead>
        <tr>
            <td>
                <a href="?sort=ItemName">Name</a>
            </td>
            <td>
                <a>ItemDescription</a>
            </td>
            <td>
                <a href="?sort=ItemConsole">Console</a>
            </td>

            <td>
                <a href="?sort=ItemPrice">Price</a>
            </td>
            <td>
                <a href="?sort=ItemsInStock">Quantity</a>
            </td>

            <td>
                <a href="?orderBy=ItemRating">Rating</a>
            </td>


        </tr>
        </thead>
        </tbody>

        <?php
        //loop through results
        //each time mysqli_fetch_array is called, it retrieves the next record.
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // $row represents a record in the database
            //echo $row['Name'] . '<br>'
            ?>
            <tr>
                <td><a href="game-info.php?code="><?= $row['ItemName'] ?></td>
                <td><?= $row['ItemDescription'] ?></td>
                <td><?= $row['ItemConsole'] ?></td>
                <td><?= $row['ItemPrice'] ?></td>
                <td><?= $row['ItemsInStock'] ?></td>
                <td><?= implode('', array_fill(0, $row['ItemRating'], '⭐')) ?></td>
                <td>
                    <a href='edit-games.php?id={$row['ItemID']}' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='delete-games.php?id={$row['ItemID']}' class='btn btn-sm btn-danger'>Delete</a>
                </td>


            </tr>

            <?php
        }

        //close the database connection
        // (this usually happens in a footer)
        mysqli_close($db);
        ?>

    </table>
    <a href="add-games.php" class="btn btn-primary mb-4">ADD GAMES</a>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only"></span>
      </span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
<?php include "includes/footer.php" ?>

