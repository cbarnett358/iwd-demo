<?php
$pageTitle = "View Orders">
    include "includes/header.php";
?>

<div class="container-lg">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
    <?php

    $sort = $_GET['sort'] ?? 'CustomerName, OrderCity, OrderState, DateShipped,DatePurchased, ItemName, ItemPrice, OrderAddress';
    // Query to run on database
    $query = "SELECT *
          FROM levelup__orders
          LEFT JOIN levelup__products
          ON 
          levelup__orders.GameOrderID=levelup__products.ItemID
          ORDER BY $sort";

    ;
    //run the query

    //what you would do for a production database
    //$result = @mysqli_query($db, $query) or die('Error in query.');

    // In development
    $result = @mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));
    ?>
    <h1>View Orders</h1>

    <!--Search -->
<form>
    <label>Search: <input id="search"></label>
</form>
    <table class="table" id="orders-table">
        <tbody>
        <thead>
        <tr>
            <th><a href="?sort=CustomerName">CustomerName</th>
            <th>ItemID</th>
            <th>OrderZip</th>
            <th><a href="?sort=OrderCity">OrderCity</th>
            <th><a href="?sort=OrderState">OrderState</th>
            <th><a href="?sort=OrderAddress">OrderAddress</th>
            <th>GameOrderID</th>
            <th><a href="?sort=DateShipped">DateShipped</th>
            <th><a href="?sort=DatePurchased">DatePurchased</th>
            <th><a href="?sort=ItemName">ItemName</th>
            <th><a href="?sort=ItemPrice">Price</a></th>


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
                <td><?= $row['CustomerName'] ?></td>
                <td><?= $row['ItemID'] ?></td>
                <td><?= $row['OrderZip'] ?></td>
                <td><?= $row['OrderCity'] ?></td>
                <td><?= $row['OrderState'] ?></td>
                <td><?= $row['OrderAddress'] ?></td>
                <td><?= $row['GameOrderID'] ?></td>
                <td><?= $row['DateShipped'] ?></td>
                <td><?= $row['DatePurchased'] ?></td>
                <td><?= $row['ItemName'] ?></td>
                <td><?= $row['ItemPrice'] ?></td>

            </tr>
            <?php
        }

        //close the database connection
        // (this usually happens in a footer)
        mysqli_close($db);
        ?>
    </table>
</div>
<?php
    include "includes/footer.php";
?>