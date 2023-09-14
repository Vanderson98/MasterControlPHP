<?
    $arquivo = 'database.txt'; // Receber nome do arquivo

    $linhasArquivo = file($arquivo); // Receber arquivo

    $arquivoAbrir = fopen($arquivo, 'w'); // Abrir arquivo

    if($arquivoAbrir === false){ // Se o arquivo for igual a false, não existe
        die('Erro ao abrir arquivo!');
    }

    foreach($linhasArquivo as $linha){ // Percorrer cada linha do arquivo
        if(trim($linha) !== ''){ // Verificar se existe alguma linha em branco e retira eles usando o TRIM
            fwrite($arquivoAbrir, $linha); // Escreve sobre a linha
        }
    }

    fclose($arquivoAbrir); // Fecha o arquivo
?>