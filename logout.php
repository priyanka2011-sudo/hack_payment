<?php

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(session_is_registered['loginId']){
        unset($_SESSION['loginId']);
        session_destroy($_SESSION['loginId']);
        header('Location: login.php');
}
?>