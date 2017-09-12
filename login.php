<?php 
    ini_set('display_errors', '1');
    session_start();

    // Redirect with Session data
    if (isset($_SESSION["user"]["name"])) {
        header('location: index.php');
        exit();
    } elseif (!empty($_POST["user"]["name"]) && !empty($_POST["user"]["color"])) {
        $_SESSION["user"] = $_POST["user"];
        header('location: index.php');
        exit();
    }

    $title = "Login";
    require_once("./header.php");
?>
<main class="container">
    <div class="row">
    <h1 style="color: red;">LoginPage</h1>
    </div>
    <div class="row">
    <form class="form col-sm-8 mx-auto" action="login.php" method="post">
        <div class="form-group">
            <label>Your Name</label>
            <input class="form-control" type="text" name="user[name]">
        </div>
        <div class="form-group">
            <label>Choise Your Color</label>
            <select class="form-control" name="user[color]">
                <option value="black">Black</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
            </select>
        </div>
        <button class="form-control" type="submit">Entering a room</button>
    </form>
    </div>
</main>
<?php require_once("./footer.php"); ?>