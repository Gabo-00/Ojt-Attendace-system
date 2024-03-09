<?php 
error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}
include_once('../connections/conn.php');
$conn= con();

$sql = "SELECT  student_id, name, DATE_FORMAT(time_added, '%M %d, %Y') as time_added FROM account  ORDER By name ";
$students = $conn->query($sql) or die($con->error);
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
    <link rel="stylesheet" href="../css/manage-students.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

 
</head>

<body>
    <?php if(isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")){ ?>
    <div class="top">
        <label class="menu" onclick="toggleSidebar()"><i class="fa fa-bars" aria-hidden="true"
                id="menu-icon"></i></label>

        <div class="welcome">
     
            <img src="../pmftci.jpg" alt="">
        </div>

    </div>
    <div class="sidebar">
        <nav>
            <ul>
                <br><br>
                <li class="active"><a href="home.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-home"></i><br> Dashboard</a>
                </li><br>
                <div class="line"></div>
                <li><a href="manage-admin.php">&nbsp; &nbsp; &nbsp; <i class="fa fa-user"></i><br>&nbsp; &nbsp; User</a>
                </li><br>
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
    <?php function add(){
              $conn = con();
              if(isset($_POST['add'])){
                  $name = $_POST['name'];
                  $studentId = $_POST['studentId'];
                  $start = $_POST['date'];

                  $duplicate=mysqli_query($conn,"SELECT * from account where student_id ='$studentId' ");

                  if (mysqli_num_rows($duplicate)==0){
                      $sql = "INSERT INTO `account`(  `student_id`,`name`,`time_added`) VALUES ('$studentId','$name','$start')";
                    $conn->query($sql) or die($conn->error);

                    $sql2 = "INSERT INTO `attendance`(  `std_id`) VALUES ('$studentId')";
                    $conn->query($sql2) or die($conn->error);
                      // header("Location: ../admin/add-student.php?message=Successfully added ");
                      echo header("Location: manage-students.php");

                      echo "<p class='alert alert-success' >Student Added !</p>";

                  }else{
                      
                  echo "<p class='alert alert-danger'>Student ID Already Exist!</p>";
                  }
                  }
              }
              add(); ?>
    <div class="container">


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Student</h4>
                    </div>
                    <div class="modal-body">

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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-----END OF MODAL----------------------------------------------------------------------------------------------------------------->

    <main class="main-container1">
     
            <button type="button" onclick="document.location='add-student.php'" class="btn btn-success"> Add
                Student</button>
            <p>The list of registered Users:</p>
            <section class="table1">
            <table class="table table-bordered">
                <thead style="background-color:yellowgreen;">
                    <tr>
                        <th>Student Id.no</th>
                        <th>Name</th>
                        <th>OJT Started </th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do{ ?>
                    <tr>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['time_added']; ?></td>
                        <td><a class="btn btn-success"
                                href="view-students.php?studentID=<?php echo $row['student_id']; ?>">View</a>
                        </td>
                    </tr>
                    <?php }while($row = $students->fetch_assoc()) ?>
                </tbody>
            </table>
        </div>
            </section>
                    </main>
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