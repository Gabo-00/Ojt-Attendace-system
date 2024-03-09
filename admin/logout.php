<?php 

session_start();

unset($_SESSION['Userlogin']);
unset($_SESSION['Access']);


echo header("Location: login.php");