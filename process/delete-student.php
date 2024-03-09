<?php 

include_once("../connections/conn.php");

$con = con();

if(isset($_POST['delete'])){
    $id = $_POST['ID'];
    $sql ="DELETE FROM account WHERE student_id='$id' " ;
    $con->query($sql) or die($con->error);
    
    echo header("Location: ../admin/manage-students.php");
    
}

