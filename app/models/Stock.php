<?php 
    class Stock{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    
        public function addStock($data){
            $this->db -> query('INSERT INTO stock(farmerID,title,description,harvestDate,expireDate,catID,qty,image,fixedPrice,minBidPrice,stockStatus) VALUES(:farmerID,:title,:description, :harvestDate, :expireDate , :catagory, :qty,:image, :fixedPrice, :minBidPrice, :stockStatus)');
            $this->db -> bind(':farmerID',$_SESSION['farmerID']);
            $this->db -> bind(':title',$data['title']);
            $this->db -> bind(':description',$data['description']);
            $this->db -> bind(':harvestDate',$data['harvestDate']);
            $this->db -> bind(':expireDate',$data['expireDate']);
            $this->db -> bind(':catagory',$data['catagory']);
            $this->db -> bind(':qty',$data['qty']);
            $this->db -> bind(':image',$data['image']);
            $this->db -> bind(':fixedPrice',$data['fixedPrice']);
            $this->db -> bind(':minBidPrice',$data['minBidPrice']);
            $this->db -> bind(':stockStatus','pending');


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    
        public function getStockForLanding(){
            $this->db->query("SELECT * FROM stock,farmer WHERE stockStatus='approved' and stock.farmerID = farmer.farmerID ORDER BY stockID DESC LIMIT 8");

            $results = $this->db->resultSet();
            return $results;
        }
        public function getPendingStock(){
            $this->db->query("SELECT * FROM stock,farmer,catagory WHERE stockStatus = 'pending' and stock.farmerID = farmer.farmerID and stock.catID = catagory.catID ORDER BY stockID DESC");

            $results = $this->db->resultSet();
            return $results;
        }
        public function findAllPosts($ID){
            $this->db->query('SELECT * FROM stock WHERE farmerID = :ID ORDER BY stockID DESC');
            $this->db -> bind(':ID',$ID);
    
            $results = $this->db->resultSet();
            return $results;
        }
        public function updateStockStatus($status,$stockID){
            $this->db->query("UPDATE stock SET stockStatus = :status WHERE stockID = :stockID");
            $this->db -> bind(':status',$status);
            $this->db -> bind(':stockID',$stockID);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }
        public function getStockByID($stockID){
            $this->db->query('SELECT * FROM stock,farmer WHERE stockID = :ID and stock.farmerID = farmer.farmerID');
            $this->db -> bind(':ID',$stockID);
    
            $results = $this->db->single();
            return $results;
        }
     }
?>