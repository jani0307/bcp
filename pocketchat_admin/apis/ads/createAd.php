<?php

    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Ads.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $database = new Database();
        $db = $database->getConnection();

        $ad = new Ads($db);

        if (isset($_FILES['image']) 
            && isset($_POST['phone'])
        ){  

            $ad->phone = $_POST['phone'];
            $ad->image = $_FILES['image'];
                        
            if (!empty($ad->phone) && 
                !empty($ad->image) 
            ) {
                
                if($ad->createAd()){
                    $json['status'] = 200;
                    $json['message'] = 'Ad uploaded';
                    echo json_encode($json);
                }else{
                    $json['status'] = 403;
                    $json['message'] = 'Unable to upload Ad';
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