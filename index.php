<?php
ini_set('display_errors', '1');
session_start();

if (isset($_SESSION["user"]["name"])) {
    header('location: chat.php');
    exit();
} else {
    header('location: login.php');
    exit();
}
