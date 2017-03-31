<form action="login.php" class="form" method="post" id="myForm">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" type="text" id="username" name="username" required/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password" required/>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="Login" value="Login" />
        <a class="btn btn-default" href="customers/signup.php">Signup</a>
    </div>
</form>
