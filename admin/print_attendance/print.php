<?php 
// error_reporting(0);
if(!isset($_SESSION)){
  session_start();
}
include_once('../../connections/conn.php');
$con= con();
$id = $_GET['studentID']; 

$sql = "SELECT * FROM account where student_id = '$id'  ";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

  
$sql2 = " SELECT id,std_id,DATE_FORMAT(date, '%Y , %M %d ') as date,
TIME_FORMAT(morning_in, '%h:%i %p') as morning_in,
TIME_FORMAT(morning_out, '%h:%i %p') as morning_out,
TIME_FORMAT(afternoon_in, '%h:%i %p') as  afternoon_in,
TIME_FORMAT(afternoon_out, '%h:%i %p') as  afternoon_out 
FROM attendance WHERE  std_id = '$id' ORDER BY STR_TO_DATE(date, '%Y-%m-%d') "; 
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* .content{
    margin-left: 25%;
    margin-right: 25%;
}        */
table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
    border:solid 1px;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
   
}
    </style>
</head>

<body>
    <div class="content">
    Name: <?php echo $row['name'] ?><br><br>
    <table class="table table-bordered">
        <thead style="background-color:yellowgreen;">
            <tr>

                <th>Date</th>
                <th>Morning <br>Time In</th>
                <th>Morning <br>Time Out</th>
                <th>Afternoon <br> Time In</th>
                <th>Afternoon <br> Time Out</th>
                <th>Total</th>

            </tr>
        </thead>
        <?php
                                    do{
                                    
                                    $morning_in = strtotime($row2['morning_in']);
                                    $morning_out =strtotime($row2['morning_out']);
                                    
                                    //calculations
                                
                                    $totaltime1 = $morning_out - $morning_in;
                                    
                                    $hours = floor($totaltime1/3600);
                                    $minutes = floor(($totaltime1 % 3600)/60);
                                    $morning_in_total_second = (($hours * 60 )* 60) + ($minutes * 60);
                                                                   
                                    //this for afternoon
                                    
                                    $afternoon_in = strtotime($row2['afternoon_in']);
                                    $afternoon_out =strtotime($row2['afternoon_out']);
                                    
                                    //calculations
                                
                                    $totaltime2 = $afternoon_out - $afternoon_in;
                                    
                                    $hours2 = floor($totaltime2/3600);
                                    $minutes2 = floor(($totaltime2 % 3600)/60);

                                    $afternoon_total_second = (($hours2 * 60 )* 60) + ($minutes2 * 60);
                                    
                                
                                    ///total-----------------------------------
                                    $totalhour = $hours + $hours2 ;
                                    $totalminutes = $minutes + $minutes2 ;
                                    
                                        $sum =(($totalhour * 60 )*60) + ($totalminutes * 60);
                                        $sum2 = ($row6['diff']/1000*.10);
                                        $sql3 = "UPDATE `attendance` SET  `total`= '$sum2' WHERE  (morning_out IS NOT NULL and afternoon_out IS NOT NULL) and  std_id= '$id'  ";
                                
                            ?>

        <tr>

            <!-- this is for date displaying condition -->
            <?php if($row2['date'] == NULL){ ?>
            <td></td>
            <?php }else{ ?>
            <td><?php echo $row2['date']; ?></td>
            <?php } ?>

            <!-- this is for morning_in displaying condition -->
            <?php if($row2['morning_in'] == "12:00 AM" ||  $row2['morning_in'] == NULL) { ?>
            <td>
                <a href="update-attendance/morning_in.php?studentID=<?php echo $row2['id']; ?>"
                    class="btn btn-primary">No data</a>
            </td>
            <?php }else{ ?>

            <td><span
                    ondblclick=" window.location.href = 'update-attendance/morning_in.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['morning_in']; ?></span>
            </td>

            <?php } ?>

            <!-- this is for morning_out displaying condition -->
            <?php if($row2['morning_out'] == "12:00 AM" || $row2['morning_out'] == NULL) { ?>
            <td>
                <a href="update-attendance/morning_out.php?studentID=<?php echo $row2['id']; ?>"
                    class="btn btn-primary">No data</a>
            </td>

            <?php }else{ ?>
            <td><span
                    ondblclick=" window.location.href = 'update-attendance/morning_out.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['morning_out']; ?></span>
            </td>
            <?php } ?>


            <!-- this is for afternoon_in displaying condition -->
            <?php if($row2['afternoon_in'] == "12:00 AM" || $row2['afternoon_in'] == NULL) { ?>
            <td>
                <a href="update-attendance/afternoon_in.php?studentID=<?php echo $row2['id']; ?>"
                    class="btn btn-primary">No data</a>
            </td>
            <?php }else{ ?>
            <td><span
                    ondblclick=" window.location.href = 'update-attendance/afternoon_in.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['afternoon_in']; ?></span>
            </td>
            <?php } ?>

            <!-- this is for morning_in displaying condition -->
            <?php if($row2['afternoon_out'] == "12:00 AM" || $row2['afternoon_out'] == NULL || $row2['afternoon_out']== $row2['afternoon_in']  ) { ?>
            <td>
                <a href="update-attendance/afternoon_out.php?studentID=<?php echo $row2['id']; ?>"
                    class="btn btn-primary">No data</a>
            </td>
            <?php }else{ ?>
            <td><span
                    ondblclick=" window.location.href = 'update-attendance/afternoon_out.php?studentID=<?php echo $row2['id']; ?>' "><?php echo  $row2['afternoon_out']; ?></span>
            </td>
            <?php } ?>

            <!-- this is for total hours displaying condition -->
            <?php if(($row2['morning_out']== 0  && $row2['morning_out']== 0 )&& ( $row2['afternoon_in']== 0  && $row2['afternoon_out']== 0)) {?>
            <td></td>
            <?php }elseif(($row2['morning_out'] > 0 && $row2['morning_out'] > 0) && ($row2['afternoon_in'] == NULL || $row2['afternoon_out'] == NULL)){ ?>
            <td><?php printf(" %dh %dm",$hours , $minutes); ?></td>
            <?php }elseif(($row2['morning_out'] == NULL && $row2['morning_out'] == NULL) && ($row2['afternoon_in'] > 0 && $row2['afternoon_out'] > 0)){ ?>
            <td><?php printf(" %dh %dm",$hours2 , $minutes2); ?></td>
            <?php }else{ ?>
            <td><?php printf(" %dh %dm",$totalhour , $totalminutes); ?></td>
            <?php } ?>
        </tr>

        <?php }while($row2 = $students2->fetch_assoc()) ;?>
    </table>
    </div>
</body>

</html>