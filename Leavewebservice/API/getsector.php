<?php
 header("Access-Control-Allow-Origin: *");
 header('Control-type: application/json',true);
 require 'connect_DB.php' ;
 
    $sql  = 'SELECT * FROM `sector` WHERE 1 ORDER BY ABS(`sector`.`sector_ID`) ASC';
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