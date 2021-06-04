<?php
    
    class Employee{
     
        // DB connection and table name
        private $conn;
        private $table_name = "employees";

        //object properties
        public $id;
        public $user_id;

        public $main_cat_id;
        public $sub_cat_name;
        public $category_name;

        public $category_id;
        
        public $phone;
        public $fname;
        public $lname;
        public $cur_cmp;
        public $cur_sal;
        public $birth_date;
        public $native_place;
        
        public $gender;
        public $experience;
        
        public function __construct($db){
            $this->conn = $db;
            include_once 'User.php';
        }

        function getCatId(){
            
            $getIdQuery = "SELECT id FROM categories 
                            WHERE name=:category_name 
                            AND sub_id=(
                                SELECT id FROM subcategories 
                                WHERE name=:sub_cat_name
                                AND main_id=:main_cat_id
                            )";

            $getIdStmt = $this->conn->prepare($getIdQuery);

            $getIdStmt->bindParam(':category_name', $this->category_name);
            $getIdStmt->bindParam(':sub_cat_name', $this->sub_cat_name);
            $getIdStmt->bindParam(':main_cat_id', $this->main_cat_id);
            
            $getIdStmt->execute();

            $idrow = $getIdStmt->fetch(PDO::FETCH_ASSOC);
            $id = $idrow['id'] ?? '';
            return $id;

        }// public function getCatId()


        public function isAlreadyExist() {
            
            $checkIdQuery = "SELECT * FROM ". $this->table_name . " WHERE user_id = :user_id";
            $checkIdStmt = $this->conn->prepare($checkIdQuery);
            $checkIdStmt->bindParam(':user_id', $this->user_id);
            $checkIdStmt->execute();
            $idrow = $checkIdStmt->fetch(PDO::FETCH_ASSOC);
            if(!$idrow){
                return false;
            }else{
                return true;
            }

        }// public function isAlreadyExist() 


        public function register() {
            
            $this->category_id = $this->getCatId();

            $user = new User($this->conn);

            $this->user_id = $user->getId($this->phone);

            if($this->isAlreadyExist()){
                $this->updateProfile();
                return true;
            }

            $empQuery = "INSERT INTO ".$this->table_name." SET
                        user_id=:user_id,
                        category_id=:category_id,
                        fname=:fname,
                        lname=:lname,
                        cur_cmp=:cur_cmp,
                        cur_sal=:cur_sal,
                        experience=:experience,
                        birth_date=:birth_date,
                        gender=:gender,
                        native_place=:native_place";

            $empStmt = $this->conn->prepare($empQuery);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->fname = htmlspecialchars(strip_tags($this->fname));            
            $this->lname = htmlspecialchars(strip_tags($this->lname));
            $this->cur_cmp = htmlspecialchars(strip_tags($this->cur_cmp));            
            $this->cur_sal = htmlspecialchars(strip_tags($this->cur_sal));            
            $this->experience = htmlspecialchars(strip_tags($this->experience));            
            $this->birth_date = htmlspecialchars(strip_tags($this->birth_date));        
            $this->gender = htmlspecialchars(strip_tags($this->gender));        
            $this->native_place = htmlspecialchars(strip_tags($this->native_place));
            
            $empStmt->bindParam(":user_id", $this->user_id);
            $empStmt->bindParam(":category_id", $this->category_id);
            $empStmt->bindParam(":fname", $this->fname);
            $empStmt->bindParam(":lname", $this->lname);
            $empStmt->bindParam(":cur_cmp", $this->cur_cmp);
            $empStmt->bindParam(":cur_sal", $this->cur_sal);
            $empStmt->bindParam(":experience", $this->experience);
            $empStmt->bindParam(":birth_date", $this->birth_date);
            $empStmt->bindParam(":gender", $this->gender);
            $empStmt->bindParam(":native_place", $this->native_place);
            
            if($empStmt->execute()){
                // $this->id = $this->conn->lastInsertId();

                //update role of user to employees = 4
                $role_id = 4;
                $changeRoleQuery = "UPDATE users 
                    SET
                        role_id = :role_id
                    WHERE
                        id = :user_id";
                $changeRoleStmt = $this->conn->prepare($changeRoleQuery);
                $changeRoleStmt->bindParam(":role_id", $role_id);
                $changeRoleStmt->bindParam(":user_id", $this->user_id);
                
                if($changeRoleStmt->execute()){
                    return true;
                }
            }
            return false;

        }// public function register()

        public function updateProfile(){

            $this->category_id = $this->getCatId();

            $user = new User($this->conn);

            $this->user_id = $user->getId($this->phone);

            $empQuery = "UPDATE ".$this->table_name." 
                    SET
                        category_id=:category_id,
                        fname=:fname,
                        lname=:lname,
                        cur_cmp=:cur_cmp,
                        cur_sal=:cur_sal,
                        experience=:experience,
                        birth_date=:birth_date,
                        gender=:gender,
                        native_place=:native_place
                    WHERE
                        user_id = :user_id";

            $empStmt = $this->conn->prepare($empQuery);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->fname = htmlspecialchars(strip_tags($this->fname));            
            $this->lname = htmlspecialchars(strip_tags($this->lname));
            $this->cur_cmp = htmlspecialchars(strip_tags($this->cur_cmp));            
            $this->cur_sal = htmlspecialchars(strip_tags($this->cur_sal));            
            $this->experience = htmlspecialchars(strip_tags($this->experience));            
            $this->birth_date = htmlspecialchars(strip_tags($this->birth_date));        
            $this->gender = htmlspecialchars(strip_tags($this->gender));        
            $this->native_place = htmlspecialchars(strip_tags($this->native_place));
            
            $empStmt->bindParam(":user_id", $this->user_id);
            $empStmt->bindParam(":category_id", $this->category_id);
            $empStmt->bindParam(":fname", $this->fname);
            $empStmt->bindParam(":lname", $this->lname);
            $empStmt->bindParam(":cur_cmp", $this->cur_cmp);
            $empStmt->bindParam(":cur_sal", $this->cur_sal);
            $empStmt->bindParam(":experience", $this->experience);
            $empStmt->bindParam(":birth_date", $this->birth_date);
            $empStmt->bindParam(":gender", $this->gender);
            $empStmt->bindParam(":native_place", $this->native_place);
            
            if($empStmt->execute()){
                // $this->id = $this->conn->lastInsertId();
               return true;
            }
            return false;
        
        }// public function updateProfile()

        public function getAllEmp(){
            $dataQuery = "SELECT
                        id, user_id, category_id, fname, 
                        lname, cur_cmp, cur_sal,experience, birth_date, gender,
                        native_place
                    FROM
                        " . $this->table_name . "
                    ORDER BY
                        fname";

            $stmt = $this->conn->prepare( $dataQuery );
            $stmt->execute();
            return $stmt;
        }// public function getAllOwners()

        public function getProfileData(){

            $user = new User($this->conn);

            $this->user_id = $user->getId($this->phone);

            $dataQuery = "SELECT
                       id, user_id, category_id, fname, 
                        lname, cur_cmp, cur_sal,experience, birth_date, gender,
                        native_place
                    FROM
                        " .$this->table_name. "
                    WHERE user_id = :user_id";

            $stmt = $this->conn->prepare( $dataQuery );
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->execute();

            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
           
            // set values to object properties
            $this->id = $row['id'] ?? '';
            $this->user_id = $row['user_id'] ?? '';
            $this->category_id = $row['category_id'] ?? '';
            $this->fname = $row['fname'] ?? '';
            $this->lname = $row['lname'] ?? '';
            $this->cur_cmp = $row['cur_cmp'] ?? '';
            $this->cur_sal = $row['cur_sal'] ?? '';
            $this->experience=$row['experience'] ?? '';
            $this->birth_date = $row['birth_date'] ?? '';
            $this->gender=$row['gender'] ?? '';
            $this->native_place = $row['native_place'] ?? '';
            
        }// public function getProfileData()
            
    }//class Employee

?>