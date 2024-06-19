<?php
    session_start();
    session_destroy();
    header('Location: /Timeless471/login/loginForm.php');
?>