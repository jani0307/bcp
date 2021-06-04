<?php
	include_once '../shared/headers.php';	  
	include_once '../config/Database.php';
	include_once '../objects/Ads.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){	  

		$database = new Database();
		$db = $database->getConnection();
		  
		$ad = new Ads($db);
		  
		// set ad id to be removed
		$ad->id = $_POST['id'];

		if (!empty($ad->id)){
			// remove the ad
			if($ad->removeAd()){
				
				$json['status'] = 200;
		        $json['message'] = 'Ad removed';
		        echo json_encode($json);

			}else{
			  	
			  	$json['status'] = 503;
		        $json['message'] = 'Unable to remove Ad';
		        echo json_encode($json);
			}
		}else{

                $json['status'] = 404;
                $json['message'] = 'Data missing';
                echo json_encode($json);
        } 
	}else{

        $json['status'] = 405;
        $json['message'] = 'Method Not Allowed';
        echo json_encode($json);
        
    } 
?>