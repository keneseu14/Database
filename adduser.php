<?php

require ('config/config.php');
require ('config/dbconnection.php');

    #check
    if(isset($_POST['submit'])){
       
         $username = mysqli_real_escape_string($conn,$_POST['username']);
         $firstName = mysqli_real_escape_string($conn,$_POST['firstname']);
         $lastName = mysqli_real_escape_string($conn,$_POST['lastname']);
         $email = mysqli_real_escape_string($conn,$_POST['email']);
         $pword = mysqli_real_escape_string($conn,$_POST['password']);
         $age = mysqli_real_escape_string($conn,$_POST['age']);

         $query = "INSERT INTO users (username,firstname,lastname,age,password,email)
         VALUES ('$username','$firstName','$lastName',$age,'$pword','$email')";
             
        if(mysqli_query($conn, $query)){
             header("Location:". ROOT_URL.'');
        }else{
             echo "ERROR ". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>

<?php include ('inc/header.php');?>

    <div class="jumbotron">
        <h1 style="font-family:'Impact', san-serif;" >Add User</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <div>
                <label> Username </label>
                <input type="text" class="form-control" name="username">
            </div>
            <div>
                <label> First Name </label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div>
                <label> Last Name </label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div>
                <label> Email </label>
                <input type="text" class="form-control" name="email">
            </div>
            <div>
                <label> Password </label>
                <input type="text" class="form-control" name="password">
            </div>
            <div>
                <label> Age </label>
                <input type="text" class="form-control" name="age">
            </div>
            <input type="submit" class="btn btn-primary" name="submit">
        </form>
    </div>

<?php include ('inc/footer.php');?>