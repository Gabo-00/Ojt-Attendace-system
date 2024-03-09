<?php 
error_reporting(0);
if(!isset($_SESSION)){
    session_start();
  }
include_once('../connections/conn.php');
 $con = con();
//querry for table
date_default_timezone_set("Asia/Manila"); // set timezone
$date = date("Y-m-d", strtotime("now")); // get current date
$time_now = date("h:i A", strtotime("+0 HOURS"));
$current_time = date('H:i:s'); //24 hour format
$default = "17:00:00";
$default2 = "00:00:00";
$sql= " SELECT account.student_id, account.name, attendance.std_id, TIME_FORMAT(afternoon_in, '%h:%i %p') as afternoon_in, 
TIME_FORMAT(afternoon_out, '%h:%i %p') as afternoon_out, attendance.date FROM account INNER JOIN attendance ON 
account.student_id = attendance.std_id WHERE  attendance.date= '$date' order by morning_in desc " ;
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();
$total= $students->num_rows;

$time_8_15am = '13:15:00';



if ($current_time <= $time_8_15am){
    $time= '13:00:00';
}else{
    $time = $current_time;
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Attendance with Time In and Time Out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
            width: 400px;
            margin-bottom: 20px;
        }

        .form label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .form button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #3e8e41;
        }

        .table {
            border-collapse: collapse;
            width: 80%;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #4CAF50;
            color: #fff;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .row{
        margin-left: 10%;
        margin-top: 5%;
        }
    </style>
</head>

<body>


    <div class="container">


        <div class="title">Afternoon TimeIn</div>
        <div class="form">
            <label for="studentID">Student ID:</label>
            <?php 

                session_start();
                if (isset($_SESSION['notification'])) {
                    echo $_SESSION['notification'];
                    unset($_SESSION['notification']); // unset the session variable to clear the notification
                }
            // Check if the form has been submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $scan = $_POST['scan'];

                    $duplicate=$con->query("SELECT * FROM attendance WHERE  std_id= '$scan' and date ='$date' ") or die($con->error);
                    $row2 = $duplicate->fetch_array();

                    $sql3 =$con->query("SELECT * from account where student_id = $scan") or die($con->error);
                    $row3 = $sql3->fetch_array();
                    
                    if($row3==0){
                        $_POST['notification'] =  "<p class='alert alert-success'  id='message'>Invalid ID.</p>";
						$_SESSION['notification'] = $_POST['notification'];
						header("Location: afternoon_TIN.php");
                    }
                    elseif($row2 == 0){
                            
                        $sql = "INSERT INTO `attendance`(`std_id`, `morning_in`,`morning_out`,`afternoon_in`,`afternoon_out` ,`date`) VALUES ('$scan', '$default2','$default2','$time','$time', '$date')  ";
                        $con->query($sql) or die($con->error);
                        $_POST['notification'] =  "<p class='alert alert-success' id='message'>Attendance Added Successfully.</p>";
						$_SESSION['notification'] = $_POST['notification'];
                        header("Location: afternoon_TIN.php");
                    }
                    elseif($row2['afternoon_in'] == "00:00:00"){
                        $sql = "UPDATE `attendance` SET `afternoon_in`= '$time',`afternoon_out`= '$time' WHERE std_id = '$scan' and date = '$date'";
                        $con->query($sql) or die($con->error);
                        
                        $_POST['notification'] =  "<p class='alert alert-success' id='message'> Update Successfully.</p>";
						$_SESSION['notification'] = $_POST['notification'];
                        header("Location: afternoon_TIN.php");
                    }
                    else{

                        $_POST['notification'] =  "<p class='alert alert-success' id='message'>Already Added .</p>";
						$_SESSION['notification'] = $_POST['notification'];
                        header("Location: afternoon_TIN.php");
                    }
                
                } ?>
            <form action="" method="post">
            <?php if($current_time >= '12:30:00' ){?>
            <input type="number" id="scan" name="scan" placeholder="Scan your ID..." autofocus required>
            <input type="hidden" name="notification" value="Your notification message here.">
            </form>
            <?php }else{
					echo "<p class='alert alert-danger' >The attendance is disabled!</p>";
				} ?>
           
        </div>
        <table class="table">
        <?php if(isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")){ ?> 
            <h5><a href="../attend.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            <?php }else{ ?>
                <h5><a href="../attendance.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                 <?php } ?>
                        Go Back</a> </h5>
            <?php 
                   echo "Today is : ".date("F-d-y", strtotime("now")) ?> <br><br>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>TimeIn</th>
                    <!-- <th><a href="afternoon_TOT.php">Time Out</a></th> -->

                </tr>
                <?php do{ ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <?php if($row['afternoon_in'] == '12:00 AM'){ ?>
                    <td></td>
                    <?php }elseif($row['afternoon_in'] == "01:00 PM"){?>
                    <td><span class="btn btn-primary">Ontime</span></td>
                        <?php }else{?>
                    <td><span class="btn btn-danger">Late</span></td>
                    <?php } ?>

                </tr>
                <?php }while($row = $students->fetch_assoc()); ?>
            </thead>
            <tbody id="attendanceTable">
            </tbody>
        </table>
    </div>

    <script>
    var message = document.getElementById("message");

    // Set a timeout to remove the message after 5 seconds
    setTimeout(function() {
    message.parentNode.removeChild(message);
    }, 5000);
</script>
</body>

</html>
