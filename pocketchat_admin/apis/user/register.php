<?php

    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/User.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $database = new Database();
        $db = $database->getConnection();

        $user = new User($db);

        if (isset($_POST['phone'])){
            //set user properties values
            $user->phone = $_POST['phone'];
            // $phone = $_POST['phone'];
            $phone = $user->phone;
            
            
            if (!empty($phone)) {
                if($user->register($phone)){
                    $json['status'] = 200;
                    $json['id'] = $user->id;
                    $json['message'] = 'OTP Sent successfully';
                    echo json_encode($json);
                }else{
                    $json['message'] = 'User already exist';
                    echo json_encode($json);
                }
            }else{

                $json['status'] = 404;
                $json['message'] = 'Data missing';
                echo json_encode($json);
            } 
        }

    }else{

        $json['status'] = 405;
        $json['message'] = 'Method Not Allowed';
        echo json_encode($json);
        
    } 

?>