<?php

require 'config/config.php';
require 'config/dbconnection.php';

    #get ID
    $id = mysqli_real_escape_string ($conn, $_GET['id']);
    #create a query
    $query = 'SELECT * FROM users where id='.$id;
    #get query
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    #free result
    mysqli_free_result($result);
    #connection close
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Database</title>
</head>
<body>
    <div class="jumbotron">
        <h1 style="font-family:'Impact', san-serif; text-align:center;" ">USERS</h1>.
            <div class="container" style="background-color:#F5F5DC; text-align:center;">
                <h3><?php echo $user['username']; ?></h3>
                <h4>User's Details <?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?></h4>
                <small> Created on <?php echo $user['created_at']; ?></small><br>
                <a class="btn btn-success" href="index.php">Back</a>
                <hr class="my-4">
            </div>
    </div>
</body>
</html>