<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Owner.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $owner = new Owner($db);
     
    $stmt = $owner->getAllOwners();
    $num = $stmt->rowCount();
     
    // check if more than 0 record found
    if($num>0){
     
        $users_arr = array();
        $users_arr["owners"] = array();
     
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
     
            $users = array(
                "id" => $id,
                "user_id" => $user_id,
                "fname" => $fname,
                "lname" => $lname,
                "native_place" => $native_place,
                "cmp_name" => $cmp_name,
                "cmp_address" => $cmp_address,
                "position" => $position
            );
     
            array_push($users_arr["owners"], $users);
        }
     
        http_response_code(200);
        echo json_encode($users_arr);
    }
     
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No owners found.")
        );
    }
?>