<?php
include "includes/header.php";

if(isset($_SESSION['authUser']) and $_SESSION['authUser']):
    ?>
    <div class="container">
        <h1>Admin Area</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae culpa doloremque doloribus ea eos expedita inventore iste similique sunt veniam. Dolorem doloribus esse, explicabo quidem sequi sunt? Amet atque, culpa. Beatae deleniti exercitationem harum hic molestias nesciunt perspiciatis, possimus sint tempora vitae! Blanditiis dolores impedit, inventore maxime nihil quidem quis ratione rem tenetur vitae. Dolore maiores possimus quisquam totam vel. A aliquid animi asperiores atque cum doloribus, eos eum expedita impedit magni minima, modi necessitatibus non, numquam odit perferendis reprehenderit repudiandae sed tempore temporibus! A accusantium amet eveniet impedit iure iusto labore nihil, nisi possimus provident quidem recusandae repudiandae sunt!</p>

        <?php if($_SESSION['authUser']['role'] == 'admin'): ?>
            <button class="btn btn-primary">Edit</button>
        <?php endif; ?>
    </div>


<?php else: ?>
    <div class="container">
        <h1>Admin Area</h1>
        <div class="alert alert-danger">Access denied. Please <a href="../login.php">login</a>.</div>
    </div>
<?php
endif;

include "includes/footer.php";
?>
