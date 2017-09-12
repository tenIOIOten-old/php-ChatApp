<?php
    ini_set('display_errors', '1');
    session_start();

    // User認証
    if (!isset($_SESSION["user"]["name"])) {
        header('location: index.php');
        exit();
    }

    $title = "Chat";
    require_once("./header.php");
    $user = $_SESSION["user"];

    $path = "./chat.json";
    $messages = json_decode(file_get_contents($path));
?>
<main class="container">
    <h1 style="color: <?= $user["color"]?>;">ChatPage</h1>
    <a href="./logout.php">Log Out</a>
    <section class="container col-sm-8 mx-aut">
        <ul>
            <?php foreach ($messages as $msg) : ?>
            <li style="color:<?= $msg->color ?>">
                Name: <?= $msg->name ?><br>
                Message: <?= $msg->message ?>
            </li>
            <?php endforeach; ?> 
        </ul>
        <form class="form" action="input.php" method="post">
        <input type="hidden" name="message[name]" value="<?= $user["name"]?>">
        <input type="hidden" name="message[color]" value="<?= $user["color"]?>">
            <div>
            Name: <?= $user["name"]?>,
            Color: <?= $user["color"]?>
            </div>
            <div class="form-group">
                <label>Message</label>
                <input class="form-control" type="text" name="message[message]">
            </div>
            <button class="form-control" type="submit">Entering a room</button>
        </form>
    </section>
</main>
<?php 
require("./footer.php");
