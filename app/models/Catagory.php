<?php 
    class Catagory{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
    public function addCatagory($data){
        $this->db -> query('INSERT INTO catagory(catName,catDescription,image) VALUES(:catName,:catDescription,:image)');
        $this->db -> bind(':catName',$data['catName']);
        $this->db -> bind(':catDescription',$data['catDescription']);
        $this->db -> bind(':image',$data['image']);



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
    public function getCatagorybyID($ID){
        $this->db->query("SELECT * FROM catagory where catID = :ID");
        $this->db -> bind(':ID',$ID);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCatagorybyName($ID){
        $this->db->query("SELECT * FROM catagory where catName = :ID");
        $this->db -> bind(':ID',$ID);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCatsForLanding(){
        $this->db->query("SELECT * FROM catagory order by catID desc limit 3");

        $results = $this->db->resultSet();
        return $results;
    }
    }
?>