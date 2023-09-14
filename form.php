<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
    <body>
        <div class="titleHome">
            <img src="assets/img/userImg.png" alt="User icon" class="userIcon">
            <h2>Sistema de gerenciamento de clientes</h2>
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
    </body>
</html>