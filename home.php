<?
    require_once('loginStatus.php');
    require('viewCustomers.php');
    include('removeLines.php'); 
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
                <?require_once('form.php');?>
                
                <div class="customerAdd">
                    <button type="submit">Adicionar cliente</button>
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
                            'organizationCustomers' => $_SESSION['customersViews'][3],
                            'adressCustomers' => $_SESSION['customersViews'][2]]
                        );  // Ver se ja tem algum cliente cadastrado no sistema com nome e organização igual
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
                        <?
                            $telefone = $_SESSION['customersViews'][5];
                            $telefone = preg_replace("/[^0-9]/", "", $telefone); // Remover caracteres não numéricos
                            $telefone = "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 5) . "-" . substr($telefone, 7); // Formatar numero para aparecer em formato brasileiro
                            echo $telefone;
                        ?>
                    </td>
                    <td class="tableItem">
                        <div class="removeClient">
                            <form action="removeRow.php" method="POST">
                                <!-- Input com valores para excluir -->
                                <input type="hidden" name="nomeCliente" value="<?=$_SESSION['customersViews'][1]?>">
                                <input type="hidden" name="organizacaoCliente" value="<?=$_SESSION['customersViews'][3]?>">
                                
                                <button type="submit" class="removeButton">
                                    <i class="fa-solid fa-trash"></i>
                                    Excluir
                                </button>
                            </form>

                            <form action="editRow.php" method="post">
                                <!-- Input com valor para editar -->
                                <input type="hidden" name="idCliente" value="<?=$_SESSION['customersViews'][0]?>">
                                <input type="hidden" name="nomeCliente" value="<?=$_SESSION['customersViews'][1]?>">    
                                <input type="hidden" name="enderecoCliente" value="<?=$_SESSION['customersViews'][2]?>">
                                <input type="hidden" name="organizacaoCliente" value="<?=$_SESSION['customersViews'][3]?>">
                                <input type="hidden" name="emailCliente" value="<?=$_SESSION['customersViews'][4]?>">
                                <input type="hidden" name="telefoneCliente" value="<?=intval($_SESSION['customersViews'][5])?>">  

                                <button type="submit" class="editButton">
                                    <i class="fa-solid fa-file-pen"></i>
                                    Editar
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
    <?}else if(isset($_GET) && isset($_GET['edit']) == 'sucess'){?>
        <div class="boxSucess boxEditedSucess">
            <h3>Cliente editado no sistema!</h3>
        </div>
    <?}else if(isset($_GET) && isset($_GET['editC']) == 'error'){?>
        <div class="boxSucess boxEditedError">
            <h3>Cliente não editado no sistema!</h3>
        </div>
    <?}?>

    <!-- JS FontAwesone -->
    <script src="https://kit.fontawesome.com/c8eb2ed6f5.js" crossorigin="anonymous"></script>
    
    <script src="assets/js/index.js"></script>
</body>
</html>