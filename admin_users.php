<?php

namespace Music;

include_once "lib/config.php";

$admin = new \Admin($db);

if ($admin->checkLogin($_SESSION) == false) {
    header('Location: admin/login/');
    exit;
}
$main = new \Main($db);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php print $main->getSiteName() ?>: Admin Users</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $main->getStyles() ?>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h1><a href="admin">Admin: Users</a></h1>
            </div>
            <div id="navbar">
                <h1>Browse</h1>
                <?php
                print $admin->getNavbar();
                ?>
            </div>
            <div id="main">
                <table border="1px">
                    <tr>
                        <td>Username</td>
                        <td>Name</td>
                        <td>Email</td>
                    </tr>
                <?php
                $query = "SELECT * FROM `users`;";
                $result = mysql_query($query, $db);
                while ($current = mysql_fetch_assoc($result)) {
                    print "<tr><td><a href=\"user/". $current['user_id']. "\">". $current['username']. "</a></td><td>". $current['name']. "</td><td>". $current['email']. "</td></tr>";
                }
                ?>
                </table>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>