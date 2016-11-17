<form action="../../admin/processes/add_customer.php" class="form" method="post" id="myForm">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" id="username" name="username" required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password" required/>
    </div>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input class="form-control" type="text" id="firstname" name="first" required/>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input class="form-control" type="text" id="lastname" name="last" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add" value="Add Customer" />
        <input class="btn btn-warning" type="reset" value="Reset">
    </div>

</form>