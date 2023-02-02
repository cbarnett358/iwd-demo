<?php
$pageTitle = "Welcome to Northwind!">
    include "includes/header.php";
?>
<div class="container-lg">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="games.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>
    <h1>Search Results</h1>
    <table class="table">
         <tbody>
            <thead>
            <tr>
                <td>
                    <a>Name</a>
                </td>
                <td>
                    <a>ItemDescription</a>
                </td>
                <td>
                    <a">Console</a>
                </td>

                <td>
                    <a>Price</a>
                </td>
                <td>
                    <a>Quantity</a>
                </td>

                <td>
                    <a>Rating</a>
                </td>

            </tr>
            </thead>
            </tbody>
        <?php

        if (isset($_POST['submit'])) {
            // Connect to the database
            $connection_string = new mysqli("localhost", "cbarnett4", "000502010", "cbarnett4");

            $searchString = mysqli_real_escape_string($connection_string, trim(htmlentities($_POST['search'])));

            if ($connection_string->connect_error) {
                echo "Failed to connect to Database";
                exit();
            }


            if ($searchString === "" || !ctype_alnum($searchString) || $searchString < 3) {
                echo "Invalid search string";
                exit();
            }


            $searchString = "%$searchString%";

            $sql = "SELECT * FROM `levelup__products` WHERE ItemName LIKE ?";

            $prepared_stmt = $connection_string->prepare($sql);
            $prepared_stmt->bind_param('s', $searchString);
            $prepared_stmt->execute();

            // Fetch result
            $result = $prepared_stmt->get_result();

            if ($result->num_rows === 0) {
                echo "Sorry! No Products Found";
                exit();

            } else {
                while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td><a href="game-info.php?code="><?= $row['ItemName'] ?></td>
            <td><?= $row['ItemDescription'] ?></td>
            <td><?= $row['ItemConsole'] ?></td>
            <td><?= $row['ItemPrice'] ?></td>
            <td><?= $row['ItemsInStock'] ?></td>
            <td><?= implode('', array_fill(0, $row['ItemRating'], '⭐')) ?></td>


        </tr>

        <?php
        }

                }


        } else {

            echo "That is not allowed!";
            exit();
        }
        ?>
    </table>
</div>
<?php include "includes/footer.php" ?>