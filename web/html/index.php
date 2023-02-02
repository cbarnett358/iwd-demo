
<?php
$pageTitle = "Welcome to LevelUp!">
    include "includes/header.php";
?>
<div class="card bg-dark text-white d-block w-100" id="cardpad">
    <img src="includes/images/games_retro.png" class="card-img" alt="...">
    <div class="card-img-overlay">
        <div class="container-lg ">

            <h7 class="card-title">WELCOME TO LEVEL UP GAMES!</h7>
            <p class="card-text">We sell collectors video games and consoles. We carry everything from your favorite comador games up to your favorite gameboy games and consoles. </p>

        </div>
    </div>
</div>

<div class="container-lg">

    <!-- Right Align Card  -->

    <h1>WHAT WE OFFER</h1>

    <div class="clearfix" id="about">
        <img src="includes/images/gameboy-3672462__480.jpeg" class="col-md-4 float-md-end mb-3 ms-md-3 img-fluid" alt="..." >

        <p>
            At LevelUp Games we buy and sell vintage video games and consoles!
        </p>

        <p>
With a vast selection of thousands of vintage games you'll be leveling up in no time!
        </p>

        <p>
            And yet, here you are, still persevering in reading this placeholder text, hoping for some more insights, or some hidden easter egg of content. A joke, perhaps. Unfortunately, there's none of that here.It simply takes up space and should not really be read.It simply takes up space and should not really be read.It simply takes up space and should not really be read.
        </p>

        <p>
            At Northwind Trading Co. We specialize in quality imports and exports from all across the world!
        </p>
 <form method="get" action="games.php">
        <button class="button">SHOP NOW</button>
 </form>
    </div>


    <!-- Three Card Layout -->

    <h1>TOP SELLERS</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 ">
        <div class="col">
            <div class="card h-100">
                <img src="includes/images/goldeneye.jpeg" class="card-img-top" alt="..." height="350px;">
                <div class="card-body">
                    <h5 class="card-title">GOLDENEYE 007</h5>
                    <p class="card-text">GoldenEye 007 is a first-person shooter where the player takes the role of Secret Intelligence Service agent James Bond through a series of levels. </p>
                </div>
                <div class="card-footer">
                    <form method="get" action="game-info.php">
                        <button class="button">SHOP NOW</button>
                    </form>                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="includes/images/red.jpeg" class="card-img-top" alt="..." height="350px;">
                <div class="card-body">
                    <h5 class="card-title">POKEMON RED</h5>
                    <p class="card-text">Through exciting exploration, battles, and trades, Trainers are able to access 150 Pokémon. You begin your journey in Pallet Town as a young boy.</p>
                </div>
                <div class="card-footer">
                   <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                    <form method="get" action="game-info.php">
                        <button class="button">SHOP NOW</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100" padding-top="100px" padding-bottom="100px">
                <img src="includes/images/ff7.jpeg" class="card-img-top" alt="..." height="350px;">
                <div class="card-body">
                    <h5 class="card-title">FINAL FANTASY 7</h5>
                    <p class="card-text">The game's story follows Cloud Strife, a mercenary who joins an eco-terrorist organization to stop a world-controlling megacorporation from using the planet's life essence as an energy source. </p>
                </div>
                <div class="card-footer">
                    <form method="get" action="game-info.php">
                    <button class="button">SHOP NOW</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <h1>WE ACCEPT TRADE-INS</h1>

    <div class="clearfix" id="about">
        <img src="includes/images/oldconsoe.avif" class="col-md-4 float-md-start mb-mr-3 img-fluid" alt="..." >

        <p>
            At LevelUp Games We Accept Trade-Ins!
        </p>

        <p>
        </p>
         Simply come into a LevelUp Games store with your used games, and we will give you either cash or store credit in return.
        <p>
            Trade-In Play More! If you opt for store credit you will receive 15% more for your trade-ins.
        </p>


    </div>
</div>



<?php include "includes/footer.php" ?>
<!-- JavaScript Bundle with Popper -->
