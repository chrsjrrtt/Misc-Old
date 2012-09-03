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
    
    public function getNavbar() {
        $query = "SELECT * FROM `admin_menu` ORDER BY `priority` ASC;";
        $result = mysql_query($query, $this->db);
        $navbar = "";
        $count = 0;
        while($current = mysql_fetch_assoc($result)) {
            if($count > 0 && $count %4 == 0) {
                $navbar .= "<br /><br /><br />";
            }
            $navbar .= "<div class='navcontainer'><a href='admin/". $current['link']. "'><div class='navitem'>". $current['name']. "</div></a></div>";
            $count++;
        }
        return $navbar;
    }

}

?>
