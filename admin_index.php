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
        <title><?php print $main->getSiteName() ?>: Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $main->getStyles() ?>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <h1><a href="admin">Admin</a></h1>
            </div>
            <div id="navbar">
                <h1>Browse</h1>
                <?php
                print $admin->getNavbar();
                ?>
            </div>
            <div id="main">

            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>