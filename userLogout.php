<?php 
if(!isset($_SESSION)){
    session_start();
}

unset($_SESSION['user_email']);
header('Location: index.php');


?>