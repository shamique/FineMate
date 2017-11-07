<?php

    include_once("dbconnection.php");
    
    $driverId = $_POST["driverId"];
    $vehicleOwnerID = $_POST['vehicleOwnerId'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $totalCharge = $_POST['totalCharge'];
    $totalPoints = $_POST['totalPoints'];
    $date = strtotime("+14 days", strtotime($date));
    $deadline = addDayswithdate(date('Y-m-d H:i:s'), 14);
    $fineAmount = $_POST["fineAmount"];

    $query1 = "insert into fine_details 
            (fine_driver_id, 
            fine_vehicle_owner_id, 
            fine_location_lat, 
            fine_location_lng, 
            fine_deadline,
            fine_total_charge,
            fine_entered_date_and_time,
            ) 
            VALUES ($driverId, $vehicleOwnerID, 
            '$latitude', '$longitude', '$deadline', 
            '$fineAmount', '".date('Y-m-d H:i:s')."')";
  

    mysqli_query($connection, $query1);
    $recordID = mysqli_insert_id($connection);
  
    $query2 = "select driver_remain_points from driver_details where driver_id = $licenseID";
    $remainPointResult = mysqli_query($connection, $query2);
    $rPoint;
    while($r = mysqli_fetch_array($remainPointResult)){
	   $rPoint = $r[driver_remain_points];
    }
  
  $query3 = "update driver_details set driver_remain_points = ($rPoint - $totalPoints) WHERE driver_id = $licenseID";
  mysqli_query($connection, $query3);

    for ($i = 0; $i < $length; $i++) {
        $query = "insert into fine_violation_details 
        (fine_violation_fine_id,
        fine_violation_violation_id,
        fine_violation_action, 
        fine_violation_appointment_date_court)
        VALUES         
        ($recordID,
        $violationIDListAsArray[$i],
        $actionListAsArray[$i], 
        '$d')";
        mysqli_query($connection, $query);
    }


    function addDayswithdate($date,$days){
        $date = strtotime("+".$days." days", strtotime($date));
        return  date("Y-m-d H:i:s", $date);
    }

?>