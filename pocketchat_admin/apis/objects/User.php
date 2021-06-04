<?php
    
    class User{
     
        // DB connection and table name
        private $conn;
        private $table_name = "users";

        //object properties
        public $id;
        public $name;
        public $phone;
        public $image;
        public $cmp_name;
        public $cmp_address;
        
        public function __construct($db){
            $this->conn = $db;
            include_once '../services/SMS.php';
        }
       
        public function isAlreadyExist() {
            
            $checkIdQuery = "SELECT * FROM ". $this->table_name . " WHERE phone = :phone";
            $checkIdStmt = $this->conn->prepare($checkIdQuery);
            $checkIdStmt->bindParam(':phone', $this->phone);
            $checkIdStmt->execute();
            $idrow = $checkIdStmt->fetch(PDO::FETCH_ASSOC);
            if(!$idrow){
                return false;
            }else{
                return true;
            }

        }// public function isAlreadyExist() 
       
        public function getId($phone){
            
            $getIdQuery = "SELECT id FROM ". $this->table_name ." WHERE phone = :phone";
            $getIdStmt = $this->conn->prepare($getIdQuery);
            $getIdStmt->bindParam(':phone', $phone);
            $getIdStmt->execute();
            $idrow = $getIdStmt->fetch(PDO::FETCH_ASSOC);
            $id = $idrow['id'] ?? '';
            return $id;
        }// public function getId($phone)

        public function register($phone) {
           
            $otp = rand(1000, 9999); //4 digit OTP
            
            if($this->isAlreadyExist()){

                // update OTP and send SMS
                $verified = 0;
                //make verified = 0
                $updateOTPQuery = "UPDATE user_auth 
                                    SET otp = :otp,
                                    verified = :verified        
                                    WHERE phone = :phone";

                $updateOTPStmt = $this->conn->prepare($updateOTPQuery);
                $updateOTPStmt->bindParam(':otp', $otp);
                $updateOTPStmt->bindParam(':verified', $verified);
                $updateOTPStmt->bindParam(':phone',  $this->phone);

                $updateOTPStmt->execute();

                //send new OTP to phone
                $sendSMS = new SMS();
                $sendSMS->sendOtp($this->phone,$otp); 

                return false;
            }            
        

            // user queries
            $userQuery = "INSERT INTO
                        " . $this->table_name . "
                    SET
                        phone=:phone";
            $userStmt = $this->conn->prepare($userQuery);          
            $this->phone = htmlspecialchars(strip_tags($this->phone));            
            $userStmt->bindParam(":phone", $this->phone);

            // OTP queries
            $otpQuery = "INSERT INTO user_auth 
                        SET phone=:phone,otp=:otp";
            $otpStmt = $this->conn->prepare($otpQuery);          
            $otpStmt->bindParam(":phone", $this->phone);
            $otpStmt->bindParam(":otp", $otp);
                      
            // execute query
            if($userStmt->execute()){
                $this->id = $this->conn->lastInsertId();

                $sendSMS = new SMS();
                $sendSMS->sendOtp($this->phone,$otp); 
                
                //insert OTP in DB
                $otpStmt->execute();

                return true;
            }
            return false;

        }// public function register($phone)
         
        public function verifyOtp($phone,$otp) {
            
            $getOtpQuery = "SELECT otp FROM user_auth WHERE phone = :phone";
            $getOtpStmt = $this->conn->prepare($getOtpQuery);
            $getOtpStmt->bindParam(':phone', $phone);
            $getOtpStmt->execute();
            $otpRow = $getOtpStmt->fetch(PDO::FETCH_ASSOC);

            $dbotp = $otpRow['otp'] ?? '';

            //If the given otp is equal to otp fetched from DB
            if($otp == $dbotp){
                $verified = 1;
                //make verified = 1
                $verifiedQuery = "UPDATE user_auth 
                                    SET verified = :verified
                                    WHERE phone = :phone";

                $verifiedQueryStmt = $this->conn->prepare($verifiedQuery);

                // bind new values
                $verifiedQueryStmt->bindParam(':verified', $verified);
                $verifiedQueryStmt->bindParam(':phone',  $phone);

                $verifiedQueryStmt->execute();

                return true;

            }else{
                return false;
            }

        }// public function verifyOtp($phone,$otp)

        public function updateProfile(){

            //image uploading
            $imageName = $this->image['name'];
            $imageTmpName=  $this->image['tmp_name'];
            $newImageName = "$this->phone".".png";
            $location = "../uploads/users/";                
            move_uploaded_file($imageTmpName,$location.$newImageName);

            $id = $this->getId($this->phone);

            $query = "UPDATE
                        " . $this->table_name . "
                    SET
                        name = :name,
                        image = :image,
                        cmp_name = :cmp_name,
                        cmp_address = :cmp_address
                    WHERE
                        id = :id";

            $stmt = $this->conn->prepare($query);

            // sanitize
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->image = htmlspecialchars(strip_tags($newImageName));
            $this->cmp_name = htmlspecialchars(strip_tags($this->cmp_name));
            $this->cmp_address = htmlspecialchars(strip_tags($this->cmp_address));
            $this->id = htmlspecialchars(strip_tags($id));

            // bind new values
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':image', $newImageName);
            $stmt->bindParam(':cmp_name', $this->cmp_name);
            $stmt->bindParam(':cmp_address', $this->cmp_address);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }
        
        }// public function updateProfile()

        public function getAllUsers(){
            $dataQuery = "SELECT
                        id, name, phone,image,cmp_name,cmp_address
                    FROM
                        " . $this->table_name . "
                    ORDER BY
                        name";

            $stmt = $this->conn->prepare( $dataQuery );
            $stmt->execute();
            return $stmt;
        }// public function getAllUsers()

        public function getProfileData(){
            $dataQuery = "SELECT
                        id, name, phone,image,cmp_name,cmp_address
                    FROM
                        " . $this->table_name . "
                    WHERE phone = :phone";

            $stmt = $this->conn->prepare( $dataQuery );
            $stmt->bindParam(':phone', $this->phone);
            $stmt->execute();

            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
            // set values to object properties
            $this->id = $row['id'] ?? '';
            $this->name = $row['name'] ?? '';
            $this->phone = $row['phone'] ?? '';
            $this->image = $row['image'] ?? '';
            $this->cmp_name = $row['cmp_name'] ?? '';
            $this->cmp_address = $row['cmp_address'] ?? '';
        }// public function getProfileData()
        
    }//class User

?>