<?php 
    class Request{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    
        public function addRequest($data){
            $this->db -> query('INSERT INTO request(buyerID,title,qty,reqStatus,catID,reqDescription,expectedDate) VALUES(:buyerID,:title,:qty,:reqStatus,:reqCatagory,:reqDescription, :expectedDate)');
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

        public function getAllRequest(){
            $this->db->query("SELECT * FROM request,buyer,catagory WHERE reqStatus = 'approved' and request.buyerID = buyer.buyerID and request.catID = catagory.catID ORDER BY RID DESC");

            $results = $this->db->resultSet();
            return $results;
        }

        public function getAllRequestByID($ID){
            $this->db->query('SELECT * FROM request,catagory WHERE buyerID = :ID and request.catID = catagory.catID ORDER BY RID DESC');
            $this->db -> bind(':ID',$ID);
    
            $results = $this->db->resultSet();
            return $results;
        }

        public function updateRequestStatus($status,$RID){
            $this->db->query("UPDATE request SET reqStatus = :reqStatus WHERE RID = :RID");
            $this->db -> bind(':reqStatus',$status);
            $this->db -> bind(':RID',$RID);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }
        public function getPendingRequests(){
            $this->db->query("SELECT * FROM request,buyer,catagory WHERE reqStatus = 'pending' and request.buyerID = buyer.buyerID and request.catID = catagory.catID ORDER BY RID DESC");

            $results = $this->db->resultSet();
            return $results;
        }
    }
?>