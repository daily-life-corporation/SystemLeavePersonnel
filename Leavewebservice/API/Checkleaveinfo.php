<?php
 header("Access-Control-Allow-Origin: *");
 header('Control-type: application/json',true);
 require 'connect_DB.php' ;

    $sql = "SELECT *
    FROM `employee`
    JOIN `leave` ON `employee`.`Emp_ID` = `leave`.`Emp_ID`
    JOIN `leavetype` ON `leave`.`LType_ID` = `leavetype`.`LType_ID`
    JOIN `leavestatus` ON `leavestatus`.`LeaveStatus_ID` = `leave`.`LeaveStatus_ID`
    JOIN `department` ON `employee`.`Dept_ID` = `department`.`Dept_ID`
    JOIN `position` ON `employee`.`Position_ID` = `position`.`Position_ID`
    WHERE`employee`.`Emp_ID` LIKE '%{$_GET['Emp_ID']}%' 
    ";
          $result = mysqli_query($conn,$sql); 
          $myArray = array();
          if ($result->num_rows > 0) {
          // output data of each row
              while($row = $result->fetch_assoc()) {
                  $myArray[] = $row;
              }
              print json_encode($myArray);
          } 
          else 
          {
              echo "0 results";
          }