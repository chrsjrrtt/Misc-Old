<?php

class Admin {

    private $user_id;
    private $logged_in;
    private $db;

    public function __construct($inDb) {
        $this->db = $inDb;
    }

    public function checkLogin($inArray) {
        $pass = $inArray['pass'];
        $user = $inArray['user'];

        $query = "SELECT * FROM `users` WHERE `username`='" . $user . "';";
        $result = mysql_query($query, $this->db);
        $data = mysql_fetch_assoc($result);
        if ($data['password'] == hash("sha512", $pass)) {
            return true;
        }
        return false;
    }

}

?>
