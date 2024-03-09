<?php 
include_once('../connections/conn.php');
$con= con();
$id = $_GET['studentID']; 

$sql = "SELECT * FROM account where student_id = '$id'  ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

$sql6 = "SELECT std_id, date, TIMEDIFF(morning_out, morning_in) as time from attendance where std_id = '$id' ";
$students6 = $con->query($sql6) or die($con->error);
$row6 = $students6->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>name</th>
            <th>date</th>
            <th>morning diff</th>

        </tr>
        <?php do{ ?>
        <tr>
            
            <td><?php echo $row6['std_id']; ?></td>
            <td><?php echo $row6['date']; ?></td>
            <td><?php echo $row6['time']; ?></td>
            <?php }while($row6 = $students6->fetch_assoc()); 
            array_sum($row6 = $students6->fetch_assoc())?>

        </tr>
    </table>
</body>
</html>