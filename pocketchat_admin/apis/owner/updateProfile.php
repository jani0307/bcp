<?php

    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Owner.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $database = new Database();
        $db = $database->getConnection();

        $owner = new Owner($db);

        if (
            isset($_POST['phone']) 
            && isset($_POST['fname']) 
            && isset($_POST['lname'])
            && isset($_POST['native_place'])
            && isset($_POST['cmp_name'])
            && isset($_POST['cmp_address'])
            && isset($_POST['position'])
        ){  

            $owner->phone = $_POST['phone'];
            $owner->fname = $_POST['fname'];
            $owner->lname = $_POST['lname'];
            $owner->native_place = $_POST['native_place'];
            $owner->cmp_name = $_POST['cmp_name'];
            $owner->cmp_address = $_POST['cmp_address'];
            $owner->position = $_POST['position'];
                        
            if (!empty($owner->phone) && 
                !empty($owner->fname) && 
                !empty($owner->lname) && 
                !empty($owner->native_place) && 
                !empty($owner->cmp_name) && 
                !empty($owner->cmp_address) && 
                !empty($owner->position) 
            ) {

                if($owner->updateProfile()){
                    $json['status'] = 200;
                    $json['message'] = 'Profile updated Succesfully';
                    echo json_encode($json);
                }else{
                    $json['status'] = 403;
                    $json['message'] = 'Unable to update profile';
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