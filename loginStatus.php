<?
    session_start();
    if($_SESSION['loginSystem']!=true){ // Verificar se o usuário está deslogado
        header("Location: index.php?error=deslogado");
    }
?>