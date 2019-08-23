<?php
    require ('config/config.php');
    require ('config/dbconnection.php');
    session_start();

    $mess="";
    $msgClass="";
    if(isset($_POST['login'])){

        $user = mysqli_real_escape_string($conn,$_POST['username']);
        $pass = mysqli_real_escape_string($conn,$_POST['password']);


        $query = "SELECT * FROM users WHERE username='$user' AND password='$pass' LIMIT 1";
		$results = mysqli_query($conn, $query);

		if (mysqli_num_rows($results) == 1) { 
            $_SESSION['user'] = $user;
			header('location: index.php');
		}else {
            $mess= "Please enter a valid username and password!";
            $msgClass="alert-danger";
		}
    }
    if(isset($_POST['signup'])){
        header ('Location: signup.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="jumbotron jumbotron-fluid" >
            <div class="container">
                <div class="form-group">
                    <h1>Login Form</h1>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Password: </label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <br>
                <div class= "form-group">
                    <button type="submit" class="form-control" name="login">Login</button>
                    <br>
                    <button type="submit" class="form-control" name="signup">Signup</button>
                </div>
                <?php if($mess != ""):?>
                <div class="alert <?php echo $msgClass; ?>">
                    <?php echo $mess;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </form>
</body>
</html>