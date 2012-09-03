<?php

namespace Music;

include_once "lib/config.php";
if (isset($_REQUEST['user'])) {
    $admin = new \Admin($db);

    if ($admin->checkLogin($_POST) == true) {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];

        header('Location: ../admin');
    } else {
        $failure = true;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php print $title ?>: Admin</title>
    </head>
    <body>
        <form action="../login" method="POST">
            <fieldset>
                <legend>Login</legend>
                Username: <input name="user" type="text" size="30" />
                <br />
                Password: <input name="pass" type="password" size="30" />
                <br />
            </fieldset>
            <br />
            <input type="submit" value="Submit" />
        </form>

        <?php
        if ($failure) {
            print "<p>Login failed</p>";
        }
        ?>
    </body>
</html>