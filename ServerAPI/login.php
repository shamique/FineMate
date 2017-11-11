<?php

    include_once("dbconnection.php");

    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    $userNameParam = $formData->userName;
    $Password = md5($formData->Password);


    $query = "select user_category_id from login_details 
                where user_username = '".$userNameParam."' and user_password='".$Password."'
                user_category_id in (1,5);";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_array($result)){
            setcookie("user_cat_id", $rows->user_category_id);
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