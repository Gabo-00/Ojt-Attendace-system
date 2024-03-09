<?php 

if(!isset($_SESSION)){
    session_start();
  }
  include_once('../connections/conn.php');
  $con= con();
  date_default_timezone_set("Asia/Manila"); // set timezone
  $date = date("Y-m-d", strtotime("now")); // get current date

  $sql= " SELECT account.student_id, attendance.date FROM account INNER JOIN attendance ON 
  account.student_id = attendance.std_id WHERE attendance.date= '$date'  " ;
  $students = $con->query($sql) or die($con->error);
  $row = $students->fetch_assoc();
  $total= $students->num_rows;

  $sql2 = " SELECT * FROM account ";
  $students2 = $con->query($sql2) or die($con->error);
  $row2 = $students2->fetch_assoc();
  $total2= $students2->num_rows;
?>
<!DOCTYPE html>
<!-- code by Adrian Joseph Lauresta -BSIT4 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dash.css">
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
            <li><a href="../attend.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-book"></i><br>Attendance</a> </li>
            <div class="line"></div>
        </ul>
        </nav>
        <?php if(isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")){ ?>
        <div class="logout">

            </div>
            <?php }else{
            } ?><div class="logout">
                <a href="logout.php">&nbsp; &nbsp; &nbsp;<i class="fa fa-sign-out"></i><br>&nbsp;Logout</a>
                
</div>
    </div>

    <div class="header">
        <h1>Dashboard/Attendance</h3>
            <hr>

    </div>

    <div class="main-container">

        <div class="container1">
            <h3>Number of Present today</h3>
            <div class="content1"> <h2><?php echo $total ?></h2></div>
        </div>
        <div class="container2">
            <h3>Registered students:</h3>
            <div class="content2"><h2 style="margin-top: 5%;"><?php echo $total2 - 1 ?></h2></div>
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