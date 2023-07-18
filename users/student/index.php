<?php
    include_once '../../conn.php';

    session_start();

    if (!isset($_SESSION['student_name'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> HELLO <?php echo $_SESSION['student_name']; ?>!</h1>
    <a href="logout.php" class="text-decoration-none">Logout</a>
</body>
</html>