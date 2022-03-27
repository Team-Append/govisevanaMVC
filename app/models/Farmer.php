<?php 
    class Farmer{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        public function findFarmerByEmail($email){
            //prepared statement
            $this->db -> query('SELECT * FROM farmer WHERE email = :email');

            //binding email with email variable
            $this->db -> bind(':email',$email);

            //check if email already exists

            if($this->db->rowcount() > 0){
                return true;
            }else{
                return false;
            }
        } 
        public function register($data){
            $this->db -> query('INSERT INTO farmer(NIC,password,name,address, province, district, tpno,email) VALUES(:NIC,:password,:name, :address,:province,:district, :tpno , :email)');
            $this->db -> bind(':NIC',$data['NIC']);
            $this->db -> bind(':password',$data['password']);
            $this->db -> bind(':name',$data['name']);
            $this->db -> bind(':address',$data['address']);
            $this->db -> bind(':province',$data['province']);
            $this->db -> bind(':district',$data['district']);
            $this->db -> bind(':tpno',$data['tpno']);
            $this->db -> bind(':email',$data['email']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function login($email,$password){
            $this->db-> query('SELECT * FROM farmer WHERE email= :email ');

            $this->db -> bind(':email', $email);

            $row = $this->db-> single();
            echo $email;
            echo $password;
            if(isset($row->password)){
            $hashedPassword = $row -> password;

            if(password_verify($password, $hashedPassword))
            {
                return $row;
            } else {
                echo "false";
                return false;
            }
        }else{
            return false;
        }
        }  

        
        public function myOrders(){
            
        }
        public function getAllFarmers(){
            $this->db->query('SELECT * FROM farmer');

            $results = $this->db->resultSet();
            
            return $results;
        }

        
        

        public function getFarmerByID($id){
            $this->db->query("SELECT * FROM farmer WHERE farmerID=:ID");
            $this->db -> bind(':ID',$id);
            $results = $this->db->single();
            return $results;
        }

        public function updateProfile($data,$id){
            $this->db->query("UPDATE farmer SET name = :name , NIC = :NIC , address = :address , email = :email , tpno = :tpno WHERE farmerID =:ID");
            $this->db -> bind(':ID',$id);
            $this->db -> bind(':name',$data['name']);
            $this->db -> bind(':NIC',$data['NIC']);
            $this->db -> bind(':address',$data['address']);
            $this->db -> bind(':email',$data['email']);
            $this->db -> bind(':tpno',$data['tpno']);
            
            

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        
        
        public function deleteFarmer($farmerID){
            $this->db->query("DELETE FROM farmer WHERE farmerID = :ID");
            $this->db -> bind(':ID',$farmerID);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }
    }
?>