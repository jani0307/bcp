<?php

    include_once '../shared/headers.php';      
    include_once '../config/Database.php';
    include_once '../objects/Employee.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $database = new Database();
        $db = $database->getConnection();

        $employee = new Employee($db);

        if (
             isset($_POST['phone']) 
            && isset($_POST['fname']) 
            && isset($_POST['lname'])
            && isset($_POST['cur_cmp'])
            && isset($_POST['cur_salary'])

            && isset($_POST['experience'])

            && isset($_POST['birth_date'])

            && isset($_POST['gender'])
            
            && isset($_POST['native_place'])
            && isset($_POST['main_cat_id'])
            && isset($_POST['sub_cat_name'])
            && isset($_POST['category_name'])
        ){  

             $employee->phone = $_POST['phone'];
            $employee->fname = $_POST['fname'];
            $employee->lname = $_POST['lname'];
            $employee->cur_cmp = $_POST['cur_cmp'];
            $employee->cur_sal = $_POST['cur_salary'];
            $employee->experience = $_POST['experience'];

            $employee->birth_date = $_POST['birth_date'];
            $employee->gender = $_POST['gender'];
            $employee->native_place = $_POST['native_place'];
            $employee->main_cat_id = $_POST['main_cat_id'];
            $employee->sub_cat_name = $_POST['sub_cat_name'];
            $employee->category_name = $_POST['category_name'];
                        
            if (!empty($employee->phone) && 
                !empty($employee->fname) && 
                !empty($employee->lname) && 
                !empty($employee->cur_cmp) && 
                !empty($employee->cur_sal) &&
                !empty($employee->experience) &&

                !empty($employee->birth_date) && 
                !empty($employee->gender) && 
                !empty($employee->native_place) && 
                !empty($employee->main_cat_id) && 
                !empty($employee->sub_cat_name) && 
                !empty($employee->category_name)
            ) {

                if($employee->updateProfile()){
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