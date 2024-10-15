<?php
session_start();
$_SESSION['auth'] = null;
Header("Location: index.php");
?>