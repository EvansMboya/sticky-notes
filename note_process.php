<?php
$mysqli=new mysqli('localhost','root','','CRUD') or die(mysqli_error($mysqli));

echo('connected');

 if(isset($_POST['submit'])){
     $add_note=$_POST['add_note'];
     $pick_color= $_POST['pick_color'];
     $status=$_POST['status'];

     $mysqli->query("INSERT INTO `sticky_notes`( `notes_list`, `notes_color`, `notes_status`) VALUES ('$add_note','$pick_color','$status')") or die($mysqli->error);

     header("location:index.php");

 }