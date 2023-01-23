<?php

// Initialize the session
session_start();
ob_start();

// require_once "db_config.php";
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="public/main.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <?php
    include 'leftmenu.php';

    ?>
    <!-- (MAIN) PAGE -->

    <main id="pgmain">
        <?php

        $page = 'main.php';
        if (!isset($_GET['page'])) {
            $page = 'main.php';
        } else {
            $page = $_GET['page'] . '.php';
        }
        if (file_exists($page)) {
            include_once($page);
        } else {
            include_once('notfound.html');
        }


        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>