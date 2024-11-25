<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("connection.php"); 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        //select query
        $query=mysqli_query($con,"SELECT username,password FROM register WHERE id='$id'");
        $row=mysqli_fetch_array($query);
        if ($row) {
            $name= $row["username"];
            $password=$row['password'];
        }
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>
    <form action="" method="post">
        <div class="hed">
            <h1>View</h1>
            <img src="images.png" alt="" srcset="">
            <div class="inpts">
                <label for="">Username</label>
                <input type="text" name="name" id="" value="<?php echo $name; ?>" disabled>
                <label for="">password</label>
                <input type="text" name="password" id="" value="<?php echo $password; ?>" disabled>
                <input type="submit" value="Back to home" name="sub">
            </div>
        </div>
    </form>

</body>
</html>
<?php
if (isset($_POST['sub'])) {
    header("location:dash.php");
}
?>