<?php
session_start();
include("ConnectionDB.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>Вход</title>
</head>

<body>
    <?php include("menu.php"); ?>
    
    <form class="authorisation" action="auth.php" method="post">
        <h2>Регистрация</h2>
        <label for="">ФИО</label><br><input name="full_name" type="text"><br>
        <label for="">Номер телефона</label><br><input name="phone" type=""><br>
        <label for="">Email</label><br><input name="email" type="email"><br>
        <label for="">Пароль</label><br><input name="password" type="password"><br>
        <label for="">Серия и номер водительского удостоверения</label><br><input name="driver_license" type="text"><br>
        <button class="btn-submit" type="submit">Отправить</button> <!-- сдвинуть к левому краю -->
    </form>
    <?php include "Footer.php"; ?>
</body>

</html>