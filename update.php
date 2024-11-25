<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include("connection.php"); 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        //select query
        $query=mysqli_query($con,"SELECT username,password  FROM register WHERE id='$id'");
        $row=mysqli_fetch_array($query);
        if ($row) {
            $name=$row['username'];
            $password=$row['password'];
        }
        else {
            echo"no data recoded";
        }
    }
    //update
    if (isset($_POST['submit'])) {
        //decrarestion
        $name=$_POST['uname'];
        $password=$_POST['pass'];
        $pass=$_POST['passw'];
    
        //verfication of password
        if ($password==$pass) {
            $query=mysqli_query($con,"UPDATE register set username='$name',password='$password' WHERE id='$id'");
            header("location:dash.php");
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Create account</h1>
        <label for="">Username</label>
        <input type="text" name="uname" id="" placeholder="username" value="<?php echo $name;?>">
        <label for="">password</label>
        <input type="password" name="pass" id="" placeholder="password" value="<?php echo $password;?>">
        <label for="">confirm password</label>
        <input type="password" name="passw" id="" placeholder="confirm password" value="<?php echo $password;?>">
        <input type="submit" value="Create account" name="submit">
    </form>
</body>
</html>
<?php 

?>