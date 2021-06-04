<?php

    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/User.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $database = new Database();
        $db = $database->getConnection();

        $user = new User($db);

        if (
            isset($_POST['name']) 
            && isset($_FILES['image'])
            && isset($_POST['cmp_name'])
            && isset($_POST['cmp_address'])
            && isset($_POST['phone'])
        ){  

            $user->phone = $_POST['phone'];
            $user->name = $_POST['name'];
            $user->image = $_FILES['image'];
            $user->cmp_name = $_POST['cmp_name'];
            $user->cmp_address = $_POST['cmp_address'];
                        
            if (!empty($user->phone) && 
                !empty($user->name) && 
                !empty($user->image) && 
                !empty($user->cmp_name) && 
                !empty($user->cmp_address)
            ) {
                
                if($user->updateProfile()){
                    $json['status'] = 200;
                    $json['message'] = 'User profile updated';
                    echo json_encode($json);
                }else{
                    $json['status'] = 403;
                    $json['message'] = 'Unable to update data';
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