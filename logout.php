<?php 
    session_start();

    $_SESSION = [];

    // Destroy Cookies
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time() - 42000);
    }

    // Destroy Sessoin
    session_destroy();

    header('location: index.php');
    exit();
