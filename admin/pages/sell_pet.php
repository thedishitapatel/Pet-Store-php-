<?php
    session_start();
    $_SESSION['title'] = "Sell Pet";
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

    //select all the information of customer by username
    $sql = "SELECT * FROM CUSTOMERS ORDER BY USERNAME";

    $customerdata = mysqli_query($conn,$sql);

    //select all the information of pet
    $sql = "SELECT * FROM PETS ORDER BY NAME";

    $petdata = mysqli_query($conn,$sql);


                    $print_pets = "";
                    $pets = $petdata->fetch_all();
                    //print_r($cus);
                    foreach ($pets as $pet) {
                        $print_pets .=  "<option value='".$pet[0]."'>" . $pet[1] .  "     " . $pet[2] .  "     " . $pet[3] . "   " . $pet[4] ."</option>"  ;
                    }


$print_customer = "";
$cus = $customerdata->fetch_all();

//displays the information of all the customers
foreach ($cus as $cust) {
    $print_customer .=  "<option value='".$cust[0]."'>". $cust[2] .  "     " . $cust[3] . " </option>"  ;
}


?>
<?php require "../../includes/header.php" ?>

<div class="container">

    <h1 class="page-header">SELL PETS</h1>


    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a href="../admin.php" class="navbar-brand">Home</a>
        </div>
        <div>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                <li><a href="new_customer.php">Add Customer</a></li>
                <li><a href="new_pet.php">Add Pet</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="pets.php">Pets</a></li>
                <li><a href="#">Sell Pet</a></li>
                <li><a href="../../includes/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form action="../../admin/processes/sell_pets.php" method="post">
                </br>
                <label for="customer">Select Customer</label></br>
                <select name="customer" id="customer">
                    <?php echo $print_customer;?>
                </select></br>
                <label for="pets">Select Pet</label>
                <select name="pets" id="pets">
                    <?php echo $print_pets; ?>
                </select>
                </br></br>
                <input type="submit" class="submit" value="Sell">
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<?php require "../../includes/footer.php" ?>
