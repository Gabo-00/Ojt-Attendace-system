<?php
require_once('../connections/conn.php');
con();

// this is for add.php
function add(){
    $conn = con();
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $studentId = $_POST['studentId'];

        $duplicate=mysqli_query($conn,"SELECT * from account where student_id ='$studentId' ");

        if (mysqli_num_rows($duplicate)==0){
            $sql = "INSERT INTO `account`(  `student_id`,`name`) VALUES ('$studentId','$name')";
           $conn->query($sql) or die($conn->error);
            header("Location: ../admin/add-student.php?message=Successfully added ");

            echo "<p style= 'color:red ; border:1px solid #000; background: #ccc;padding:2px ;font-size:15px;'>Student Added !</p>";
        }else{
            header("Location: ../admin/add-student.php?message=Already added ");
        echo "<p style= 'color:red ; border:1px solid #000; background: #ccc;padding:2px ;font-size:15px;'>Student ID Already Exist!</p>";
        }
        }
    }
    add();