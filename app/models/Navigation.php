<?php 
    class Navigation{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }

        public function navigation($str){
           

                $this->db->query("SELECT * FROM 'stock' WHERE title='$str'");

                $results = $this->db->resultSet();
                return $results;
   
            }
        }
    
?>