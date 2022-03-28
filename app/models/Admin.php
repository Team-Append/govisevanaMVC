<?php 
    class Admin{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        
        public function login($email,$password){
            $this->db-> query('SELECT * FROM admin WHERE email= :email ');

            $this->db -> bind(':email', $email);

            $row = $this->db-> single();

            if(isset($row->password)){
            $hashedPassword = $row -> password;

            if(password_verify($password, $hashedPassword))
            {
                return $row;
            } else {
                return false;
            }
        }else{
            return false;
        }
        } 
        public function register($data){
            $this->db -> query('INSERT INTO admin(NIC,password,name,address,tpno,email) VALUES(:NIC,:password,:name, :address, :tpno , :email)');
            $this->db -> bind(':NIC',$data['NIC']);
            $this->db -> bind(':password',$data['password']);
            $this->db -> bind(':name',$data['name']);
            $this->db -> bind(':address',$data['address']);
            $this->db -> bind(':tpno',$data['tpno']);
            $this->db -> bind(':email',$data['email']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        } 
        public function addModerator($data){
            $this->db -> query('INSERT INTO moderator(ModName,ModEmail,ModTP,Password) VALUES(:modName,:modEmail,:modTP,:password)');
            $this->db -> bind(':modName',$data['modName']);
            $this->db -> bind(':modEmail',$data['modEmail']);
            $this->db -> bind(':modTP',$data['modTP']);
            $this->db -> bind(':password',$data['password']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function getAllModerators(){
            $this->db->query('SELECT * FROM moderator');
            
    
            $results = $this->db->resultSet();
            return $results;
        }

        public function farmerList(){
            $this->db->query('SELECT * FROM farmer');

            $results = $this->db->resultSet();
            
            return $results;
        }

        public function buyerList(){
            $this->db->query('SELECT * FROM buyer');

            $results = $this->db->resultSet();
            
            return $results;
        }

        public function deleteBuyer(){
            $this->db->query('DELETE FROM buyer WHERE buyerID = :buyerID');
            
            $results = self::$_connection->prepare($this->db);
            $results->execute(['buyerID'=>$this->buyerID]);
            return $results->rowCount();
        }
        public function getAdminByID($id){
            $this->db->query('select * from admin where AID = :adminID');
            $this->db -> bind(':adminID',$id);

            $results = $this->db->single();
            
            return $results;
        }
       
        public function updateProfile($data,$id){
            $this->db->query("UPDATE admin SET name = :name , NIC = :NIC , address = :address , email = :email , tpno = :tpno WHERE AID =:ID");
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
 
    }
