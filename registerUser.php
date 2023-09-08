<?
   session_start();
    $_SESSION['usersDB'] = [
        ['nameUser' => 'versusAdmin', 'passUser' => '123', 'ID' => 'Admins'],
        ['nameUser' => 'Versus', 'passUser' => '123', 'ID' => 'Client']
    ];

    $_POST['nameUser'];
    $_POST['passUser'];
    $_POST['confirmPass'];

    class NewUser{
        public function __construct( // Receber os nomes de cada variavel
            public string $nameUser = '',
            public string $passUser = '',
            public string $id = 'Client' // Será setado automaticamente o id de client
        ){}

        public function setUser(){ 
            array_push($_SESSION['usersDB'], [ // Adicionar elementos no ultimo array
                'nameUser' => $this->nameUser,
                'passUser' => $this->passUser,
                'ID' => $this->id
            ]);
        }
    }

    print_r($_POST);

    if(empty($_POST['nameUser']) || empty($_POST['passUser']) || empty($_POST['confirmPass'])){
        header('Location: register.php?register=error');
        die();
    }

    foreach($_SESSION['usersDB'] as $namesUser){
        if($namesUser['nameUser'] == $_POST['nameUser']){ // Ver se existe algum cliente cadastrado com esse nome
            header('location: register.php?error=userCreated');
            die();
        }else{        
            if($_POST['confirmPass'] == $_POST['passUser']){ // Ver se a senha é a mesma
                $userNew = new NewUser($_POST['nameUser'], $_POST['passUser']); 
            }else{ // Senão for mostra a mensagem de erro e mata o script
                header('location: register.php?errorPass=passNoConfirmed');
                die();
            }
        }    
    }

    $userNew->setUser();
    header('location: index.php?sucess=userCreated');
    echo "<pre>";
        print_r($_SESSION['usersDB']);
    echo "</pre>";
?>