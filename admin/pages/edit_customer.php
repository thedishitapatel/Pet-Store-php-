<?php
session_start();

    $username = $_GET['username'];

$_SESSION['title'] =  $username;

require_once '../../database/secret.php';
//connect with database
$conn = mysqli_connect($host,$un , $pw,$db);

//if you could not connect to database
if (mysqli_connect_errno())
{
    //redirect to main page
    header('Location:../admin.php');
    exit;
}


$sql = "SELECT * FROM CUSTOMERS WHERE USERNAME='$username'";



$result = mysqli_query($conn,$sql);

if($result->num_rows == 1) {
    while ($row = $result->fetch_assoc()) {

        $username = $row['USERNAME'];
        $first = $row['FIRST'];
        $last = $row['LAST'];


    }
}
?>

<?php require "../../includes/header.php" ?>

    <!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
    <div class="container">

        <h1 class="page-header">Edit <?=$username;?></h1>
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
                    <li><a href="../pages/sell_pets.php">Sell Pet</a></li>
                    <li><a href="../../includes/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <?php include '../../Forms/customers/edit.php';  ?>

    </div>

<?php require "../../includes/footer.php"?>