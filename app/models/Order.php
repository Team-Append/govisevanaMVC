<?php 
    class Order{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        
        public function createOrder($data){
            $this->db -> query('INSERT INTO stockOrder(stockID, farmerID, buyerID, orderQty,total, shippingAddress,province,district, orderDate, orderStatus) VALUES(:stockID,:farmerID,:buyerID, :orderQty,:total, :shippingAddress, :province, :district, :orderDate, :orderStatus)');
            $this->db -> bind(':stockID',$data['posts']->stockID); //get the currently loged in buyers's ID
            $this->db -> bind(':farmerID',$data['posts']->farmerID);
            $this->db -> bind(':buyerID',$_SESSION['buyerID']);
            $this->db -> bind(':orderQty',$data['orderQty']);
            $this->db -> bind(':total',$data['posts']->fixedPrice * $data['orderQty']);
            $this->db -> bind(':shippingAddress',$data['shippingAddress']);
            $this->db -> bind(':province',$data['province']);
            $this->db -> bind(':district',$data['district']);
            $this->db -> bind(':orderDate',date("Y/m/d")); 
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
        public function getOrderByID($orderID){
            $this->db -> query('SELECT * FROM stockorder WHERE orderID = :ID');
            $this->db -> bind(':ID',$orderID);
            $results = $this->db->single();
            return $results;
            
        }
        public function getOrdersByFarmerID($farmerID){
            $this->db -> query('SELECT * FROM stockorder,stock,farmer,buyer WHERE stockorder.farmerID = :ID and stockorder.stockId = stock.stockID and farmer.farmerID = stock.farmerID and buyer.buyerID = stockorder.buyerID order BY orderDate DESC');
            $this->db -> bind(':ID',$farmerID);
            $results = $this->db->resultSet();
            return $results;
        }
        public function updateOrderStatus($status, $orderID){
            $this->db -> query('UPDATE stockorder SET orderStatus = :stat WHERE orderID = :ID');
            $this->db -> bind(':ID',$orderID);
            $this->db -> bind(':stat',$status);
            $results = $this->db->execute();
            return $results;
        }
        public function getCompletedOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM stockorder,farmer,stock WHERE buyerID = :ID AND farmer.farmerID = stockorder.farmerID and stock.stockID = stockorder.stockID and orderStatus = "completed" ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function getOngoingOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM stockorder,farmer,stock WHERE buyerID = :ID AND farmer.farmerID = stockorder.farmerID and stock.stockID = stockorder.stockID and orderStatus != "completed" ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
    }
?>