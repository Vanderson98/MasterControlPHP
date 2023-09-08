<?
    $customers = []; // Guardar os clients 
    $dbCustomersOpen = fopen('database.txt', 'r');

    // Enquanto tiver registros ou linhas, o codigo executará
    while(!feof($dbCustomersOpen)){
        $register = fgets($dbCustomersOpen); // Pegar cada linha
        $customers[] = $register; // Guardas as linhas que pegou
    }

    fclose($dbCustomersOpen);
?>