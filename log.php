<?php
session_start();
include "ConnectionDB.php";

if (!empty($_POST['email']) && !empty('password')) {
    $login = $_POST['email'];
    $password = $_POST['password'];
    $query = "Select * from user where email = '$login' ";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        //echo $user['password'] . "<br>";
        $passwordhash = md5($password); ?><br>
<?php
        //echo $passwordhash;

        if ($passwordhash == $user['password'] && $user['id_role'] == 1) {
            $_SESSION['auth'] = true;

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['email'];
            $_SESSION['id_role'] = $user['id_role'];
            Header("Location: index.php");
        }
        if ($passwordhash == $user['password'] && $user['id_role'] == 2) {
            $_SESSION['auth'] = true;

            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['email'];
            $_SESSION['id_role'] = $user['id_role'];
            Header("Location: admin.php");
        } else {
            echo "Неверный логин или пароль";
        }
    }
}
?>