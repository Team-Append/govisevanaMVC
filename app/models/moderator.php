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
}