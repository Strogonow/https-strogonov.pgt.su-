<?php
session_start();
include "ConnectionDB.php";

if ($_SESSION["auth"] == true) { ?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Панель администрирования</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <?php include "menu.php"; ?>
        <table>
            <tr>
                <th>Номер</th>
                <th>Полное имя</th>
                <th>Автомобиль</th>
                <th>Дата бронирования</th>
                <th>Текущий статус</th>
                <th>Изменить статус</th>
            </tr>
            <?php
            $query = "SELECT request.id, user.full_name, car.name, request.booking_date, status.status_name, request.id_status
                      FROM user
                      JOIN request ON user.id = request.id_user
                      JOIN car ON request.id_car = car.id
                      JOIN status ON request.id_status = status.id";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['status_name']; ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                            <select name="new_status">
                                <option value="3">Одобрено</option>
                                <option value="2">Отклонено</option>
                            </select>
                            <button type="submit" class="btn-submit">Сохранить</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['request_id']) && isset($_POST['new_status'])) {
            $requestID = (int)$_POST['request_id'];
            $newStatus = (int)$_POST['new_status'];


            $query = "UPDATE request SET id_status = '$newStatus' WHERE id = '$requestID'";

          
            if (mysqli_query($link, $query)) {
                echo "<p>Статус успешно изменен!</p>";
            } else {
                echo "<p>Ошибка при изменении статуса: " . mysqli_error($link) . "</p>";
            }
        }
        ?>
        <?php include "Footer.php"; ?>
    </body>

    </html>
<?php } else {
    header("Location: index.php");
} ?>