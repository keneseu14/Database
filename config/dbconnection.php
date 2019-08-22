<?php

    #connection

    $conn = mysqli_connect('localhost', 'root','123', 'user_account');

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL" . mysqli_connect_errno();
    }


?>