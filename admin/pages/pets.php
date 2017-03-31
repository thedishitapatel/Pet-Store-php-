<?php


    session_start();

    $_SESSION['title']="PETS";

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

//search the pet based on bread and gives the details accordingly
if(isset($_GET['search'])) {
    $breed = strtoupper($_GET["search"]);
    $sql = "SELECT * FROM PETS WHERE BREED='".$breed."' ORDER BY NAME";
} else {
    $sql = "SELECT * FROM PETS ORDER BY NAME";
}
    $result = mysqli_query($conn,$sql);
?>


<?php require "../../includes/header.php"?>

<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">

    <h1 class="page-header">PETS' INFORMATIONS</h1>


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
                <li><a href="sell_pet.php">Sell Pet</a></li>
                <li><a href="../../includes/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="cols-sm-3"></div>
        <div class="cols-sm-3"></div>
        <div class="cols-sm-3">
            <form action="pets.php" method="get">
                <input type="search" name="search" placeholder="Enter Breed">
                <button type="submit" class="btn btn-danger">Search Pets</button>
            </form>
        </div>
        <div class="cols-sm-3"></div>
    </div>

    <?php
    if($result->num_rows == 0) {
        echo "<div class='alert alert-danger'>No Record Found</div>";
    } else {
        echo "<table class='table table-responsive table-bordered table-striped'><tr class='table-header'><th>NAME</th><th>BREED</th><th>AGE</th><th>PRICE</th><th>EDIT</th><th>DELETE</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["NAME"] . "</td><td>" . $row["BREED"] . "</td><td>" . $row["AGE"] . "</td><td>$ " . $row["PRICE"] . "</td>
         <td><a href='edit_pet.php?id=" . $row['PET_ID'] . "'> <i class='fa fa-edit'>&nbsp</i></a></td>
          <td><a href='../processes/delete_pet.php?id=" . $row['PET_ID'] . "'> <i class='fa fa-remove'>&nbsp</i></a></td>
          </tr>";
        }
        echo "</table>";
    }
    ?>
</div>

<?php require "../../includes/footer.php"?>
