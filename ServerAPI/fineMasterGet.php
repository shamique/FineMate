<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $FineId = $formData->fineId;

    $query = "select fvd.fine_violation_id FineId, fine_reference_number FineNumber, concat(n.national_card_first_name,' ',national_card_last_name) as Victim, 
                IF(f.fine_active =1, 'ACTIVE', 'INACTIVE') 'Status', v.vehicle_registration_number VehicleNumber from fine_details f
                inner join driver_details d on f.fine_driver_id = driver_id
                inner join national_card_details n on n.national_card_id = d.driver_nic_id
                inner join vehicle_owner_details vo on vo.vehicle_owner_id = f.fine_vehicle_owner_id
                inner join vehicle_details v on v.vehicle_id = vo.vehicle_owner_vehicle_id
                inner join fine_violation_details fvd on fvd.fine_violation_fine_id = f.fine_id
                inner join rule_violation_details rd on rd.rule_violation_id = fvd.fine_violation_violation_id";

    if($FineId != null){
        $query = "select f.fine_reference_number fineNumber, concat(n.national_card_first_name,' ',national_card_last_name) driverName,
                d.license_number licenseNumber, v.vehicle_registration_number vehicleNumber, rd.rule_violation_reason penalty,
                f.fine_total_charge fineAmount, fvd.fine_violation_appointment_date_court courtAppointmentDate, 
                IF(f.fine_active =1, 'ACTIVE', 'INACTIVE') 'Status', f.fine_location_lat Lattitude, f.fine_location_lng Longitude
                from fine_details f
                inner join driver_details d on f.fine_driver_id = driver_id
                inner join national_card_details n on n.national_card_id = d.driver_nic_id
                inner join vehicle_owner_details vo on vo.vehicle_owner_id = f.fine_vehicle_owner_id
                inner join vehicle_details v on v.vehicle_id = vo.vehicle_owner_vehicle_id
                inner join fine_violation_details fvd on fvd.fine_violation_fine_id = f.fine_id
                inner join rule_violation_details rd on rd.rule_violation_id = fvd.fine_violation_violation_id
                where fvd.fine_violation_id = $FineId;";
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