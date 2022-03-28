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
        public function getCompletedOrdersByFarmerID($farmerID){
                $this->db -> query('SELECT * FROM stockorder,buyer,stock,catagory WHERE stockorder.farmerID = :ID AND buyer.buyerID = stockorder.buyerID and stock.stockID = stockorder.stockID and orderStatus = "completed" ORDER BY orderDate DESC');
                $this->db -> bind(':ID',$farmerID);
                $results = $this->db->resultSet();
                return $results;
            
        } 
        public function getOngoingOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM stockorder,farmer,stock WHERE buyerID = :ID AND farmer.farmerID = stockorder.farmerID and stock.stockID = stockorder.stockID and orderStatus != "completed" ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function createOfferOrder($data){
            $this->db -> query('INSERT INTO offerorder(RID, farmerID, buyerID, offerID,total, shippingAddress,province,district, orderDate, orderStatus) VALUES(:RID,:farmerID,:buyerID, :offerID,:total, :shippingAddress, :province, :district, :orderDate, :orderStatus)');
            $this->db -> bind(':RID',$data['posts']->RID); //get the currently loged in buyers's ID
            $this->db -> bind(':farmerID',$data['posts']->farmerID);
            $this->db -> bind(':buyerID',$_SESSION['buyerID']);
            $this->db -> bind(':offerID',$data['posts']->offerID);
            $this->db -> bind(':total',$data['posts']->offerPrice);
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
        public function getOfferOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM offerorder WHERE buyerID = :ID ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function getOfferOrderByID($orderID){
            $this->db -> query('SELECT * FROM offerorder WHERE orderID = :ID');
            $this->db -> bind(':ID',$orderID);
            $results = $this->db->single();
            return $results;
            
        }
        public function getOfferOrdersByFarmerID($farmerID){
            $this->db -> query('SELECT * FROM offerorder,request,farmer,buyer,offer WHERE offerorder.farmerID = :ID and offerorder.RID = request.RID and farmer.farmerID = offer.farmerID and buyer.buyerID = offerorder.buyerID order BY orderDate DESC');
            $this->db -> bind(':ID',$farmerID);
            $results = $this->db->resultSet();
            return $results;
        }
        public function updateOfferOrderStatus($status, $orderID){
            $this->db -> query('UPDATE offerorder SET orderStatus = :stat WHERE offerOrderID = :ID');
            $this->db -> bind(':ID',$orderID);
            $this->db -> bind(':stat',$status);
            $results = $this->db->execute();
            return $results;
        }
        public function getCompletedOfferOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM stockorder,farmer,stock WHERE buyerID = :ID AND farmer.farmerID = stockorder.farmerID and stock.stockID = stockorder.stockID and orderStatus = "completed" ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function getOngoingOfferOrdersByBuyerID($buyerID){
            $this->db -> query('SELECT * FROM stockorder,farmer,stock WHERE buyerID = :ID AND farmer.farmerID = stockorder.farmerID and stock.stockID = stockorder.stockID and orderStatus != "completed" ORDER BY orderDate DESC');
            $this->db -> bind(':ID',$buyerID);
            $results = $this->db->resultSet();
            return $results;
            
        }
    }
?>