<?php
 header("Access-Control-Allow-Origin: *");
 header('Control-type: application/json',true);
 require 'connect_DB.php' ;

    $sql  = "SELECT
    *,COUNT(LeaveDateStart)FROM
    `leave`JOIN `employee` ON `leave`.`Emp_ID`= `employee`.`Emp_ID`WHERE 1";
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
