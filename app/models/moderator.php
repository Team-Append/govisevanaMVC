<?php
class Moderator{
    private $db;

    public function __construct()
    {
        $this->db= new Database;
    }
public function login($email,$password){
            echo "bla bla";
            $this->db-> query('SELECT * FROM moderator WHERE ModEmail= :email ');

            $this->db -> bind(':email', $email);

            $row = $this->db-> single();


            if(isset($row->Password)){
                echo "bla bla";  
            $hashedPassword = $row -> Password;
                echo $hashedPassword;
                echo $password;
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

    public function createNotificationOfFarmer($farmerID,$description,$date){

        $this->db -> query("INSERT INTO moderatorfarmernotification(farmerID,description,notifdate,status) VALUES(:farmerID,:desc,:date,'unread')");
        $this->db -> bind(':farmerID',$farmerID);
        $this->db -> bind(':desc',$description);
        $this->db -> bind(':date',$date);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

        
    }

    public function createNotificationOfBuyer($buyerID,$description,$date){

        $this->db -> query("INSERT INTO moderatorbuyernotification(buyerID,description,notifdate,status) VALUES(:buyerID,:desc,:date,'unread')");
        $this->db -> bind(':buyerID',$buyerID);
        $this->db -> bind(':desc',$description);
        $this->db -> bind(':date',$date);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

        
    }

    public function getAllNotification(){
        $this->db->query("SELECT * FROM moderatorfarmernotification");

        $results = $this->db->resultSet();
        return $results;
        
    }
}