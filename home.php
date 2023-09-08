<?
    require_once('loginStatus.php');
    require('viewCustomers.php');
    require_once('cop.php');

    $_SESSION['nameCustomersAll'] = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterControl - Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="menu" style="justify-content: space-between !important; padding-left:1rem; padding-right: 1rem;">
        <a href="logoff.php" class="userLogoff">Sair</a>
        <h2 class="logoMenu" style="margin-right: -15%;">
            MasterControl
        </h2>
        <h3 class="userNameMenu">Seja Bem Vindo<span class="nameUserMenu"><? echo $_SESSION['nameUser']?></span></h3>
    </header>

    <main>
        <section class="homeBox">
            <form action="registerCustomer.php" method="post">
                <div class="titleHome">
                    <img src="assets/img/userImg.png" alt="User icon" class="userIcon">
                    <h2>Customer management system</h2>
                </div>
                <div class="bars"></div>

                <div class="addCustomer customerAdd">
                    <label for="customerName">
                        <span>Nome do cliente:</span>
                        <input type="text" name="customerName" id="customerName">
                    </label>

                    <label for="customerAdress">
                        <span>Endereço:</span>
                        <input type="text" name="customerAdress" id="customerAdress">
                    </label>

                    <label for="customerOrganization">
                        <span>Organização:</span>
                        <input type="text" name="customerOrganization" id="customerOrganization">
                    </label>

                    <label for="customerEmail">
                        <span>Email:</span>
                        <input type="email" name="customerEmail" id="customerEmail">
                    </label>

                    <label for="customerMobile">
                        <span>Telefone:</span>
                        <input type="number" name="customerMobile" id="customerMobile">
                    </label>
                </div> 

                <?if(isset($_GET) && isset($_GET['error']) == 'dadosEmpty'){?>
                    <div class="customerAdd errorMessage">
                        <h3>Insira os dados corretamente e <br>tente novamente!</h3>
                    </div>
                <?}else if(isset($_GET) && isset($_GET['number']) == 'error'){?>
                    <div class="customerAdd errorMessage">
                        <h3>Número de telefone incorreto, <br>tente novamente!</h3>
                    </div>
                <?}?>
                <div class="customerAdd">
                    <button type="submit">Adicionar registro</button>
                </div>
            </form>
        </section>
        <div class="bars"></div>
        <section class="dataCustomer">
            <h3 class="titleCustomer">Dados Clientes:</h3>
            <table class="tableCustomer">
                <thead>
                    <tr class="tableHead">
                        <th class="tableItem">Nome</th>
                        <th class="tableItem">Endereço</th>
                        <th class="tableItem">Organização</th>
                        <th class="tableItem">Email</th>
                        <th class="tableItem">Telefone</th>
                        <th class="tableItem">Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?
                    foreach($customers as $customerView){
                        $_SESSION['customersViews'] = explode('#', $customerView);
                        if($_SESSION['id'] == 'Client'){ // Ver se é client que está logando
                            if($_SESSION['idPerfil'] != $_SESSION['customersViews'][0]){ // Se o id de perfil for diferente, ele continua o codigo
                                continue;
                            }
                        }
                        if(count($_SESSION['customersViews']) < 5){
                            continue;
                        }

                        array_push($_SESSION['nameCustomersAll'], [
                            'nameCustomers' => $_SESSION['customersViews'][1],
                            'organizationCustomers' => $_SESSION['customersViews'][3]]
                        );
                ?>
                <tr class="tableBody">
                    <td class="tableItem">
                        <?=$_SESSION['customersViews'][1]?>
                    </td>
                    <td class="tableItem">
                        <?=$_SESSION['customersViews'][2]?>
                    </td>
                    <td class="tableItem">
                        <?=$_SESSION['customersViews'][3]?>
                    </td>
                    <td class="tableItem">
                        <?=$_SESSION['customersViews'][4]?>
                    </td>
                    <td class="tableItem">
                        <?=$_SESSION['customersViews'][5]?>
                    </td>
                    <td class="tableItem">
                        <div class="removeClient">
                            <form action="removeRow.php" method="POST">
                                <!-- Input com valores para excluir -->
                                <input type="hidden" name="nomeCliente" value="<?=$_SESSION['customersViews'][1]?>">
                                <input type="hidden" name="organizacaoCliente" value="<?=$_SESSION['customersViews'][3]?>">
                                
                                <button type="submit">
                                <i class="fa-solid fa-trash"></i>
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?}?>
                </tbody>
            </table>
        </section>
    </main>

    <?if(isset($_GET) && isset($_GET['sucess']) == true){?>
        <div class="boxSucess">
            <h3>Cliente registrado com sucesso!</h3>
        </div>
    <?}else if(isset($_GET) && isset($_GET['customer']) == 'registered'){?>
        <div class="boxSucess boxRegistered">
            <h3>Cliente e organização já existe em nosso sistema!</h3>
        </div>
    <?}else if(isset($_GET) && isset($_GET['removeRow']) == 'sucess'){?>
        <div class="boxSucess boxRegistered">
            <h3>Cliente removido do sistema!</h3>
        </div>
    <?}?>

    <!-- JS FontAwesone -->
    <script src="https://kit.fontawesome.com/c8eb2ed6f5.js" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>