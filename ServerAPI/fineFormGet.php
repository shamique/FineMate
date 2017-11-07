<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $TypeId = $formData->typeId;
    $OptionalParam = null;

    if($TypeId > 7){
        $OptionalParam = $formData->OptionalParam;
    }

    $query = "select rule_violation_id PenaltyTypeId, rule_violation_reason PenaltyName from rule_violation_details;";
    switch($TypeId){
        case 2:
            $query = "select driver_id, concat(national_card_first_name, ' ',national_card_last_name) 'driver_name' 
                    from driver_details d inner join national_card_details c on d.driver_nic_id = c.national_card_id;";
            break;
        case 3:
            $query="select p.police_officer_id as PoliceOfficerId, concat(national_card_first_name, ' ',national_card_last_name) 'OfficerName' from police_officer_details p
                    inner join national_card_details nic on p.police_officer_national_card_id = nic.national_card_id;";
            break;
        case 4:
            $query = "select vehicle_id as VechicleId, vehicle_registration_number as VehicleNumber from vehicle_details;";
            break;
        case 5:
            $query ="select lpad((max(fine_id)+1), 6, 0) as FineNumber from fine_details;";
            break;
        case 6:
            $query ="select checkpoint_id CheckpointId, checkpoint_name CheckpointName from checkpoint_locations;";
            break;
        case 7:
            $query ="select postal_department_id PostDeptId, postal_department_name PostDeptName from postal_department;";
            break;
        case 8:
            $query ="select driver_id, concat(national_card_first_name, ' ',national_card_last_name) 'FullName',
            national_card_first_name 'FirstName', national_card_last_name 'Surname', national_card_nic 'NIC',
            national_card_dob 'DOB'
            from driver_details d inner join national_card_details c on d.driver_nic_id = c.national_card_id and d.license_number = '$OptionalParam';";
            break;
        case 9:
            $query ="select rule_violation_fine_charge, rule_violation_number_of_points, rule_violation_reason, rule_violation_id, rule_violation_court_penalty_or_both 
                    from rule_violation_details where rule_violation_id = $OptionalParam;";
            break;            
        default:
            break;
    }

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_array($result)){
			$ress[] = $rows;
        }    
    }
    else{
        $ress[] = null;
    }

    print json_encode(utf8ize($ress), JSON_UNESCAPED_SLASHES);
    die;

    function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else if (is_string ($d)) {
            return utf8_encode($d);
        }
        return $d;
    }
?>