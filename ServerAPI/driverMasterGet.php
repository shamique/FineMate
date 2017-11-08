<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $query = "select d.license_number license_number, n.national_card_first_name FirstName, n.national_card_last_name Surname, 
concat(n.national_card_first_name,' ',national_card_last_name) FullName,
national_card_nic NIC, concat(n.national_card_city,', ',n.national_card_state) Address from driver_details d
inner join national_card_details n on d.driver_nic_id = n.national_card_id;";
    
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