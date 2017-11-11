<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $type  = $formData->type;

    $query = "select 'activeUsers' Keyy, count(driver_id) as Valuee from driver_details where driver_active = 1
                union all
                select 'inactiveUsers' Keyy, count(driver_id) as Valuee  from driver_details where driver_active = 0
                union all
                select 'NoOfVictims' Keyy, count(distinct fine_driver_id) Valuee from fine_details where month(fine_entered_date_and_time) = month(now())
                and year(fine_entered_date_and_time) = year(now())
                union all
                select 'NoOfCourtCases' Keyy, count(distinct fine_driver_id) as Valuee 
                from fine_details fd
                inner join fine_violation_details fvd on fvd.fine_violation_fine_id = fd.fine_id
                inner join rule_violation_details rd on rd.rule_violation_id = fvd.fine_violation_violation_id
                and month(fine_entered_date_and_time) = month(now())
                and year(fine_entered_date_and_time) = year(now()) 
                and rd.rule_violation_court_penalty_or_both = 1;";
    
    if($type == 2){
        $query = "select Monthname(fine_entered_date_and_time) as Monthh, count(distinct fine_driver_id) Valuee from fine_details where 
                    year(fine_entered_date_and_time) = year(now())
                    group by Monthname(fine_entered_date_and_time)
                    order by month(fine_entered_date_and_time);";
    }
    else if($type == 3){
        $query = "select rule_violation_reason, count(distinct fine_driver_id) Valuee 
                    from fine_details fd
                    inner join fine_violation_details fvd on fd.fine_id = fvd.fine_violation_fine_id
                    inner join rule_violation_details rvd on rvd.rule_violation_id = fvd.fine_violation_violation_id
                    where 
                    year(fine_entered_date_and_time) = year(now())
                    group by rule_violation_reason
                    order by month(rule_violation_reason);";
    }
    else if($type == 4){
        $query = "select national_card_first_name, national_card_last_name, driver_remain_points from driver_details d
                    inner join national_card_details nic on d.driver_nic_id = nic.national_card_id
                    order by driver_remain_points desc;";
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