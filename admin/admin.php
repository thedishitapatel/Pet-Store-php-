<?php
session_start();
$_SESSION['title']="Admin";


?>

<?php require "../includes/header.php"?>

    <!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
    <div class="container">

        <h1 class="page-header">Welcome to Admin Panel</h1>
        <nav class=" navbar navbar-inverse">
            <div class="navbar-header">
                <a href="admin.php" class="navbar-brand">Home</a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                    <li><a href="pages/new_customer.php">Add Customer</a></li>
                    <li><a href="pages/new_pet.php">Add Pet</a></li>
                    <li><a href="pages/customers.php">Customers</a></li>
                    <li><a href="pages/pets.php">Pets</a></li>
                    <li><a href="pages/sell_pet.php">Sell Pet</a></li>
                    <li><a href="../includes/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>


    </div>

<?php require "../includes/footer.php"?>