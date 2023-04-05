<?php 
if(!isset($_SESSION['admin'])){
    header('location: login.php');
}
else{ 
    $admin = $_SESSION['admin'];
}

$users = 0;
$info = mysqli_query($db, "SELECT * FROM users");
  while($row = mysqli_fetch_array($info)){
    $users++;
  }

$blogs = 0;
$info = mysqli_query($db, "SELECT * FROM blogs");
  while($row = mysqli_fetch_array($info)){
    $blogs++;
  }

$today = date('Y-m-d');
$new_blogs = 0;
$info = mysqli_query($db, "SELECT * FROM blogs WHERE date_added='$today' ");
  while($row = mysqli_fetch_array($info)){
    $new_blogs++;
  }

?>