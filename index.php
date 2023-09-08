<?
    session_start();
    require_once('cop.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterControl - Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
</head>
<body>
    <header class="menu">
        <h2 class="logoMenu">
            MasterControl
        </h2>
    </header>

    <main>
        <section class="boxLogin">
            <h3 class="titleLogin">Login</h3>
            <div class="bars"></div>
            <form action="validarLogin.php" method="post" class="formLogin">
                <div class="nameUser">
                    <label for="nameUser">
                        <span>Usuário: </span>
                        <input type="text" name="nameUser" id="nameUser" placeholder="Digite aqui seu usuário*">
                    </label>
                </div>

                <div class="passUser">
                    <label for="passUser">
                        <span>Senha:</span>
                        <input type="password" name="passUser" id="passUser" placeholder="Digite aqui sua senha*">
                    </label>
                </div>
                
                <div class="manterLogado">
                    <label for="manterLog">
                        <input type="checkbox" name="manterLog" id="manterLog">
                        <span><a href="desenvolvimento.php" class="manterLogadoButton">Manter logado</a></span>
                    </label>
                </div>
                <?
                if(isset($_GET) && isset($_GET['login']) == 'no'){?>
                    <div class="errorMessage">
                        <h3>Dados não cadastrados no sistema, tente novamente!</h3>
                    </div>
                <?}else if(isset($_GET) && isset($_GET['error']) == 'deslogado'){?>
                    <div class="errorMessage">
                        <h3>Usuário não logado, faça o login novamente!</h3>
                    </div>
                <?}else if(isset($_GET) && isset($_GET['sucess']) == 'userCreated'){?>
                    <div class="sucessMessage">
                        <h3>Usuário criado com sucesso!</h3>
                    </div>
                <?}?>
                <div class="buttonLogin">
                    <button type="submit">Logar</button>
                </div>
            </form>
            <div class="boxRegister">
                <div class="bars"></div>
                
                <div class="registerButton">
                    <h2 class="titleRegister">
                        Ainda não tem conta?
                    </h2>
                    <a href="register.php" class="registerLink">Cadastre-se</a>
                </div>
            </div>

            <div class="usersLoginAutomatic">  
                <div class="loginUser">
                    <i class="fa-solid fa-user fa-2x loginIcon"></i>    
                    Logar como Usuário
                </div>

                <div class="loginAdm">
                    <i class="fa-solid fa-lock fa-2x loginIcon"></i>
                    Logar como Administrador
                </div>
            </div>
        </section>
    </main>

    <script>
        $(document).ready(function(){
            $('.loginUser').click(function(){
                $('#nameUser').val('testClient'); // Colocar valor Versus no nome
                $('#passUser').val('123'); // Colocar valor 123 na senha
            })

            $('.loginAdm').click(()=>{
                $('#nameUser').val('testAdmin');
                $('#passUser').val('123')
            })
        })
    </script>
    <!-- JS FontAwesone -->
    <script src="https://kit.fontawesome.com/c8eb2ed6f5.js" crossorigin="anonymous"></script>
</body>
</html>