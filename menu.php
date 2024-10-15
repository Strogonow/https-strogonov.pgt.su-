<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="menu">
        <?php
        if (isset($_SESSION['auth']) && isset($_SESSION['id_role']) && $_SESSION['auth'] == true) {
            if (isset($_SESSION['auth']) && isset($_SESSION['id_role']) && $_SESSION['id_role'] == 2) { ?>
                <a href="index.php">"Эх, прокачу"</a>
                <a class="exit" href="exit.php">Выход</a>
                <a class="private" href="admin.php"><?php echo $_SESSION['login']; ?></a>
            <?php }
            if (isset($_SESSION['auth']) && isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1) { ?>
                <a href="index.php">"Эх, прокачу"</a>
                <a class="exit" href="exit.php">Выход</a>
                <a class="private" href="private.php"><?php echo $_SESSION['login']; ?></a>
            <?php
            }
        } else { ?>
            <a href="index.php">"Эх, прокачу"</a>
            <a href="login.php">Вход</a>
            <a href="registration.php">Регистрация</a>
        <?php } ?><br>
    </div>
</body>

</html>