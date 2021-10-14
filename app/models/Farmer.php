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
            $this->db -> query('INSERT INTO farmer(NIC,password,name,address,tpno,email) VALUES(:NIC,:password,:name, :address, :tpno , :email)');
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
    }
?>