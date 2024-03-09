<?php 

include_once("../connections/conn.php");

$con = con();
$id_2 = $_GET['studentID'];
if(isset($_POST['delete'])){
    $id = $_POST['ID'];
  

    $sql2 ="DELETE FROM attendance WHERE id='$id' " ;
    $con->query($sql2) or die($con->error);
    
    echo header("Location: ../admin/view-students.php?studentID=".$id_2);
    
}