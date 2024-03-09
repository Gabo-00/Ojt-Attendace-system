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
$current_time = date('H:i'); //24 hour format


if($current_time <= "11:59:00"){
	$default2 = $current_time;
}else{
	$default2 = "12:00:00";
}

$sql= " SELECT account.student_id, account.name, attendance.std_id, TIME_FORMAT(morning_in, '%h:%i %p') as morning_in, 
TIME_FORMAT(morning_out, '%h:%i %p') as morning_out, attendance.date FROM account INNER JOIN attendance ON 
account.student_id = attendance.std_id WHERE  attendance.date= '$date' order by morning_in desc " ;
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();
$total= $students->num_rows;


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
    </style>
</head>

<body>
    <div class="container">

        <div class="title">Morning Time Out</div>
        <div class="form">
            <label for="studentID">Student ID:</label>
            <?php 
			session_start();
			if (isset($_SESSION['notification'])) {
				echo $_SESSION['notification'];
				unset($_SESSION['notification']); // unset the session variable to clear the notification
			}

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$scan = $_POST['scan'];
			
				$duplicate=$con->query("SELECT * FROM attendance WHERE  std_id= '$scan' and date ='$date' ") or die($con->error);
				$row2 = $duplicate->fetch_array();
		
				
				
				if($row2 == 0){
					$_POST['notification'] =  "<p class='alert alert-warning' id='message'>No user Found.</p>";
					$_SESSION['notification'] = $_POST['notification'];
					header("Location: morning_TOT.php");
				  }
				  elseif($row2['morning_out']== NULL){
					$sql = "UPDATE `attendance` SET `morning_out`= '$default2' WHERE std_id = '$scan' and date = '$date'";
					$con->query($sql) or die($con->error);

					$_POST['notification'] =  "<p class='alert alert-success' id='message'>Time added successfully.</p>";
					$_SESSION['notification'] = $_POST['notification'];
					header("Location: morning_TOT.php");
				  }else{
					$_POST['notification'] =  "<p class='alert alert-warning' id='message'>Already Login.</p>";
					$_SESSION['notification'] = $_POST['notification'];
					header("Location: morning_TOT.php");
				  
				  }
			   
			}
			?>

            <form action="" method="post">
                <?php if($current_time <= '09:00' || $current_time <= '13:00:00'){?>
                <input type="number" id="scan" name="scan" placeholder="Scan your ID..." autofocus required
                >
                <input type="hidden" name="notification" value="Your notification message here.">
                <?php }else{
					echo "<p class='alert alert-danger' >Morning TimeOut is not available now!</p>";
				} ?>
            </form>
        </div>
        <table class="table">
        
        <?php if(isset($_SESSION['Userlogin']) && ($_SESSION['Access'] == "administrator")){ ?> 
            <h5><a href="../attend.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            <?php }else{ ?>
                <h5><a href="../attendance.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                 <?php } ?>
                        Go Back</a> </h5>
            <?php 
        echo "Today is : ".date("F-d-y", strtotime("now")); // get current date); ?> <br><br>
            <thead>
                <tr>
                    <th>Name</th>
                    <!-- <th>Time In</th> -->
                    <th>Time Out</th>
                </tr>
                <?php do{ ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <!-- <td><?php //echo $row['morning_in'] ?></td> -->

                    <?php //if($row['morning_out'] == $row['morning_in'])
					if($row['morning_out'] ==NULL) {?>
                    <td></td>
                    <?php }else{ ?>
                    <td><span class="btn btn-danger">logged Out </span></td>
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