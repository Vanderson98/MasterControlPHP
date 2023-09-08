<?php
    $arquivoOriginal = 'database.txt';
    
    // Verifique se os valores de nome e organização estão sendo recebidos corretamente
    if (isset($_POST['nomeCliente']) && isset($_POST['organizacaoCliente'])) {
    $nomeRemove = $_POST['nomeCliente'];
    $organizacaoRemove = $_POST['organizacaoCliente'];

    $linhas = file($arquivoOriginal);
    $arquivo = fopen($arquivoOriginal, 'w');

    if ($arquivo === false) {
        die("Erro ao abrir o arquivo");
    }

    $linhaExcluida = false;

    foreach ($linhas as $linha) {
        if (!$linhaExcluida && strpos($linha, $nomeRemove) !== false && strpos($linha, $organizacaoRemove) !== false) {
            $linhaExcluida = true;
            continue; // Pula a escrita desta linha, excluindo-a
        }
        fwrite($arquivo, $linha);
    }

    fclose($arquivo);

    if ($linhaExcluida) {
        echo "Linha excluída com sucesso.";
    } else {
        echo "Linha não encontrada ou erro ao excluir.";
    }
    }else{
        try{
            throw new Exception('O arquivo com esses nomes não existe!');
        }catch(Exception $e){
            echo "<h3>$e</h3>";
        }
        die();
    }
    header('location: home.php?removeRow=sucess');
?>
