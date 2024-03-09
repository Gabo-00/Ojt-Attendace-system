<?php 

if(!isset($_SESSION)){
    session_start();
  }
include_once('../connections/conn.php');

// error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    


    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style>
    body {
  margin: 0;
  padding: 0;
  background-color: #12a0ec;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: white;
  border-radius:5%;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>

</head>
<body>

<div id="login">
   
        <h3 class="text-center text-white pt-5"></h3>
        
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                
                <div id="login-column" class="col-md-6">
                <?php

function Connection(){
    $host = "localhost";
    $username = "root";
    $password ="";
    $database = "attend";

$conn = new mysqli($host, $username, $password , $database);
    if ($conn->connect_error){
    echo "MySQL Connection Error!";
    echo $conn->connect_error;
    }else{
    //echo "Connection Successfull!";
    return $conn;
        }
}

function Valid(){
    $con = connection();
    if(isset($_POST['submit'])){
    
    
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
        $user = $con->query($sql) or die($con->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;
    
        if($total>0){
        $_SESSION['Userlogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("Location: home.php");
        }else{
        echo "<p id='hide' style= 'color:white ;  font-size:17px;'>    User Not Found! </p> ";
        }
    
    }
}Valid();

?>
                    <div id="login-box" class="col-md-12">
                        
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Admin Login</h3>
                            

                            <div class="form-group">
                                
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                <p><a href="../attendance.php">Go to Attendance</a></p>
                            </div>
                            
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>


  
    
</body>

   
</html>

