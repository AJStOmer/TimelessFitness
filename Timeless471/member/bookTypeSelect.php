<?php
    session_start();
    if(empty($_SESSION['user']))
{
    header("Location: /Timeless471/login/loginForm.php");
    die("Redirecting to login.php");
}
if($_POST['choice'] == 'Machine'){
    unset($_SESSION['bookRes']);
    $sel = $_POST['choice'];
    echo "$sel";
    header('Location: /Timeless471/member/machineBook.php');
}else if ($_POST['choice'] == 'Court'){
    unset($_SESSION['bookRes']);
    $sel = $_POST['choice'];
    echo "$sel";
    header('Location: /Timeless471/member/courtBook.php');
}elseif($_POST['choice'] == 'Personal Trainer Session'){
    unset($_SESSION['bookRes']);
    $sel = $_POST['choice'];
    echo "$sel";
    header('Location: /Timeless471/member/PtSeshBook.php');
}else{
    header('Location: /Timeless471/member/book.php');
}
?>
