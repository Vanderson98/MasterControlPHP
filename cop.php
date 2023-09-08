<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .rodapeCop{
            position: fixed;
            bottom: 0;
            right: -1rem;
        }
        .rodapeCop h2{
            background-color:#f6f6f6;
            font-size: 1rem;
            border-top-left-radius:.5rem;
            padding:.2rem .3rem;
            padding-right:.5rem;
            letter-spacing: .5px;
            color: #25252575;
            text-align: end;
            margin-right: .8rem;
        }
    </style>
</head>
<body>
    <?
        // Só para não bugar o PHP usando a linguagem HACK
    ?>

    <footer class="rodapeCop">
        <h2>&copy; Vanderson Souza - <span class='ano'></span></h2>
    </footer>
    <script>
        let ano = document.querySelector('.ano');

        let dataAtual = new Date();
        let anoAtual = dataAtual.getFullYear(); // Pegar o ano completo

        ano.innerHTML=anoAtual; // Mostrar o ano completo
    </script>
</body>
</html>