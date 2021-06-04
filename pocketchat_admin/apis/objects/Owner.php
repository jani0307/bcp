<?php
    
    class Owner{
     
        // DB connection and table name
        private $conn;
        private $table_name = "owners";

        //object properties
        public $id;
        public $user_id;
        public $phone;
        public $fname;
        public $lname;
        public $cmp_name;
        public $cmp_address;
        public $position;
        public $native_place;
        
        public function __construct($db){
            $this->conn = $db;
            include_once 'User.php';
        }

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
            
            $user = new User($this->conn);

            $this->user_id = $user->getId($this->phone);


            if($this->isAlreadyExist()){
                $this->updateProfile();
                return true;
            }

            $ownerQuery = "INSERT INTO ".$this->table_name." SET
                        user_id=:user_id,
                        fname=:fname,
                        lname=:lname,
                        cmp_name=:cmp_name,
                        cmp_address=:cmp_address,
                        position=:position,
                        native_place=:native_place";

            $ownerStmt = $this->conn->prepare($ownerQuery);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));            
            $this->fname = htmlspecialchars(strip_tags($this->fname));            
            $this->lname = htmlspecialchars(strip_tags($this->lname));            
            $this->cmp_name = htmlspecialchars(strip_tags($this->cmp_name));            
            $this->cmp_address = htmlspecialchars(strip_tags($this->cmp_address));            
            $this->position = htmlspecialchars(strip_tags($this->position));            
            $this->native_place = htmlspecialchars(strip_tags($this->native_place));            
            
            $ownerStmt->bindParam(":user_id", $this->user_id);
            $ownerStmt->bindParam(":fname", $this->fname);
            $ownerStmt->bindParam(":lname", $this->lname);
            $ownerStmt->bindParam(":cmp_name", $this->cmp_name);
            $ownerStmt->bindParam(":cmp_address", $this->cmp_address);
            $ownerStmt->bindParam(":position", $this->position);
            $ownerStmt->bindParam(":native_place", $this->native_place);
            
            if($ownerStmt->execute()){
                // $this->id = $this->conn->lastInsertId();

                //update role of user to owner = 3
                $role_id = 3;
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

            $user = new User($this->conn);

            $this->user_id = $user->getId($this->phone);

            $ownerQuery = "UPDATE ".$this->table_name." 
                    SET
                        fname=:fname,
                        lname=:lname,
                        cmp_name=:cmp_name,
                        cmp_address=:cmp_address,
                        position=:position,
                        native_place=:native_place
                    WHERE
                        user_id = :user_id";

            $ownerStmt = $this->conn->prepare($ownerQuery);

            $this->user_id = htmlspecialchars(strip_tags($this->user_id));            
            $this->fname = htmlspecialchars(strip_tags($this->fname));            
            $this->lname = htmlspecialchars(strip_tags($this->lname));            
            $this->cmp_name = htmlspecialchars(strip_tags($this->cmp_name));            
            $this->cmp_address = htmlspecialchars(strip_tags($this->cmp_address));            
            $this->position = htmlspecialchars(strip_tags($this->position));            
            $this->native_place = htmlspecialchars(strip_tags($this->native_place));            
            
            $ownerStmt->bindParam(":user_id", $this->user_id);
            $ownerStmt->bindParam(":fname", $this->fname);
            $ownerStmt->bindParam(":lname", $this->lname);
            $ownerStmt->bindParam(":cmp_name", $this->cmp_name);
            $ownerStmt->bindParam(":cmp_address", $this->cmp_address);
            $ownerStmt->bindParam(":position", $this->position);
            $ownerStmt->bindParam(":native_place", $this->native_place);
            
            // execute query
            if($ownerStmt->execute()){
                // $this->id = $this->conn->lastInsertId();
                return true;
            }
            return false;
        
        }// public function updateProfile()

        public function getAllOwners(){
            $dataQuery = "SELECT
                        id, user_id, fname, 
                        lname, native_place, cmp_name, 
                        cmp_address, position
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
                        id, user_id, fname, 
                        lname, native_place, cmp_name, 
                        cmp_address, position
                    FROM
                        " . $this->table_name . "
                    WHERE user_id = :user_id";

            $stmt = $this->conn->prepare( $dataQuery );
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->execute();

            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->id = $row['id'] ?? '';
            $this->user_id = $row['user_id'] ?? '';
            $this->fname = $row['fname'] ?? '';
            $this->lname = $row['lname'] ?? '';
            $this->native_place = $row['native_place'] ?? '';
            $this->cmp_name = $row['cmp_name'] ?? '';
            $this->cmp_address = $row['cmp_address'] ?? '';
            $this->position = $row['position'] ?? '';
        }// public function getProfileData()
        
    }//class Owner

?>