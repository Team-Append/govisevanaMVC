<?php 
    class Offers{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        public function addOffer($data){
            $this->db -> query('INSERT INTO offer(farmerID,RID,offerDescription,offerPrice,offerStatus) VALUES(:farmerID,:RID,:offerDescription, :offerPrice, :offerStatus )');
            $this->db -> bind(':farmerID',$_SESSION['farmerID']);
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
    }
?>