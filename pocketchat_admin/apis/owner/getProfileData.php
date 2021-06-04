<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Owner.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
     
        $database = new Database();
        $db = $database->getConnection();
         
        $owner = new Owner($db);
        $owner->phone = $_POST['phone'];

        $owner->getProfileData();
        
        if($owner->phone != null && $owner->id!= ""){
            
            $owner = array(
                "id" => $owner->id,
                "user_id" => $owner->user_id,
                "fname" => $owner->fname,
                "lname" => $owner->lname,
                "native_place" => $owner->native_place,
                "cmp_name" => $owner->cmp_name,
                "cmp_address" => $owner->cmp_address,
                "position" => $owner->position
            );
            
            http_response_code(200);
            echo json_encode($owner);

        }else{
            
            http_response_code(404);
            echo json_encode(
                array("message" => "User does not exist.")
            );
        }
    }else{
        http_response_code(405);
        echo json_encode(
            array("message" => "Method Not Allowed")
        );        
    }
    
?>