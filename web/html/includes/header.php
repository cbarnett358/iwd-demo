
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
    <link rel="stylesheet" href="https://use.typekit.net/hgb8qga.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Home Page</title>
</head>
<body><header>
    <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-custom shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand">
                <!-- Logo Image -->
                <img src="../includes/images/levelUP_Logo.png" height="45" alt="" class="d-inline-block align-middle mr-2">
                <!-- Logo Text -->
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="../index.php" class="nav-link">HOME</a></li>
                    <li class="nav-item"><a href="games.php" class="nav-link">PRODUCTS</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link">LOG-IN</a></li>
                    <li class="nav-item"><a href="orders.php" class="nav-link">ORDERS</a></li>

                </ul>

            </div>
            <td>
                <form action="database-search.php" method="post">
                    <input
                            type="text"
                            placeholder="Search for products..."
                            name="search"
                            required>
                    <button type="submit" name="submit">Search</button>
                </form>

            </td>
        </div>
    </nav>
</header>


