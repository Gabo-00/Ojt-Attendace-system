<?php 
error_reporting(0);

if(!isset($_SESSION)){
    session_start();
  }
include_once('connections/conn.php');
 $con = con();
 date_default_timezone_set("Asia/Manila"); // set timezone
 $date = date("Y-m-d", strtotime("now")); // get current date
$time = date("h:i A", strtotime("+0 HOURS"));

$sql= " SELECT account.student_id, account.name, attendance.std_id,attendance.morning_in, 
attendance.morning_out, attendance.afternoon_in, attendance.afternoon_out ,attendance.date FROM account INNER JOIN attendance ON 
account.student_id = attendance.std_id WHERE attendance.date= '$date' order by morning_in desc " ;
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();
$total= $students->num_rows;?>
<!DOCTYPE html>
<!-- code by Adrian Joseph Lauresta -BSIT4 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/attendance.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>

    <div class="top">
        <label class="menu" onclick="toggleSidebar()"><i class="fa fa-bars" aria-hidden="true"
                id="menu-icon"></i></label>

        <div class="welcome">
         
            <img src="pmftci.jpg" alt="">
        </div>

    </div>
    <div class="sidebar">
        <?php if(isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")){ ?>
        <nav>
            <ul>
                <br><br>
                <li class="active"><a href="admin/home.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-home"></i><br>
                        Dashboard</a></li><br>
                <div class="line"></div>
                <li><a href="admin/manage-admin.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-user"></i><br>&nbsp; &nbsp;
                        User</a></li><br>
                <div class="line"></div>
                <li><a href="admin/manage-students.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-user"></i><br>Students</a>
                </li>
                <div class="line"></div>
                <li><a href="attend.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-book"></i><br>Attendance</a> </li>
                <div class="line"></div>
            </ul>
        </nav>
    

        <div class="logout">
    
                <a href="admin/logout.php">&nbsp; &nbsp; &nbsp;<i class="fa fa-sign-out"></i><br>&nbsp;Logout</a>
            </div>
        </div>
    </div>

    <div class="header">
        <h1>Dashboard/Attendance</h3>
            <hr>

    </div>

    <div class="main-container">

        <div class="container1">
            <h1 style="font-family: georgia,serif;">ATTENDANCE</h1>
            <hr>


            <div class="morning d-flex flex-wrap flex-column align-items-center">
                <a class="btn btn-success m-1" href="attendance/morning_TIN.php" role="button"> &nbsp; Morning
                    TimeIn</a>
                <a class="btn btn-success m-1" href="attendance/morning_TOT.php" role="button">&nbsp; Morning
                    TimeOut</a>
            </div>

            <br>
            <div class="afternoon d-flex flex-wrap flex-column align-items-center">
                <a class="btn btn-primary m-1" href="attendance/afternoon_TIN.php" role="button">Afternoon
                    TimeIn</a>
                <a class="btn btn-primary m-1" href="attendance/afternoon_TOT.php" role="button">Afternoon
                    TimeOut</a>
            </div>
        </div>
        <!-- <div class="container2"> -->
        <section class="table1">
            <h3 style="color:red;text-align:left;">Students present today:</h3>
            <table class="table table-bordered ">
                <thead style="background-color:yellowgreen;">
                    <tr>
                        <th>Name</th>
                        <th>Student ID.No.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php do{ ?>
                        <td style="text-align:left;"><?php echo $row['name']?></td>
                        <td style="text-align:left;"><?php echo $row['std_id']?></td>
                    </tr>
                </tbody>
                <?php }while($row = $students->fetch_assoc()); ?>
            </table>
        </section>
        <!-- </div> -->

    </div>
    <!--End of main-contasiner------>
    <?php }else{
  header("Location: admin/login.php?Login First");} ?>
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