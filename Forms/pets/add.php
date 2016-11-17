<form action="../../admin/processes/add_pet.php" class="form" method="post" id="myForm">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name"  value="<?=(isset($name) ?$name :'');?>"   name="name" required/>
    </div>

    <div class="form-group">
        <label for="breed">Breed</label>
        <input class="form-control" type="text" id="breed" value="<?=(isset($breed) ?$breed :'');?>" name="breed" required/>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input class="form-control" type="number" value="<?=(isset($age) ?$age :'');?>" id="age" name="age" />
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input class="form-control" type="number" id="price"  value="<?=(isset($price) ? $price :'');?>"  name="price" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add" value="Add Pet" />
        <input class="btn btn-warning" type="reset" value="Reset">
    </div>
</form>
