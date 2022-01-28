<?php
require('connection.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM `users` WHERE id=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error($link));
header("Location: read.php"); 
?>