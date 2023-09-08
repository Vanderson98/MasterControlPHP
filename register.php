<?
require_once('cop.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterControl - Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="menu">
        <h2 class="logoMenu">
            MasterControl
        </h2>
    </header>

    <main>
        <section class="boxRegisterUser">
            <h3 class="registerTitle">Register</h3>
            <div class="bars"></div>
            <form method="post" action="registerUser.php">
                <div class="nameUser">
                    <label for="nameUser">
                        <span>Usuário:</span>
                        <input type="text" name="nameUser" id="nameUser">
                    </label>
                </div>

                <div class="passUser">
                    <label for="passUser">
                        <span>Senha:</span>
                        <input type="password" name="passUser" id="passUser">
                    </label>
                </div>

                <div class="passUser">
                    <label for="confirmPass">
                        <span>Confirme a senha:</span>
                        <input type="password" name="confirmPass" id="confirmPass">
                    </label>
                </div>
                    <?if(isset($_GET) && isset($_GET['error'])  == 'userCreated'){?>
                        <div class="errorMessage">
                            <h3>
                                Nome de usuário já existe, tente outro!
                            </h3>
                        </div>
                    <?}else if(isset($_GET) && isset($_GET['errorPass']) == 'passNoConfirmed'){?>
                        <div class="errorMessage">
                            <h3>
                                Confirme a senha corretamente e <br>tente novamente!
                            </h3>
                        </div>
                    <?}else if(isset($_GET) && isset($_GET['register']) == 'error'){?>
                        <div class="errorMessage">
                            <h3>
                                Insira os dados corretamente e <br>tente novamente!
                            </h3>
                        </div>
                    <?}?>
                <div class="buttonLogin">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
            
            <div class="boxRegister">
                <div class="bars"></div>
                <div class="registerButton">
                    <h2 class="titleRegister">
                        Ja tem conta?
                    </h2>
                    <a href="index.php" class="registerLink">Logar</a>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
