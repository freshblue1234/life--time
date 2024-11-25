<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("connection.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Create account</h1>
        <label for="">Username</label>
        <input type="text" name="uname" id="" placeholder="username">
        <label for="">password</label>
        <input type="password" name="password" id="" placeholder="password">
        <label for="">confirm password</label>
        <input type="password" name="pass" id="" placeholder="confirm password">
        <a href="account.php">Create account?</a>
        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $names=$_POST['uname'];
    $password=$_POST['password'];
    $pass=$_POST['pass'];

    //select query
    $query=mysqli_query($con,"SELECT username,password FROM register");
    $row=mysqli_fetch_array($query);
    if ($row) {
        $name=$row['username'];
        $passs=$row['password'];
    }
    if ($password!==$passs || $names!==$name || $password!== $passs) {
        if ($password == $pass) {
            $ins=mysqli_query($con,"INSERT INTO register (username,password) VALUES ('$names','$password')");
            header("location:index.php");
        }
    }
    else {
        echo '<script>alert("data corresiponded by data");</script>';
    }
}
?>