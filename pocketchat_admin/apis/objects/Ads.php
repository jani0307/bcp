<?php
    
    class Ads{
     
        // DB connection and table name
        private $conn;
        private $table_name = "ads";

        //object properties
        public $id;
        public $image;
        public $user_id;
        public $phone;
        public $status;
        public $created_at;
        public $updated_at;
        public $deleted_at;
        
        public function __construct($db){
            $this->conn = $db;
        }

        //used for update,delete
        function checkId(){
            // check that product ID that exists in database
            $checkIdQuery = "SELECT * FROM ". $this->table_name . " WHERE id = :id";
            $checkIdStmt = $this->conn->prepare($checkIdQuery);
            $checkIdStmt->bindParam(':id', $this->id);
            $checkIdStmt->execute();
            $idrow = $checkIdStmt->fetch(PDO::FETCH_ASSOC);
            if(!$idrow){
                return false;
            }else{
                return true;
            }
        } // function checkId()

        function getUserId($phone){
            
            $getUserIdQuery = "SELECT id FROM users WHERE phone = :phone";
            $getUserIdStmt = $this->conn->prepare($getUserIdQuery);
            $getUserIdStmt->bindParam(':phone', $phone);
            $getUserIdStmt->execute();
            $idrow = $getUserIdStmt->fetch(PDO::FETCH_ASSOC);
            $id = $idrow['id'] ?? '';
            return $id;
        }// function getUserId($phone)

        function getAdsCount(){
            // get user id
            $this->user_id = $this->getUserId($this->phone);

            $adsCntQuery = "SELECT * FROM
                        " . $this->table_name . "
                    WHERE user_id = :user_id";

            $stmt = $this->conn->prepare( $adsCntQuery );
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->execute();
            $adsCnt = $stmt->rowCount();
            return $adsCnt;
        }// function getAdsCount()

        function createAd(){

            if($this->getAdsCount()>4){
                return false;
            }

            $this->user_id = $this->getUserId($this->phone);

            if($this->user_id == 0){
                return false;
            }

            //ad uploading
            $imageName = $this->image['name'];
            $imageTmpName=  $this->image['tmp_name'];
            $location = "../uploads/files/";                
            $fi = new FilesystemIterator($location, FilesystemIterator::SKIP_DOTS); 
            $cnt = iterator_count($fi);
            $cnt2 =  $cnt + 1;
            // $newImageName = "$this->phone".".png";
            $newImageName = "$this->phone"."$cnt2".".png";

            move_uploaded_file($imageTmpName,$location.$newImageName);

            $createAdQuery = "INSERT INTO
                        " . $this->table_name . "
                    SET
                        image=:image, 
                        user_id=:user_id";
          
            $createAdStmt = $this->conn->prepare($createAdQuery);
          
            $this->image = htmlspecialchars(strip_tags($newImageName));
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
          
            $createAdStmt->bindParam(":image", $this->image);
            $createAdStmt->bindParam(":user_id", $this->user_id);
          
            // execute query
            if($createAdStmt->execute()){
                return true;
            }

            return false;
        } // function create()
  
        function removeAd(){
            //id exists
            if($this->checkId()){
                $query = "UPDATE
                            " . $this->table_name . "
                        SET
                            status = :status
                        WHERE
                            id = :id";

                $stmt = $this->conn->prepare($query);
                $this->status = 0;

                // bind new values
                $stmt->bindParam(':status', $this->status);
                $stmt->bindParam(':id', $this->id);

                if($stmt->execute()){
                    return true;
                }
            }else{
                return false;
            }
        }// function removeAd()
        
        public function read(){
            // get user id
            $this->user_id = $this->getUserId($this->phone);

            $query = "SELECT
                        id, image, user_id, status, created_at, updated_at
                    FROM
                        " . $this->table_name . "
                    WHERE
                    user_id = :user_id
                    AND status = 1
                    ORDER BY created_at DESC";

            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->execute();

            return $stmt;
        } // public function read()


        public function getAllAds(){
            $dataQuery = "SELECT
                            ads.id,
                            ads.image,
                            ads.user_id,
                            o.fname,
                            o.lname,
                            ads.status,
                            ads.created_at,
                            ads.updated_at
                        FROM
                            ads
                        JOIN owners o ON
                            ads.user_id = o.user_id
                        ORDER BY
                            created_at";

            $stmt = $this->conn->prepare( $dataQuery );
            $stmt->execute();
            return $stmt;
        }// public function getAllUsers() 
    }//class Ads

?>