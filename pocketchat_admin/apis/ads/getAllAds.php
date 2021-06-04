<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Ads.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $ad = new Ads($db);
     
    $stmt = $ad->getAllAds();
    $num = $stmt->rowCount();
     
    // check if more than 0 record found
    if($num>0){
     
        $ads_arr = array();
        $ads_arr["ads"] = array();
     
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
     
            $ads_item = array(

                "id" => $id,
                "image" => "http://pcadmin.blackcrescentpartners.in/apis/uploads/files/".$image,
                "user_id" => $user_id,
                "owner" => $fname." ".$lname,
                "status" => $status,
                "created_at" => $created_at,
                "updated_at"=> $updated_at
            );
     
            array_push($ads_arr["ads"], $ads_item);
        }
     
        http_response_code(200);
        echo json_encode($ads_arr);
    }
     
    else{
        // http_response_code(404);
        // echo json_encode(
        //     array("message" => "No Ads found.")
        // );
        $json['status'] = 404;
        $json['message'] = 'No Ads found';
        echo json_encode($json);
    }
?>