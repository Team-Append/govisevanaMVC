<?php 
    class Stock{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    
        public function addStock($data){
            $this->db -> query('INSERT INTO stock(farmerID,title,description,harvestDate,expireDate,catagory,qty,fixedPrice,minBidPrice,stockStatus) VALUES(:farmerID,:title,:description, :harvestDate, :expireDate , :catagory, :qty, :fixedPrice, :minBidPrice, :stockStatus)');
            $this->db -> bind(':farmerID',$_SESSION['farmerID']);
            $this->db -> bind(':title',$data['title']);
            $this->db -> bind(':description',$data['description']);
            $this->db -> bind(':harvestDate',$data['harvestDate']);
            $this->db -> bind(':expireDate',$data['expireDate']);
            $this->db -> bind(':catagory',$data['catagory']);
            $this->db -> bind(':qty',$data['qty']);
            $this->db -> bind(':fixedPrice',$data['fixedPrice']);
            $this->db -> bind(':minBidPrice',$data['minBidPrice']);
            $this->db -> bind(':stockStatus','pending');


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>