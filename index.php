<?php
session_start();
include "ConnectionDB.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>Аренда машин</title>
</head>

<body>
    <?php include "menu.php";
    if (isset($_SESSION['auth']) && $_SESSION['auth'] == true && isset($_SESSION['id'])) {
    ?>
        <div class="content">
            <h2>Аренда машин</h2>
            <form action="" method="post">
                <label for="car_name">Выберите модель авто</label><br>
                <select name="car_name" id="car_name" required>
                    <?php
                    $carQuery = "SELECT id, name FROM car";
                    $carResult = mysqli_query($link, $carQuery);
                    if (!$carResult) {
                        die("Ошибка при получении данных о машинах: " . mysqli_error($link));
                    }
                    while ($carRow = mysqli_fetch_assoc($carResult)) {
                        echo '<option value="' . $carRow['name'] . '">' . $carRow['name'] . '</option>';
                    }
                    ?>
                </select><br>
                <label for="booking_date">Дата бронирования</label><br>
                <input type="date" name="booking_date" id="booking_date" required><br>
                <input type="submit" value="Арендовать">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $car_name = $_POST['car_name'];
                $booking_date = $_POST['booking_date'];

                $carQuery = "SELECT id FROM car WHERE name = '" . mysqli_real_escape_string($link, $car_name) . "'";
                $carResult = mysqli_query($link, $carQuery);

                if ($carResult && $carRow = mysqli_fetch_assoc($carResult)) {
                    $carId = $carRow['id'];
                    $query = "INSERT INTO request (id_user, id_car, id_status, booking_date) VALUES ('" . $_SESSION['id'] . "', '" . $carId . "', '1', '" . $booking_date . "')";
                    if (mysqli_query($link, $query)) {
                        echo "<p>Аренда успешно оформлена!</p>";
                    } else {
                        echo "<p>Ошибка при оформлении аренды: " . mysqli_error($link) . "</p>";
                    }
                } else {
                    echo "<p>Автомобиль не найден.</p>";
                }
            }
            ?>
        </div>
    <?php
    } else {
        echo "<p>Войдите в аккаунт</p>";
    }
    ?>
    <?php include "Footer.php"; ?>
</body>

</html>