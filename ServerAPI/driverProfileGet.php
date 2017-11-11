<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $type = $formData->type;
    
    $query = "select d.license_number license_number, n.national_card_first_name FirstName, n.national_card_last_name Surname, 
                concat(n.national_card_first_name,' ',national_card_last_name) FullName,
                national_card_nic NIC, concat(n.national_card_city,', ',n.national_card_state) Address, n.national_card_blood_group, d.driver_remain_points,
                d.driver_id, n.national_card_user_img, d.driver_active from driver_details d
                inner join national_card_details n on d.driver_nic_id = n.national_card_id
                where d.driver_id = 123";

    if($type == 2){ //fine history
        $query = "select date(fine_deadline) FineDate, time(fine_deadline) FineTime, fd.fine_id,
                    GROUP_CONCAT(rd.rule_violation_reason SEPARATOR '/') as RuleLIst from fine_details fd 
                    inner join fine_violation_details fvd on fd.fine_id = fvd.fine_violation_fine_id
                    and fine_driver_id = 123
                    inner join rule_violation_details rd on rd.rule_violation_id = fvd.fine_violation_violation_id
                    group by date(fine_deadline), time(fine_deadline), fd.fine_id
                    order by fine_deadline desc limit 5;";
    }
    else if($type == 3){ //fine notification
        $query = "select 
                    IF (rvd.rule_violation_court_penalty_or_both = 1, 
                    'Court Case', 
                    IF(rvd.rule_violation_court_penalty_or_both = 2,
                    'Due Amount', 'Due amount and Court Case')
                    ) as Title,
                    IF (rvd.rule_violation_court_penalty_or_both = 1, 
                    concat('Court Case against you fall on ', date(fvd.fine_violation_appointment_date_court)), 
                    IF(rvd.rule_violation_court_penalty_or_both = 2,
                    concat('You have a due amount of ', rvd.rule_violation_fine_charge, ' to pay on or before ', date(fd.fine_deadline)), 
                    concat('You have a due amount of',rvd.rule_violation_fine_charge, ' to pay on or before ', date(fd.fine_deadline),' and Court Case is falled on '
                    , date(fvd.fine_violation_appointment_date_court)))
                    ) as 'Desc'
                    from fine_violation_details fvd 
                    inner join rule_violation_details rvd on fvd.fine_violation_violation_id = rvd.rule_violation_id
                    and fvd.fine_violation_task_completed = 0
                    inner join fine_details fd on fd.fine_id = fvd.fine_violation_fine_id
                    order by fvd.fine_violation_entered_date_and_time limit 5;";
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