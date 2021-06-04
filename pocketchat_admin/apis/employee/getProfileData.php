<?php
    
    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Employee.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
     
        $database = new Database();
        $db = $database->getConnection();
         
        $employee = new Employee($db);
        $employee->phone = $_POST['phone'];

        $employee->getProfileData();
        
        if($employee->phone != null && $employee->id!= ""){
            
            $employee = array(
                "id" => $employee->id,
                "user_id" => $employee->user_id,
                "category_id" => $employee->category_id,
                "fname" => $employee->fname,
                "lname" => $employee->lname,
                "cur_cmp" => $employee->cur_cmp,
                "cur_sal" => $employee->cur_sal,
                "experience"=> $employee->experience,
                "birth_date" => $employee->birth_date,
                "gender"=> $employee->gender,
                "native_place" => $employee->native_place
            );
            
            http_response_code(200);
            echo json_encode($employee);

        }else{
            http_response_code(404);
            echo json_encode(
                array("message" => "User Not found")
            );   
            // http_response_code(404);
            // echo json_encode(
            //     array(
            //         "id" => $employee->id,
            //         "phone" => $employee->phone
            //     )
            // );
        }
    }else{
        http_response_code(405);
        echo json_encode(
            array("message" => "Method Not Allowed")
        );        
    }
    
?>