<?php
session_start();
include("ConnectionDB.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Вход</title>
</head>

<body>
    <?php include("menu.php"); ?>

    <form class="authorisation" action="log.php" method="post">
        <h2>Авторизация</h2>
        <label for="">Email</label><br><input name="email" type="email"><br>
        <label for="">Пароль</label><br><input name="password" type="password"><br>
        <button class="btn-submit" type="submit">Отправить</button> <!-- сдвинуть к левому краю -->
    </form>
    <?php include "Footer.php"; ?>
</body>

</html>