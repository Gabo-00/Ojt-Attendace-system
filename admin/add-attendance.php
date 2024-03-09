<?php 
// error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}
include_once('../connections/conn.php');
date_default_timezone_set("Asia/Manila"); // set timezone
$date_now = date("Y-m-d", strtotime("now")); // get current date


$con= con();
$id = $_GET['studentID']; 

$sql = "SELECT * FROM account where student_id = '$id' ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

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
    <!-- <style>
        .table{
            margin-left: 5%;
            margin-right: 10%;
            margin-top: 3%;
        }
        td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
        margin-left: 5%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
    </style> -->
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
        <h5><a href="view-students.php?studentID=<?php echo $row['student_id']; ?>"><span
                            class="glyphicon glyphicon-arrow-left btn btn-primary" aria-hidden="true"></span> Go
                        Back</a> </h5>
        
                    <h2 style=" text-align: center;">Add  Attendance</h2>
                    <hr>
                   
                    </form>
                    <!-- delete student -->

                    <!-- <p>The list of registered Users:</p>             -->
                    <table class="table table-bordered" style="margin-right: 5%;">
                        <thead style="background-color:yellowgreen;">
                            <tr>
                                <th>Name</th>
                                <th>Student Id.no</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['student_id']; ?></td>


                            </tr>
                        </tbody>
                    </table>
                    <!---end of table--->

                    <!-- PHP -->
                    <h2>Add Admin</h2>
                    <?php // this is for add.php

   
    if(isset($_POST['add'])){
      $conn = con();
      $date = $_POST['date'];
      $time1 = $_POST['time1'];
      $time2  = $_POST['time2'];
      $time3 = $_POST['time3'];
      $time4 = $_POST['time4'];
    
  
      $duplicate=mysqli_query($conn,"SELECT * from attendance where std_id = '$id'  and date= '$date' ");
      if($date > $date_now){
        echo "<p class='btn btn-danger' style='width:100%;'>Sorry the date you entered are too advance from the current date!</p>";
      }
      elseif (mysqli_num_rows($duplicate)==0){
          $sql = "INSERT INTO `attendance`(  `std_id`,`date`,`morning_in`,`morning_out`,`afternoon_in`,`afternoon_out`) VALUES ('$id','$date','$time1','$time2','$time3','$time4')";
          $conn->query($sql) or die($conn->error);
          echo "<p class='btn btn-success' style='width:100%;'>Attendance Added!</p>";
          // echo "<p style= 'color:red ; border:1px solid #000; background: #ccc;padding:2px ;font-size:15px;'>Attendance Added !</p>";

      }else{
          
      echo "<p class='btn btn-danger' style='width:100%;'>Date and time is Already Exist!</p>";
      }
     }  
     
     ?>
                    <!-----------------EEnd of PHP----------------------->
                    <br>
                    <form action=" " method="POST">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" autofocus autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="time1">Morning TimeIn</label>
                            <input type="time" class="form-control" id="time1" name="time1" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="time2">Morning TimeOut</label>
                            <input type="time" class="form-control" id="time2" name="time2" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="time3">Afternoon TimeIn</label>
                            <input type="time" class="form-control" id="time3" name="time3" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label for="time4">Afternoon TimeIn</label>
                            <input type="time" class="form-control" id="time4" name="time4" autocomplete="off" >
                        </div>
                        <button type="submit" class="btn btn-success" name="add" style="width:100%;">Submit</button>
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