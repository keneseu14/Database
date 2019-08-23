<?php
require ('config/config.php');
require ('config/dbconnection.php');

$id = mysqli_real_escape_string ($conn, $_GET['id']);
#create a query
$query = 'SELECT * FROM users where id='.$id;
#get query
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
#free result
mysqli_free_result($result);
#connection close

    if(isset($_POST['submit'])){
        $id = $user['id'];
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $firstName = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastName = mysqli_real_escape_string($conn,$_POST['lastname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pword = mysqli_real_escape_string($conn,$_POST['password']);
        $age = mysqli_real_escape_string($conn,$_POST['age']);

    $sql = "UPDATE users SET username='$username' , firstname='$firstName' , email='$email', password='$pword', age={$age} WHERE id={$id}";

        if(mysqli_query($conn, $sql)){
            header("Location:". ROOT_URL.'');
        }else{
            echo "ERROR ". mysqli_error($conn);
        }
        mysqli_close($conn);
    }

?>

<?php include ('inc/header.php');?>

    <div class="jumbotron">
        <h1 style="font-family:'Impact', san-serif;" >Edit User</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <div>
                <label> Username </label>
                <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
            </div>
            <div>
                <label> First Name </label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>">
            </div>
            <div>
                <label> Last Name </label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>">
            </div>
            <div>
                <label> Email </label>
                <input type="text" class="form-control" name="email"  value="<?php echo $user['email']; ?>">
            </div>
            <div>
                <label> Password </label>
                <input type="text" class="form-control" name="password"  value="<?php echo $user['password']; ?>">
            </div>
            <div>
                <label> Age </label>
                <input type="text" class="form-control" name="age"  value="<?php echo $user['age']; ?>">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="<?php echo $user['id']; ?>">
        </form>
    </div>

<?php include ('inc/footer.php');?>