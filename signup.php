<?php
    if(isset($_POST['regis'])){
        session_start();
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pword'] = $_POST['pword'];
        echo '<script>alert(); </script>';
        header("location: login.php");
    }

    if(isset($_POST['back'])){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">
        <div class="jumbotron jumbotron-fluid" >
            <div class="container">
                <div class="form-group">
                    <h1>Signup Form</h1>
                    <label>Firstname</label>
                    <input type="text" name="fname" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Lastname: </label>
                    <input type="text" name="lname" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Password: </label>
                    <input type="password" name="pword" class="form-control" /><br>
                    <button type="submit" name="regis">Register</button>
                    <button type="submit" name="back">Back</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>