<?php
error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}
include_once('../connections/conn.php');
$con= con();
$id = $_GET['ID']; 

$sql = "SELECT * FROM user where id = '$id' ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){

    $name = $_POST['username'];
    $password = $_POST['password'];
    $access = $_POST['access'];

   $sql = "UPDATE `user` SET  `username` ='$name',`password` ='$password',`access`= '$access' WHERE id= '$id' ";

   $con->query($sql) or die($con->error);

   echo header("Location: manage-admin.php?id=".$id);

   
}
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
            <li><a href="../attend.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-book"></i><br>Attendance</a> </li>
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
        <h5><a href="manage-admin.php"><span class="glyphicon glyphicon-arrow-left btn btn-primary" aria-hidden="true"></span>
                        Go Back</a> </h5>
          
                    <h2 style=" text-align: center;">Manage Students</h2>
                    <!-- delete student --> <br>
                    <form action="../process/delete-admin.php" method="POST">
                        <input type="hidden" name="ID" value=<?php echo $row['id']; ?>>
                        <button type="submit" name="delete" class="btn btn-danger" onclick="return checkDelete()">Delete</button>
                    </form>
                    <hr>


                    <!-- update form -->
                    <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control form-control-lg" id="email" name="username"
           value="<?php echo $row['username']; ?>" autofocus>
</div>
<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control form-control-lg" id="pwd" name="password"
           value="<?php echo $row['password']; ?>" autofocus>
</div>
<div class="form-group">
    <label for="access">Access:</label>
    <input type="text" class="form-control form-control-lg" id="access" name="access"
           value="<?php echo $row['access']; ?>">
</div>
<button type="submit" class="btn btn-success btn-lg">Submit</button>

        </div>

    </div>
    <!--End of main-contasiner------>
    <?php }else{
  header("Location: login.php?Login First");
} ?>
</body>
<script language="JavaScript" type="text/javascript">
function checkDelete() {
    return confirm('Are you sure?');
}

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