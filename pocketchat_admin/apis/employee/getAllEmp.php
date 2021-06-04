<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Employee.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $employee = new Employee($db);
     
    $stmt = $employee->getAllEmp();
    $num = $stmt->rowCount();
     
    // check if more than 0 record found
    if($num>0){
     
        $users_arr = array();
        $users_arr["employees"] = array();
     
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
     
            $users = array(
                "id" => $id,
                "user_id" => $user_id,
                "category_id" => $category_id,
                "fname" => $fname,
                "lname" => $lname,
                "cur_cmp" => $cur_cmp,
                "cur_sal" => $cur_sal,
                "experience" => $experience,
                "birth_date" => $birth_date,
                "gender" => $gender,
                "native_place" => $native_place
            );
     
            array_push($users_arr["employees"], $users);
        }
     
        http_response_code(200);
        echo json_encode($users_arr);
    }
     
    else{
        $json['status'] = 404;
        $json['message'] = 'No Employees found.';
        echo json_encode($json);
    }
?>