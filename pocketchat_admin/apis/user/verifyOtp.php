<?php

    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/User.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $database = new Database();
        $db = $database->getConnection();

        $user = new User($db);

        if (isset($_POST['phone']) && isset($_POST['otp'])){
            
            $phone = $_POST['phone'];
            $otp = $_POST['otp'];
            
            if (!empty($phone) && !empty($otp)) {
                
                if($user->verifyOtp($phone,$otp)){
                    $json['status'] = 200;
                    $json['message'] = 'OTP Verified';
                    echo json_encode($json);
                }else{
                    $json['status'] = 403;
                    $json['message'] = 'OTP Verification failed';
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