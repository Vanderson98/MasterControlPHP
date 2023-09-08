<?
    $dadosCliente = [
        'nomeCliente' => $_POST['customerName'],
        'endereçoCliente' => $_POST['customerAdress'],
        'organizaçãoCliente' => $_POST['customerOrganization'],
        'emailCliente' => $_POST['customerEmail'],
        'telefoneCliente' => $_POST['customerMobile']
    ];

    foreach($dadosCliente as $dados){
        if(empty($dados)){
            header('location: home.php?error=dataEmpty');
            die();
        }
    }

    if(strlen($dadosCliente['telefoneCliente']) < 11 || strlen($dadosCliente['telefoneCliente']) > 11){
        header('location: home.php?number=error');
        die();
    }

    session_start();

    $dataBaseCustomer = fopen('database.txt', 'a');
    
    // Realize a substituição de '#' por '.' após abrir o arquivo, para evitar problemas de duplicação
    $customerName = str_replace('#', '.', $dadosCliente['nomeCliente']);
    $customerAdress = str_replace('#', '.', $dadosCliente['endereçoCliente']);
    $customerOrganization = str_replace('#', '.', $dadosCliente['organizaçãoCliente']);
    $customerEmail = str_replace('#', '.', $dadosCliente['emailCliente']);
    $customerMobile = str_replace('#', '.', $dadosCliente['telefoneCliente']);

    $textToData = $_SESSION['idPerfil'].'#'.$customerName.'#'.$customerAdress.'#'.$customerOrganization.'#'.$customerEmail.'#'.$customerMobile.PHP_EOL;

    // echo $_SESSION['id'];
    fwrite($dataBaseCustomer, $textToData); // Escrever os dados no arquivo
    fclose($dataBaseCustomer);
    
    header('location: home.php?sucess=true');    
?>