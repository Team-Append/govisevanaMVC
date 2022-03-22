<?php 
    class Order{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        
        public function createOrder($data){
            $this->db -> query('INSERT INTO stockOrder(stockID, farmerID, buyerID, qty, shippingAddress, orderDate, orderStatus) VALUES(:stockID,:farmerID,:buyerID, :qty, :shippingAddress,:orderDate, :orderStatus)');
            $this->db -> bind(':stockID',$data['stockID']); //get the currently loged in buyers's ID
            $this->db -> bind(':farmerID',$data['farmerID']);
            $this->db -> bind(':buyerID',$_SESSION['buyerID']);
            $this->db -> bind(':qty',$data['qty']);
            $this->db -> bind(':shippingAddress',$data['shippingAddress']);
            $this->db -> bind(':orderDate',$data['orderDate']); 
            $this->db -> bind(':orderStatus','pending'); 
           
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function getOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM stockorder WHERE buyerID = :ID ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function getOrdersByFarmerID($farmerID){
            $this->db -> query('SELECT * FROM stockorder WHERE farmerID = :ID ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$farmerID);
            $results = $this->db->resultSet();
            return $results;
        }
        public function updateOrderStatus($status, $orderID){
            $this->db -> query('UPDATE stockorder SET orderStatus = :stat WHERE orderID = :ID');
            $this->db -> bind(':ID',$orderID);
            $this->db -> bind(':stat',$status);
            $results = $this->db->resultSet();
            return $results;
        }
    }
?>