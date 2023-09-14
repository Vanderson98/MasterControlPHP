<?
    require_once('loginStatus.php');
    require_once('cop.php');
    require('removeLines.php');

    if(isset($_POST['telefoneCliente'])){
        $_SESSION['telefoneCliente'] = $_POST['telefoneCliente']; // Variavel que vai receber o numero do cliente
    }

   $_SESSION['idCliente'] = $_POST['idCliente'];
   $_SESSION['nomeCliente'] = $_POST['nomeCliente'];
   $_SESSION['enderecoCliente'] = $_POST['enderecoCliente'];
   $_SESSION['organizacaoCliente'] = $_POST['organizacaoCliente'];
   $_SESSION['emailCliente'] = $_POST['emailCliente'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterControl - Edit</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
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
        <section class="boxEdit">
            <form action="editCustomer.php" method="post">
            
            <?require_once('form.php')?>

            <div class="customerAdd editButtons">
                <a href="home.php" class="backHome">Voltar</a>    
                <button type="submit" class="editButton">Salvar</button>
            </div>
            </form>
        </section>
    </main>

    <!-- FontAwesone JS -->
    <script src="https://kit.fontawesome.com/c8eb2ed6f5.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(()=>{
            $('#customerName').val('<?=$_SESSION['nomeCliente']?>')
            $('#customerAdress').val('<?=$_SESSION['enderecoCliente']?>')
            $('#customerOrganization').val('<?=$_SESSION['organizacaoCliente']?>')
            $('#customerEmail').val('<?=$_SESSION['emailCliente']?>')
            let valorPHP = <?=$_SESSION['telefoneCliente']?>; // Transforma esse valor numa variavel JS
            $('#customerMobile').val(valorPHP); // Mostra a variavel que foi criada em JS
        })
    </script>
    <script src="assets/js/index.js"></script>
</body>
</html>