<?php
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
    header('Location: ../index.php');
    exit();
}

print_r($_SESSION);
?>
