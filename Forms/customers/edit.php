<form action="../../admin/processes/update_customer.php" class="form" method="post" id="myForm">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" id="username" value="<?=$username?>" name="username" readonly required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password" required/>
    </div>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input class="form-control" type="text" id="firstname" value="<?=$first?>" name="first" required/>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input class="form-control" type="text" id="lastname" value="<?=$last?>"  name="last" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Update Customer" />
        <input class="btn btn-warning" type="reset" value="Reset">
    </div>
</form>