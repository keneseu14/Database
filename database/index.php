<?php

require 'config/dbconnection.php';

    #create a query
    $query = 'SELECT * FROM users';
    #get query
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
        <?php foreach ($users as $user): ?>
            <div class="container" style="background-color:#F5F5DC; text-align:center;">
                <h3><?php echo $user['username']; ?></h3>
                <small> Created on <?php echo $user['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>