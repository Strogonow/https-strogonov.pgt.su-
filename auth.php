<?php
session_start();
include("ConnectionDB.php");

$FIO = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$driver_license = $_POST['driver_license'];

if (!empty($FIO) && !empty($email) && !empty($password) && !empty($phone) && !empty($driver_license)) {
    $passwordhash = md5($password);
    if (crypt($password, $passwordhash)) {    //сверка пароля с хешем
        $query = "INSERT INTO `user`(`password`, `full_name`, `email`, `phone`, `driver_license`, `id_role`)
            VALUES ('$passwordhash', '$FIO', '$email', '$phone', '$driver_license', '1')";
        $result = mysqli_query($link, $query);

        $_SESSION['hash'] = $passwordhash;
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $email;

        $user = "SELECT * from user where email = $email AND password =" . $_SESSION['hash'];
        echo "Вы зарегистрировались";
        Header("Location: index.php");
    }
}
?>