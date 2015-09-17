<?php
session_start();
unset($_SESSION['member']);
$_SESSION['current_page'] = 'member_page';
header('Location: ../index.php');
?>