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
            $sa = $this->db->query('SELECT * FROM stock,farmer WHERE stock.farmerID = :ID and stock.farmerID = farmer.farmerID ORDER BY stockID DESC');
            echo $sa;
            $this->db -> bind(':ID',$ID);
    
            $results = $this->db->resultSet();
            return $results;
        }
        public function getAllApprovedPosts($ID){
            $this->db->query("SELECT * FROM stock,farmer WHERE stock.farmerID = :ID and stockStatus = 'approved' and farmer.farmerID = stock.farmerID ORDER BY stockID DESC");
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
            $this->db->query('SELECT * FROM stock,farmer,catagory WHERE stockID = :ID and stock.farmerID = farmer.farmerID and stock.catID = catagory.catID');
            $this->db -> bind(':ID',$stockID);
    
            $results = $this->db->single();
            return $results;
        }
        public function getStockByCatagory($catID){
            $this->db->query('SELECT * FROM stock,farmer WHERE catID = :ID and stock.farmerID = farmer.farmerID');
            $this->db -> bind(':cat',$catID);
    
            $results = $this->db->resultSet();
            return $results;

        }
        public function  getAllStock(){
            $this->db->query('SELECT * FROM stock,farmer WHERE  stock.farmerID = farmer.farmerID');
            
    
            $results = $this->db->resultSet();
            return $results;

        }
        public function  getAllActiveStock(){
            $this->db->query("SELECT * FROM stock,farmer WHERE  stock.farmerID = farmer.farmerID and stock.qty>0 and stockStatus = 'approved'");
            
    
            $results = $this->db->resultSet();
            return $results;

        }
        public function updateQty($stockID,$newQty){
            $this->db->query("UPDATE stock SET qty = :qty WHERE stockID = :stockID");
            $this->db -> bind(':qty',$newQty);
            $this->db -> bind(':stockID',$stockID);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function getNumberOfStocksByFarmerID($id){
            $this->db->query('SELECT COUNT(stockID) FROM stock WHERE farmerID = :farmerfID');
            $this->db -> bind(':farmerID',$id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        
        
        public function editStock($stockID){
            $this->db->query("UPDATE stock SET stock = :name , NIC = :NIC , address = :address , email = :email , tpno = :tpno WHERE farmerID =:ID");
            
            
            

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function deleteStockByStockID($id){
            
            $this->db->query('DELETE FROM stock WHERE stockID = :stockID');
            $this->db -> bind(':stockID',$id);
        
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } 

     }
?>