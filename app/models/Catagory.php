<?php 
    class Catagory{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    public function addCatagory($data){
        $this->db -> query('INSERT INTO catagory(catName,catDescription) VALUES(:catName,:catDescription)');
        $this->db -> bind(':catName',$data['catName']);
        $this->db -> bind(':catDescription',$data['catDescription']);



        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function getCatagory(){
        $this->db->query("SELECT * FROM catagory");

        $results = $this->db->resultSet();
        return $results;
    }
    }
?>