<?php

require ('config/config.php');
require ('config/dbconnection.php');

    if(isset($_POST['delete'])){
        $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);

        $sql = "DELETE FROM users WHERE id={$delete_id}";

        if(mysqli_query($conn, $sql)){
            header("Location:". ROOT_URL.'');
        }else{
            echo "ERROR ". mysqli_error($conn);
        }
    }

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
<?php include 'inc/header.php';?>
    <div class="jumbotron">
        <h1 style="font-family:'Impact', san-serif; text-align:center;" ">USERS</h1>.
            <div class="container" style="background-color:#F5F5DC; text-align:center;">

               <!-- FOR USER INFORMATION-->
                <h3> User's Details <?php echo $user['username']; ?></h3>
                <h4>Fullname: <?php echo $user['firstname']; ?> <?php echo $user['lastname']; ?></h4>
                <h4>Age: <?php echo $user['age'];?></h4>
                <h4>Email: <?php echo $user['email'];?></h4>
                <h4>Password: <?php echo $user['password'];?></h4>
                <small> Created on <?php echo $user['created_at']; ?></small><br>

                <form class="pull-right" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <input type="hidden" name="delete_id" value="<?php echo $user['id'];?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                    <a class="btn btn-primary" href="edituser.php?id=<?php echo $user['id'];?>">Edit</a>
                    <a class="btn btn-success" href="index.php">Back</a>
                    <hr class="my-4">
                </form>
            </div>
    </div>
<?php include 'inc/footer.php';?>