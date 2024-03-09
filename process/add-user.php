<?php
require_once('../connections/conn.php');
con();

// this is for add.php
function add_user(){
    if(isset($_POST['add'])){
        $conn = con();
        $name = $_POST['name'];
        $password = $_POST['password'];
        $access = $_POST['access'];
    
        $duplicate=mysqli_query($conn,"SELECT * from user where username= '$name' and password= '$password' ");
        if (mysqli_num_rows($duplicate)==0){
            $sql = "INSERT INTO `user`(  `username`,`password`,`access`) VALUES ('$name','$password','$access')";
            $conn->query($sql) or die($conn->error);
        
            echo "<p style= 'color:red ; border:1px solid #000; background: #ccc;padding:2px ;font-size:15px;'>User Added !</p>";
        
               header("Location: ../admin/add-admin.php?message= added ");
        echo "<p style= 'color:red ; border:1px solid #000; background: #ccc;padding:2px ;font-size:15px;'>Student ID Already Exist!</p>";
        }else{
            header("Location: ../admin/add-admin.php?message=Already added ");
        echo "<p style= 'color:red ; border:1px solid #000; background: #ccc;padding:2px ;font-size:15px;'>Student ID Already Exist!</p>";
        }
    }  

    }
    add_user();