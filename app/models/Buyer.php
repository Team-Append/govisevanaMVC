<?php 
    class Buyer{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        public function findBuyerByEmail($email){
            //prepared statement
            $this->db -> query('SELECT * FROM buyer WHERE email = :email');

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
            $this->db -> query('INSERT INTO buyer(NIC,password,name,address,tpno,email) VALUES(:NIC,:password,:name, :address, :tpno , :email)');
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
        public function login($email,$password){
            $this->db-> query('SELECT * FROM buyer WHERE email= :email ');

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
    }
?>