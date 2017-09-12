<?php 
    ini_set('display_errors', '1');
    session_start();

    // User認証
    if (!isset($_SESSION["user"]["name"])||!isset($_POST["message"])) {
        header('location: index.php');
        exit();
    }
    $path = "./chat.json";
    
    $msg = $_POST["message"];
    $msg_obj = ["name"=>$msg["name"],"color"=>$msg["color"],"message"=>$msg["message"]];

    $messages = json_decode(file_get_contents($path));
    array_push($messages, $msg_obj);
    $messages = json_encode($messages);
    file_put_contents($path, $messages);

    header('location: index.php');
    exit();
