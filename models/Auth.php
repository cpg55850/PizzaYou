<?php
  class Auth {
    private $db;
    private static $user;

    public function __construct() {
      $this->db = new Database;
    }

    public function getUser() {
        return self::$user;
    }

    public function login($email, $pwd) {            
        //Error handlers
        //Check if inputs are empty
        if(empty($email) || empty($pwd)){
            return "Empty fields.";
        } else {
            $this->db->query("SELECT * FROM PIZZA_YOU_users WHERE email = '$email'");
            $user = $this->db->single();
            if(!$user){
                return "No user under that name.";
            } else {
                //De-hashing the password
                $enteredPwdHashed = sha1($pwd);
                if($enteredPwdHashed != $user->password) {
                    return "Wrong email or password.";
                } elseif($enteredPwdHashed == $user->password) {
                    // Create the user
                    self::$user = new User($user->customer_id, $user->username, $user->email, $enteredPwdHashed, $user->type);

                    return self::$user;
                }
            }
        }
    }

    public function logout() {
        $this->db->query('SELECT * FROM PIZZA_YOU_food_item WHERE category = 1');

        $results = $this->db->resultSet();

        return $results;
    }

    public function register() {
        $this->db->query('SELECT * FROM PIZZA_YOU_food_item WHERE category = 2');

        $results = $this->db->resultSet();

        return $results;
    }

    public function isLoggedIn() {
        return isset($_SESSION['customer_id']);
    }
  }