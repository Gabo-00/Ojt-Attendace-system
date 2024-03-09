<?php 

include_once("../connections/conn.php");

$con = con();

if(isset($_POST['delete'])){
    $id = $_POST['ID'];
    $sql ="DELETE FROM user WHERE id ='$id' " ;
    $con->query($sql) or die($con->error);
    
    // echo header("Location: ../admin/manage-admin.php");
    $_SESSION["myMessage"] ="<h4 class='alert alert-warning'>Admin Deleted!</h4>";
    Header( "Location:  ../admin/manage-admin.php");
    exit;
}

if(isset($_GET['id'])){
$sql = "DELETE FROM user WHERE id=".$_GET['id'];
$mysqli->query($sql);
Header( "Location:  ../admin/manage-admin.php");
}