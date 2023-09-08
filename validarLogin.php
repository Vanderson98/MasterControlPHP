<?
    session_start();
    if($_SESSION['usersDB'] < 3){
        require_once('usersDB.php'); // Banco de dados Usuários
    }

    echo "<pre>";
        print_r($_SESSION['usersDB']);
    echo "</pre>";

    $_POST['nameUser'];
    $_POST['passUser'];
    
    if(empty($_POST['nameUser']) || empty($_POST['passUser'])){
        header('location: index.php?login=empty');
        die();
    }

    $_SESSION['loginSystem'] = false;
    $_SESSION['nameUser'] = null;

    foreach($_SESSION['usersDB'] as $usersLogin){
        if($usersLogin['nameUser'] == $_POST['nameUser'] && $usersLogin['passUser'] == $_POST['passUser']){
            $_SESSION['loginSystem'] = true;
            $_SESSION['nameUser'] = $_POST['nameUser'];
            $_SESSION['idPerfil'] = $usersLogin['idClient']; // Pegar o id do client que criou
            $_SESSION['id'] = $usersLogin['ID']; // Id adm or client
        }
    }

    if($_SESSION['loginSystem'] == false){
        header("Location: index.php?login=no");
    }else{
        header('Location: home.php');
    }
?>