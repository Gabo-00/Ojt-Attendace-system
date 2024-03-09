<!-- code by Adrian Joseph Lauresta -BSIT4 -->
<?php 
// error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}
include_once('../connections/conn.php');
date_default_timezone_set("Asia/Manila"); // set timezone
$date_now = date("Y-m-d", strtotime("now")); // get current date

function add(){
    $conn = con();
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $studentId = $_POST['studentId'];
        $start =  $_POST['date'];

        $duplicate=mysqli_query($conn,"SELECT * from account where student_id ='$studentId' ");

        if (mysqli_num_rows($duplicate)==0){
            $sql = "INSERT INTO `account`(  `student_id`,`name`,`time_added`) VALUES ('$studentId','$name','$start')";
          $conn->query($sql) or die($conn->error);

          $sql2 = "INSERT INTO `attendance`(  `std_id`) VALUES ('$studentId')";
          $conn->query($sql2) or die($conn->error);
            // header("Location: ../admin/add-student.php?message=Successfully added ");
            //echo header("Location:add-student.php");

            echo "<p class='alert alert-success' >Student Added !</p>";

        }else{
            
        echo "<p class='alert alert-danger'>Student ID Already Exist!</p>";
        }
        }
    }
  ;
?>
<!DOCTYPE html>
<!-- code by Adrian Joseph Lauresta -BSIT4 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>
<?php if(isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")){ ?>
    <div class="top">
    <label class="menu" onclick="toggleSidebar()"><i class="fa fa-bars" aria-hidden="true" id="menu-icon"></i></label>

        <div class="welcome"> 
         
            <img src="../pmftci.jpg" alt="">
        </div>

    </div>
    <div class="sidebar">
        <nav>
            <ul>
            <br><br>
            <li class="active"><a href="home.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-home"></i><br> Dashboard</a></li><br>
            <div class="line"></div>
            <li><a href="manage-admin.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-user"></i><br>&nbsp; &nbsp; User</a></li><br>
            <div class="line"></div>
            <li><a href="manage-students.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-user"></i><br>Students</a> </li>
            <div class="line"></div>
            <li><a href="../attendance.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-book"></i><br>Attendance</a> </li>
            <div class="line"></div>
        </ul>
        </nav>
        
        <div class="logout">

            <a href="logout.php">&nbsp; &nbsp; &nbsp;<i class="fa fa-sign-out"></i><br>&nbsp;Logout</a>
        </div>
    </div>

    <div class="header">
        <h1>Dashboard/Attendance</h3>
            <hr>

    </div>
    <br>
    <div class="main-container1">

        <div class="table1">
        <h5><a href="manage-students.php"><span
                            class="glyphicon glyphicon-arrow-left btn btn-primary" aria-hidden="true"></span> Go
                        Back</a> </h5>
        
                    <h2 style=" text-align: center;">Add  Attendance</h2>
                    <hr>
                   
                    </form>
                    <!-- delete student -->

                  

                    <!-- PHP -->
                    <h2>Add Admin</h2>
                    <?php   add() ?>
                    <!-----------------EEnd of PHP----------------------->
                    <br>
                    <form action=" " method="POST">
                            <div class="form-group">
                                <label for="email">Name:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name"
                                    autofocus autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Student ID :</label>
                                <input type="number" class="form-control" id="pwd" placeholder="Enter Student ID"
                                    name="studentId" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Start Date :</label>
                                <input type="date" class="form-control" id="pwd" name="date" autocomplete="off"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-success" name="add">Submit</button>
                        </form>
    </div>
    </div>
    <!--End of main-contasiner------>
    <?php }else{
  header("Location: login.php?Login First");
} ?>
    <script>
    var burger = document.querySelector('.menu');
    var sidebar = document.querySelector('.sidebar');

    burger.addEventListener('click', function() {
        burger.classList.toggle('active');
        sidebar.classList.toggle('active');
    });

    function toggleSidebar() {
  var menuIcon = document.getElementById("menu-icon");
  if (menuIcon.classList.contains("fa-bars")) {
    menuIcon.classList.remove("fa-bars");
    menuIcon.classList.add("fa-times");
  } else {
    menuIcon.classList.remove("fa-times");
    menuIcon.classList.add("fa-bars");
  }
}

    </script>
</body>

</html>