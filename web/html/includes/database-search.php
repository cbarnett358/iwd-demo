<?php
$pageTitle = "Welcome to Northwind!">
    include "./header.php";
?>
<div class="container-lg">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../games.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Search Results</li>
        </ol>
    </nav>
    <table class="table">


        <?php

        if (isset($_POST['submit'])) {
            // Connect to the database
            $connection_string = new mysqli("localhost", "cbarnett4", "000502010", "northwind");

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

            $sql = "SELECT * FROM levelup__products WHERE ItemName LIKE ?";

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

                    echo "<b>Product Name</b>: ". $row['ItemName'] . "<br />";
                    echo "<b>Unit Price</b>: ". $row['ItemPrice'] . "<br />";
                    echo "<b>Units Stocked</b>: ". $row['ItemsInStock'] . "<br />";


                }
            }

        } else {

            echo "That is not allowed!";
            exit();
        }
        ?>
    </table>
</div>
<?php include "footer.php" ?>