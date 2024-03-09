<?php
error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}

include_once('../connections/conn.php');

$con = con();

$sql = "SELECT * FROM user ORDER By id ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();


$id = $_GET['ID']; 
if(isset($_POST['submit'])){

    $name = $_POST['username'];
    $password = $_POST['password'];
    $access = $_POST['access'];

   $sql = "UPDATE `user` SET  `username` ='$name',`password` ='$password',`access`= '$access' WHERE id= '$id' ";

   $con->query($sql) or die($con->error);

   echo header("Location: manage-admin.php?id=".$id);

} ?>
<!DOCTYPE html>
<!-- code by Adrian Joseph Lauresta -BSIT4 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/manage-admin.css">
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
        <h1>Manage Admin/User</h3>
            <hr>

    </div>
    <br>

    <?php // this is for add.php
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

                    $_SESSION['MSG']="<h4 class='alert alert-success'> Admin Added!</h4>";
                    Header( "Location: manage-admin.php");
                    exit;
 
                }else{
                    
                $_SESSION['MSG2']="<h4 class='alert alert-warning'>Student ID Already Exist!</h4>";
                Header( "Location: manage-admin.php");
                exit;
                
                }
            }  // of isset

            }
            add_user();
                if(isset($_SESSION['MSG'])){
                    echo $_SESSION['MSG'];
                    unset($_SESSION['MSG']); 

                    }
                    if(isset($_SESSION['MSG2'])){
                        echo $_SESSION['MSG2'];
                        unset($_SESSION['MSG2']); 
                    
                        }
                        if (isset($_SESSION["myMessage"])){
                            echo $_SESSION['myMessage'];
                        unset($_SESSION["myMessage"]);
                        }
    ?>
  

    <!-- Modal for add---------------------------------------------------------------------------------------->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Admin</h4>
                </div>
                <div class="modal-body">

                    <form action=" " method="POST">
                        <div class="form-group">
                            <label for="email">Username:</label>
                            <input type="text" class="form-control" id="email" name="name" autofocus autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password :</label>
                            <input type="password" class="form-control" id="pwd" name="password" autocomplete="off"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Access :</label>
                            <input type="select" class="form-control" id="pwd" name="access" required>
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
    <main class="main-container1">
  
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success"> Add
        admin</button>
            <h3>The list of registered Users:</h3>
            <section class="table1">
            <table class="table table-bordered">
                <thead style="background-color:yellowgreen;">
                    <tr>
                        <th>Name</th>
                        <th>password</th>
                        <th>Access</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php do{ ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td>******</td>
                        <td><?php echo $row['access'];?></td>
                        <td>
                            <button style="width:50px" class="btn btn-success"
                                onclick="document.location='update-admin.php?ID=<?php echo $row['id']; ?>'">Edit</button>
                        </td>
                        <td>
                            <form action="../process/delete-admin.php" method="POST">
                                <input type="hidden" name="ID" value=<?php echo $row['id']; ?>><button type="submit"
                                    name="delete" class="btn btn-danger btn-sm remove"
                                    onclick="return checkDelete()">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php }while($row = $students->fetch_assoc()) ?>
                </tbody>
            </table>
        </div>
    </section>
        </main>
        <!-- Modal for edit-->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Attendance</h4>
                    </div>
                    <div class="modal-body">

                        <form action=" " method="POST">
                            <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="text" class="form-control" id="email" name="username"
                                    value="<?php echo $row['username']; ?>" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password :</label>
                                <input type="password" class="form-control" id="pwd" name="password"
                                    value="<?php echo $row['password']; ?>" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password :</label>
                                <input type="text" class="form-control" id="pwd" name="access"
                                    value="<?php echo $row['access']; ?>">
                            </div>
                            <button type="submit" class="btn btn-default" name="submit">Submit</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


    <!--End of main-contasiner------>
    <?php }else{
  header("Location: login.php?Login First");
} ?>

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