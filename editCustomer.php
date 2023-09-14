<?
    session_start();
    include('removeLines.php'); // Remover linhas brancas

    $arquivoOg = 'database.txt';

    $dadosAtualizados = [$_SESSION['idCliente'],
        $_POST['customerName'], 
        $_POST['customerAdress'], 
        $_POST['customerOrganization'],
        $_POST['customerEmail'],
        $_POST['customerMobile']
    ];

    foreach($dadosAtualizados as $dado){ // Ver se existe algum dado que não tenha nada escrito
        if(strlen($dado) == 0){
            die(header('location: home.php?data=empty')); // Voltar para o edit
        }
    }
    
    $linhas = file($arquivoOg);
    $arquivoTemp = fopen($arquivoOg, 'w'); // Abrir arquivo para editar

    if($arquivoTemp == false){ // Verificar se o arquivo existe
        die('Arquivo não existe');
    }

    $linhaEditada = false; // Arquivo fica falso enquanto não editar
    
    foreach($linhas as $linha){
        $dadosLinhas = explode('#', $linha);
        echo $dadosLinhas[0].'<br>';
        if(
            
            $dadosLinhas[1] == $_SESSION['nomeCliente'] &&
            $dadosLinhas[2] == $_SESSION['enderecoCliente'] &&
            $dadosLinhas[3] == $_SESSION['organizacaoCliente'] &&
            $dadosLinhas[4] == $_SESSION['emailCliente'] &&
            $dadosLinhas[5] == $_SESSION['telefoneCliente']
            ){ // Verificar se os dados são iguais aos que estão registrados
            
            for($i = 0; $i <= 5; $i++){

                $dadosLinhas[$i] = $dadosAtualizados[$i]; // Substituir os dados
            }
        }

        $linhaEditada = true; // Mostrar que o arquivo foi editado

        fwrite($arquivoTemp, implode('#', $dadosLinhas).PHP_EOL); // Escrever os dados no arquivo
    }



    fclose($arquivoTemp); // Fechar arquivo
    if($linhaEditada){
        header('location: home.php?edit=sucess');
    }else{
        header('location: home.php?editC=error');
    }
?>