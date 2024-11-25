<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include("connection.php");

    session_start();
    if (!isset($_SESSION["name"])) {
        header("location:index.php");    }
        else {
            $name= $_SESSION["name"];
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            width: 90%;
            padding: 0px 20px;
            border-collapse: collapse;
        margin-left: 6%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .top_nav{
            background-color: blue;
            padding: 9px 9px;
            color: white;
            text-align: center;
        }
        h1{
            text-align: center;
            font-weight: bold;
        }
        button{
            padding: 10px;
            width: 10%;
            border-radius: 20px;
            border: none;
            background-color: #2fc2;
            
            &:hover{
                transition: 2s ease;
                transform: scaleY(1.30);
            }
        }
        button a{
            text-decoration: none;
            color: black;
        }
        span{
            color: blue;
        }
        .card{
            box-shadow: 0px 0px 30px #289fc2;
            border: 1px solid black;
            width: 20%;
            border-radius: 10px;
           margin-left: 40%;
           margin-bottom: 30px;
        }
        .card h1{
            color: #222fc2;
            font-weight: blod;
        }
        .card h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="top_nav">
        <div class="log">
            <h1>Dash board</h1>
        </div>
    </div>
    <h1>Registed account <span><?php echo $name ; ?></span></h1>
    <button style="margin-bottom:20px;" ><a href="log.php">Logout</a></button>
    <div class="card">
        <?php 
        $query=mysqli_query($con,"SELECT count(*) AS total_user FROM register ");
       while ( $row=mysqli_fetch_array($query)) {
        ?>
        <h1>Total user</h1>
        <h2><?php echo $row['total_user'];  ?></h2>
        <?php
       }
        ?>
    </div>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query=mysqli_query($con,"SELECT * FROM register");
        while ($row=mysqli_fetch_array($query)) {
            ?>
            <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['password']?></td>
            <td><button><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></button>//<button><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></button>//<button><a href="view.php?id=<?php echo $row['id']; ?>">View</a></button></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>