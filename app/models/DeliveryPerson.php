<?php 
    class DeliveryPerson{
        private $db;

        public function __construct()
        {
            $this->db= new Database;
        }
        public function findDeliveryPersonByEmail($email){
            //prepared statement
            $this->db -> query('SELECT * FROM deliveryperson WHERE email = :email');

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
            $this->db -> query('INSERT INTO deliveryperson(NIC,password,name,address,tpno,email,province,district,city) VALUES(:NIC,:password,:name, :address, :tpno , :email, :province, :district,:city )');
            $this->db -> bind(':NIC',$data['NIC']);
            $this->db -> bind(':password',$data['password']);
            $this->db -> bind(':name',$data['name']);
            $this->db -> bind(':address',$data['address']);
            $this->db -> bind(':tpno',$data['tpno']);
            $this->db -> bind(':email',$data['email']);
            $this->db -> bind(':province',$data['province']);
            $this->db -> bind(':district',$data['district']);
            $this->db -> bind(':city',$data['city']);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function login($email,$password){
            $this->db-> query('SELECT * FROM deliveryperson WHERE email= :email ');

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
    public function setAreas($data){
        $this->db -> query('INSERT INTO deliveryAreas(deliveryPersonID,areas) VALUES(:deliveryPersonID,:area)');
        $this->db -> bind(':area',$data);
        $this->db -> bind(':deliveryPersonID',$_SESSION['deliveryPersonID']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function setVehicles($data){
        $this->db -> query('INSERT INTO deliveryVehicles(deliveryPersonID,vehicleModel) VALUES(:deliveryPersonID,:vehicleModel)');
        $this->db -> bind(':vehicleModel',$data);
        $this->db -> bind(':deliveryPersonID',$_SESSION['deliveryPersonID']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function setCats($data){
        $this->db -> query('INSERT INTO deliverypersoncatagories(deliveryPersonID,catID) VALUES(:deliveryPersonID,:catID)');
        $this->db -> bind(':catID',$data);
        $this->db -> bind(':deliveryPersonID',$_SESSION['deliveryPersonID']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    }  
?>