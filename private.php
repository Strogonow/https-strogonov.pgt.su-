<?php
session_start();
include("ConnectionDB.php");

if ($_SESSION['auth'] == true) { ?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <title>Личный кабинет</title>
    </head>

    <body>
        <?php include "menu.php"; ?>
        <h2>Ваши бронирования</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Название машины</th>
                    <th>Дата бронирования</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT user.full_name, car.name, request.booking_date, status.status_name 
                          FROM user, car, request, status
                          WHERE user.id = " . $_SESSION['id'] . " 
                          AND user.id = request.id_user 
                          AND car.id = request.id_car 
                          AND status.id = request.id_status";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["full_name"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row['booking_date'] . "</td>";
                        echo "<td>" . $row['status_name'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><td colspan="4">Нет данных для отображения</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <?php include "Footer.php"; ?>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
} ?>