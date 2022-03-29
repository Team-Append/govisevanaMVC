<?php 
    class Offer{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        
        public function addOffer($data){
            $this->db -> query('INSERT INTO offer(farmerID,	RID, offerDescription, offerPrice, offerStatus) VALUES(:farmerID,:RID,:offerDescription, :offerPrice, :offerStatus)');
            $this->db -> bind(':farmerID',$_SESSION['farmerID']); //get the currently loged in farmer's ID
            $this->db -> bind(':RID',$data['RID']);
            $this->db -> bind(':offerDescription',$data['offerDescription']);
            $this->db -> bind(':offerPrice',$data['offerPrice']);
            $this->db -> bind(':offerStatus','pending'); 
           
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function getOffersByReq($RID){
            $this->db -> query('SELECT * FROM offer,farmer WHERE RID = :ID  AND offer.farmerID = farmer.farmerID ORDER BY RID DESC');
            $this->db -> bind(':ID',$RID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function getOffersByFarmerID($RID){
            $this->db -> query('SELECT * FROM offer,farmer,buyer,request WHERE farmer.farmerID = :ID  AND offer.farmerID = farmer.farmerID and offer.RID = request.RID and  request.buyerID = buyer.buyerID ORDER BY offer.RID DESC');
            $this->db -> bind(':ID',$RID);
            $results = $this->db->resultSet();
            return $results;
            
        }
        public function getOffersByID($offerID){
            $this->db -> query('SELECT * FROM offer,farmer,catagory,request WHERE offerID = :offerID and offer.farmerID = farmer.farmerID and request.RID= offer.RID and request.catID =  catagory.catID');
            $this->db -> bind(':offerID',$offerID);
            $results = $this->db->single();
            return $results;
            
        }
        
    }
?>