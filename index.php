<?php

require ('config/config.php');
require ('config/dbconnection.php');

    #create a query
    $query = 'SELECT * FROM users ORDER BY created_at DESC';
    #get query
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    #free result
    mysqli_free_result($result);
    #connection close
    mysqli_close($conn);
?>
<?php include ('inc/header.php');?>
    <div class="jumbotron">
        <h1 style="font-family:'Impact', san-serif; text-align:center;" >USERS</h1>.
        <?php foreach ($users as $user): ?>
            <div class="container" style="background-color:#F5F5DC; text-align:center;">
                <h3><?php echo $user['username']; ?></h3>
                <small> Created on <?php echo $user['created_at']; ?></small><br>
                <a class="btn btn-primary" href="post.php?id=<?php echo $user['id'];?>">Read More</a>
                <hr class="my-4">
            </div>
        <?php endforeach; ?>
    </div>
<?php include ('inc/footer.php');?>