<?php
include("connection.php");
if (isset($_GET['id'])) {
    $id=$_GET['id'];

    //delet query
    $query=mysqli_query($con,"DELETE FROM register WHERE id='$id'");
    if ($query) {
        header("location:dash.php");
    }
}
?>