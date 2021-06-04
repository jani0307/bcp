<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/User.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $user = new User($db);
     
    $stmt = $user->getAllUsers();
    $num = $stmt->rowCount();
     
    // check if more than 0 record found
    if($num>0){
     
        $users_arr = array();
        $users_arr["users"] = array();
     
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
     
            $users = array(

                "id" => $id,
                "name" => $name,
                "phone" => $phone,
                "cmp_name" => $cmp_name,
                "cmp_address" => $cmp_address
            );
     
            array_push($users_arr["users"], $users);
        }
     
        http_response_code(200);
        echo json_encode($users_arr);
    }
     
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No users found.")
        );
    }
?>