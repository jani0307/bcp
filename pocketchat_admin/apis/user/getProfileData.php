<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/User.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
        $database = new Database();
        $db = $database->getConnection();
         
        $user = new User($db);
        $user->phone = $_POST['phone'];

        $user->getProfileData();
        
        if($user->name != null){
            
            $user = array(
                "id" => $user->id,
                "name" => $user->name,
                "phone" => $user->phone,
                "cmp_name" => $user->cmp_name,
                "cmp_address" => $user->cmp_address
            );
            
            http_response_code(200);
            echo json_encode($user);

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