<?php

namespace Music;

include_once "lib/config.php";

$admin = new \Admin($db);

if ($admin->checkLogin($_SESSION) == false) {
    header('Location: admin/login/');
    exit;
}
?>
