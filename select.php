<?php
include("connection.php");

    if (isset($_POST['submit'])) {
        $name=$_POST['uname'];
        $password=$_POST['pass'];
    
        //verfiy the data inserted
    
        $query=mysqli_query($con,"SELECT username,password FROM register WHERE username='$name' AND password='$password'");
        if (mysqli_num_rows($query)==1) {
            $row=mysqli_fetch_array($query);
            session_start();
            $_SESSION["name"]=$row["username"];
            header("location:dash.php");
        }
        else {
            echo '<script>alert("create account");</script>';
            // header("location:account.php");
        }
    }
    ?>