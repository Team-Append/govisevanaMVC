<?php 
    class Request{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    
        public function addRequest($data){
            $this->db -> query('INSERT INTO request(buyerID,title,qty,reqStatus,reqCatagory,reqDescription,expectedDate) VALUES(:buyerID,:title,:qty,:reqStatus,:reqCatagory,:reqDescription, :expectedDate)');
            $this->db -> bind(':buyerID',$_SESSION['buyerID']);
            $this->db -> bind(':title',$data['title']);
            $this->db -> bind(':qty',$data['qty']);
            $this->db -> bind(':reqStatus','pending');
            $this->db -> bind(':reqCatagory',$data['reqCatagory']);
            $this->db -> bind(':reqDescription',$data['reqDescription']);
            $this->db -> bind(':expectedDate',$data['expectedDate']);


            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>