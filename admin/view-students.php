<?php
error_reporting(0);
if (!isset($_SESSION)) {
    session_start();
}
include_once('../connections/conn.php');
$con = con();
$id = $_GET['studentID'];

$sql = "SELECT * FROM account where student_id = '$id'  ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();


$sql2 = " SELECT id,std_id,DATE_FORMAT(date, '%Y , %M %d ') as date,
TIME_FORMAT(morning_in, '%h:%i %p') as morning_in,
TIME_FORMAT(morning_out, '%h:%i %p') as morning_out,
TIME_FORMAT(afternoon_in, '%h:%i %p') as  afternoon_in,
TIME_FORMAT(afternoon_out, '%h:%i %p') as  afternoon_out 
FROM attendance WHERE  std_id = '$id' ORDER BY STR_TO_DATE(date, '%Y-%m-%d') DESC ";
$students2 = $con->query($sql2) or die($con->error);
$row2 = $students2->fetch_assoc();


$sql5 = "SELECT COUNT(date) as date_num
FROM attendance Where std_id = '$id' ";
$students5 = $con->query($sql5) or die($con->error);
$row5 = $students5->fetch_assoc();

$sql6 = "SELECT SUM(TIMEDIFF(morning_out,morning_in) + TIMEDIFF(afternoon_out,afternoon_in)) as diff FROM `attendance` WHERE   std_id  = $id ";
$students6 = $con->query($sql6) or die($con->error);
$row6 = $students6->fetch_assoc();



?>
<!DOCTYPE html>
<!-- code by Adrian Joseph Lauresta -BSIT4 -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/view-students.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <?php if (isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")) { ?>
        <div class="top">
            <label class="menu" onclick="toggleSidebar()"><i class="fa fa-bars" aria-hidden="true" id="menu-icon"></i></label>

            <div class="welcome">
                <p> Admin</p>
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
            <h1>Student Details</h3>
                <hr>

        </div>

        <main class="main-container1">
            <h5><a href="manage-students.php"><span class="glyphicon glyphicon-arrow-left btn btn-primary" aria-hidden="true"></span> Go Back</a> </h5>
            <section class="table1">
                <hr>
                </form>
                <table>
                    <thead style="background-color:yellowgreen;">
                        <tr>
                            <th>Name</th>
                            <th>Student Id.no</th>
                            <th>Overall Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo round($row6['diff'] / 10000) . " " . "hours"; ?></td>
                            <td><button class="btn btn-success" onclick="document.location='update-student.php?studentID=<?php echo $row['student_id']; ?>'">Edit</button>
                                <form action="../process/delete-student.php" method="POST" style="float:left;margin-right:5%;">
                                    <input type="hidden" name="ID" value=<?php echo $row['student_id']; ?>>
                                    <button type="submit" name="delete" class="btn btn-danger" onclick="return checkDelete()">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
        <main class="main-container2">
            <button class="btn btn-success" onclick="document.location='add-attendance.php?studentID=<?php echo $row['student_id']; ?>'">Add
                Attendance</button>

            <button class="btn btn-success" onclick="printPage('print_attendance/print.php?studentID=<?php echo $row['student_id']; ?>')">Print Attendance</button>

            <p><span class="p-3 mb-2 bg-warning ">Notice: To edit the blank time just click the
                    <strong>No data
                    </strong> button</span></p>

            <label for="">Number of records : <?php echo $row5['date_num']; ?></label>

            <section class="table2">
                <table class="table table-bordered">
                    <thead style="background-color:yellowgreen;">
                        <tr>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Morning <br>Time In</th>
                            <th>Morning <br>Time Out</th>
                            <th>Afternoon <br> Time In</th>
                            <th>Afternoon <br> Time Out</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <?php
                    do {

                        $morning_in = strtotime($row2['morning_in']);
                        $morning_out = strtotime($row2['morning_out']);

                        //calculations

                        $totaltime1 = $morning_out - $morning_in;

                        $hours = floor($totaltime1 / 3600);
                        $minutes = floor(($totaltime1 % 3600) / 60);
                        $morning_in_total_second = (($hours * 60) * 60) + ($minutes * 60);

                        //this for afternoon

                        $afternoon_in = strtotime($row2['afternoon_in']);
                        $afternoon_out = strtotime($row2['afternoon_out']);

                        //calculations

                        $totaltime2 = $afternoon_out - $afternoon_in;

                        $hours2 = floor($totaltime2 / 3600);
                        $minutes2 = floor(($totaltime2 % 3600) / 60);

                        $afternoon_total_second = (($hours2 * 60) * 60) + ($minutes2 * 60);


                        ///total-----------------------------------
                        $totalhour = $hours + $hours2;
                        $totalminutes = $minutes + $minutes2;

                        $sum = (($totalhour * 60) * 60) + ($totalminutes * 60);
                        $sum2 = ($row6['diff'] / 1000 * .10);
                        $sql3 = "UPDATE `attendance` SET  `total`= '$sum2' WHERE  (morning_out IS NOT NULL and afternoon_out IS NOT NULL) and  std_id= '$id'  ";

                    ?>
                        <!-- Check if the table is empty -->
                        <?php if ($row2 == 0) { ?>
                            <tr>
                                <td><em style="font-weight: 300;">Null</em></td>
                                <td><em style="font-weight: 300;">Null</em></td>
                                <td><em style="font-weight: 300;">Null</em></td>
                                <td><em style="font-weight: 300;">Null</em></td>
                                <td><em style="font-weight: 300;">Null</em></td>
                                <td><em style="font-weight: 300;">Null</em></td>
                                <td><em style="font-weight: 300;">Null</em></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <!-- this is for action displaying condition -->
                                <?php if ($row2['date'] == NULL) { ?>
                                    <td></td>
                                <?php } else { ?>
                                    <td>
                                        <form action="../process/delete-today_attendance.php?studentID=<?php echo $row['student_id'] ?>" method="POST" style="float:left;margin-left:15%;">
                                            <input type="hidden" name="ID" value=<?php echo $row2['id']; ?>>
                                            <button type="submit" name="delete" class="btn btn-danger" style="font-size:small" onclick="return checkDelete()">Delete</button>
                                        </form>
                                    </td>
                                <?php } ?>

                                <!-- this is for date displaying condition -->
                                <?php if ($row2['date'] == NULL) { ?>
                                    <td></td>
                                <?php } else { ?>
                                    <td><?php echo $row2['date']; ?></td>
                                <?php } ?>

                                <!-- this is for morning_in displaying condition -->
                                <?php if ($row2['morning_in'] == "12:00 AM" ||  $row2['morning_in'] == NULL) { ?>
                                    <td>
                                        <a href="update-attendance/morning_in.php?studentID=<?php echo $row2['id']; ?>" class="btn btn-primary">No data</a>
                                    </td>
                                <?php } else { ?>

                                    <td><span ondblclick=" window.location.href = 'update-attendance/morning_in.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['morning_in']; ?></span>
                                    </td>

                                <?php } ?>

                                <!-- this is for morning_out displaying condition -->
                                <?php if ($row2['morning_out'] == "12:00 AM" || $row2['morning_out'] == NULL) { ?>
                                    <td>
                                        <a href="update-attendance/morning_out.php?studentID=<?php echo $row2['id']; ?>" class="btn btn-primary">No data</a>
                                    </td>

                                <?php } else { ?>
                                    <td><span ondblclick=" window.location.href = 'update-attendance/morning_out.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['morning_out']; ?></span>
                                    </td>
                                <?php } ?>


                                <!-- this is for afternoon_in displaying condition -->
                                <?php if ($row2['afternoon_in'] == "12:00 AM" || $row2['afternoon_in'] == NULL) { ?>
                                    <td>
                                        <a href="update-attendance/afternoon_in.php?studentID=<?php echo $row2['id']; ?>" class="btn btn-primary">No data</a>
                                    </td>
                                <?php } else { ?>
                                    <td><span ondblclick=" window.location.href = 'update-attendance/afternoon_in.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['afternoon_in']; ?></span>
                                    </td>
                                <?php } ?>

                                <!-- this is for morning_in displaying condition -->
                                <?php if ($row2['afternoon_out'] == "12:00 AM" || $row2['afternoon_out'] == NULL || $row2['afternoon_out'] == $row2['afternoon_in']) { ?>
                                    <td>
                                        <a href="update-attendance/afternoon_out.php?studentID=<?php echo $row2['id']; ?>" class="btn btn-primary">No data</a>
                                    </td>
                                <?php } else { ?>
                                    <td><span ondblclick=" window.location.href = 'update-attendance/afternoon_out.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['afternoon_out']; ?></span>
                                    </td>
                                <?php } ?>

                                <!-- this is for total hours displaying condition -->
                                <?php if (($row2['morning_out'] == 0  && $row2['morning_out'] == 0) && ($row2['afternoon_in'] == 0  && $row2['afternoon_out'] == 0)) { ?>
                                    <td></td>
                                <?php } elseif (($row2['morning_out'] > 0 && $row2['morning_out'] > 0) && ($row2['afternoon_in'] == NULL || $row2['afternoon_out'] == NULL)) { ?>
                                    <td><?php printf(" %dh %dm", $hours, $minutes); ?></td>
                                <?php } elseif (($row2['morning_out'] == NULL && $row2['morning_out'] == NULL) && ($row2['afternoon_in'] > 0 && $row2['afternoon_out'] > 0)) { ?>
                                    <td><?php printf(" %dh %dm", $hours2, $minutes2); ?></td>
                                <?php } else { ?>
                                    <td><?php printf(" %dh %dm", $totalhour, $totalminutes); ?></td>
                                <?php } ?>
                            </tr>

                        <?php } ?>
                        <!--end tag of php checking if the table is empty--->

                    <?php } while ($row2 = $students2->fetch_assoc()); ?>
                </table>

            </section>
        </main>
        <!--End of main-contasiner------>
    <?php } else {
        header("Location: login.php?Login First");
    } ?>

    <iframe id="print-frame" style="display:none;"></iframe>
    <button onclick="printPage()">Print Page</button>
</body>

<script>
    function printPage(url) {
        var printFrame = document.getElementById('print-frame');
        if (!printFrame) {
            printFrame = document.createElement('iframe');
            printFrame.id = 'print-frame';
            printFrame.style.display = 'none';
            document.body.appendChild(printFrame);
        }
        
        printFrame.src = url;
        printFrame.onload = function() {
            printFrame.contentWindow.print();
        };
    }
</script>
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

    // to print the page 

    function print_this(url) {

        var printWindow = window.open(url);
        printWindow.addEventListener('load', function() {
            // Call the print function after a short delay to ensure the page has loaded completely
            printWindow.print();
            // setTimeout(function() {
            // }, 1000); // Delay of 1 second (1000 milliseconds)
        });
    }
</script>
</body>

</html>