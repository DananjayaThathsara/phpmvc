<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!empty($_SESSION['system_logged_status']) && !empty($_SESSION['system_logged_email']) &&
        !empty($_SESSION['system_logged_uname']) && !empty($_SESSION['server_domain_user']) &&
        $_SERVER['SERVER_NAME'] . $_SESSION['system_logged_uname'] == $_SESSION['server_domain_user']) {
    if ($_SESSION['system_logged_access_level'] == 1) {
        header('Location:home.php');
    }
} else {

    /* include all the settings */
    include_once '../site_config.php';
    /* admin config must load through site_config.php. If there is a fault, execute direct include */
    include_once 'admin_config.php';



    include 'login_themes/th_03/login.php';
}
?>