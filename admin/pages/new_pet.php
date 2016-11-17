<?php
session_start();
$_SESSION['title']="Add Pet";

?>

<?php require "../../includes/header.php"?>

    <!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
    <div class="container">

        <h1 class="page-header">Add new Pet</h1>
        <nav class=" navbar navbar-inverse">
            <div class="navbar-header">
                <a href="../admin.php" class="navbar-brand">Home</a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                    <li><a href="new_customer.php">Add Customer</a></li>
                    <li><a href="new_pet.php">Add Pet</a></li>
                    <li><a href="customers.php">Customers</a></li>
                    <li><a href="pets.php">Pets</a></li>
                    <li><a href="sell_pets.php">Sell Pet</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <?php include '../../Forms/pets/add.php' ?>


    </div>

<?php require "../../includes/footer.php"?>