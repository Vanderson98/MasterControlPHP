<?
    require('loginStatus.php');

    session_destroy();
    header('location: index.php');
?>