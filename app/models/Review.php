<?php 
    class Review{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    
        public function addReview($data){
            $this->db -> query('INSERT INTO review(farmerID,buyerID,description,rating,reviewDate,orderID) VALUES(:farmerID,:buyerID,:description,:rating,:reviewDate,:orderID)');
            $this->db -> bind(':buyerID',$_SESSION['buyerID']);
            $this->db -> bind(':farmerID',$data['farmer'] -> farmerID);
            $this->db -> bind(':description',$data['description']);
            $this->db -> bind(':rating',$data['rating']);
            $this->db -> bind(':reviewDate',$data['reviewDate']);
            $this->db -> bind(':orderID',$data['orderID']);


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllReviewByfarmerID($ID){
            $this->db->query("SELECT * FROM review WHERE farmerID = :ID  ORDER BY reviewDate");
            $this->db -> bind(':ID',$ID);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getFarmerRating($ID){
            $this->db->query('SELECT AVG(rating) FROM review WHERE  farmerID = :ID ');
            $this->db -> bind(':ID',$ID);
    
            $results = $this->db->single();
            return $results;
        }
        public function isReviewed($ID){
            $this->db->query("SELECT * FROM review WHERE orderID = :ID");
            $this->db -> bind(':ID',$ID);
            $results = $this->db->resultSet();
            
            if($this->db->rowcount() > 0){
                return true;
            }else{
                return false;
            }
        }

        
    }
?>