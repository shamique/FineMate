<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $driverId = $formData->driverId;
    $vehicleOwnerID = $formData->vehicleOwnerId;
    $date = strtotime("+14 days", strtotime(date("Y/m/d")));
    $deadline = addDayswithdate(date('Y-m-d H:i:s'), 14);
    $checkPointId = $formData->checkPointId;
    $postalDepartmentId = $formData->postalDeptId;
    $referenceNumber = $formData->referenceNumber;
    $officerId = $formData->officerId;

    $query1 = "insert into fine_details 
            (fine_driver_id, 
            fine_vehicle_owner_id, 
            fine_deadline,
            fine_entered_date_and_time,
            fine_reference_number,
            checkpoint_id,
            postal_department_id,
            fine_entered_by,
            fine_total_charge
            ) 
            VALUES ($driverId, $vehicleOwnerID, '$deadline', '".date('Y-m-d H:i:s')."', '$referenceNumber', $checkPointId, $postalDepartmentId, $officerId,0);";
    mysqli_query($connection, $query1);
    $recordID = mysqli_insert_id($connection);

    $totalFineAmt = 0;
    $totalPoints = 0;

    foreach($formData->FineDetailList as $item){
        $SubQuery = "insert into `finemate`.`fine_violation_details`
                    (`fine_violation_fine_id`,
                    `fine_violation_violation_id`,
                    `fine_violation_action`,
                    `fine_violation_appointment_date_court`,
                    `fine_violation_task_completed`,
                    `fine_violation_entered_date_and_time`,
                    `fine_violation_active`)
                    values
                    (
                        $recordID,
                        $item->FineTypId,
                        1,
                        '".(strlen($item->courtDate) == 0? date('Y-m-d H:i:s') : $item->courtDate)."',
                        0,
                        '".date('Y-m-d H:i:s')."',
                        1
                    );";
        mysqli_query($connection, $SubQuery);
      
        $totalFineAmt = $item->FineAmount;
        $totalPoints = $item->Points; 
    }
    
    $DriverSql = "update driver_details set driver_remain_points = (driver_remain_points - $totalPoints) WHERE driver_id = $driverId";
    mysqli_query($connection, $DriverSql);

    $fineSql = "update fine_details set fine_total_charge = $totalFineAmt where fine_id = $recordID;";
    mysqli_query($connection, $fineSql);

    function addDayswithdate($date,$days){
        $date = strtotime("+".$days." days", strtotime($date));
        return  date("Y-m-d H:i:s", $date);
    }

    print 'Success';
    die;
?>