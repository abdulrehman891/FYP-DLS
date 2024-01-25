<?php

if(!(isset($_SESSION))){
    session_start();
}
session_destroy();
header('Location: ../../index.php')


// session_start();
// session_destroy();
// header('Location:../lawyerLogin.php')
?>