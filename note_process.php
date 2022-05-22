<?php
$mysqli=new mysqli('localhost','root','','CRUD') or die(mysqli_error($mysqli));

echo('connected');

$note_id=0;
$update=false;
$note_id="";
$add_note="";


 if(isset($_POST['submit'])){
     $add_note=auto_list($_POST['add_note']);
     $pick_color= $_POST['pick_color'];
     $status=$_POST['status'];

     $mysqli->query("INSERT INTO `sticky_notes`( `notes_list`, `notes_color`, `notes_status`) VALUES ('$add_note','$pick_color','$status')") or die($mysqli->error);

     header("location:index.php");

 }

 if(isset($_GET['delete'])){
    $note_id=$_GET['delete'];
    $mysqli->query("DELETE FROM `sticky_notes` WHERE notes_id=$note_id");

    header("location:index.php");
    
 }

if(isset($_GET['edit'])){
    $note_id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM `sticky_notes` WHERE notes_id=$note_id");
    if($note_id>=1){
         $notes=$result->fetch_array();
         $add_note=$notes['notes_list'];
    }
}

 if(isset($_POST['update'])){
    $note_id=$_POST['note_id'];
    $add_note=auto_list($_POST['add_note']);
    $pick_color= $_POST['pick_color'];
    $status=$_POST['status'];

    $mysqli->query("UPDATE `sticky_notes` SET `notes_list`='$add_note',`notes_color`='$pick_color',`notes_status`='$status' WHERE notes_id= $note_id");

 }

 if(isset($_GET['completed'])){
    $note_id=$_GET['completed'];
    $result=$mysqli->query("SELECT notes_status FROM `sticky_notes` WHERE notes_id=$note_id");
    $note=$result->fetch_array();
    $status=$note['notes_status'];
    
    print_r($status) ;
    
    if($status=="pending"){
        $status="completed";
        $mysqli->query("UPDATE `sticky_notes` SET `notes_status`='$status' WHERE notes_id= $note_id");

    }else{
        $status="pending";
        $mysqli->query("UPDATE `sticky_notes` SET `notes_status`='$status' WHERE notes_id= $note_id");
    }
    }
    
 
 function auto_list($data){
     $data= '<li>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</li>\n<li>"),trim($data,"\n\r")).'</li>';
     return $data;
 }