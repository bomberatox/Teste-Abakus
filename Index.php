<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    /* IMPORTAÇÕES */
    require_once 'app/Core/Core.php';
    require_once 'app/Controller/HomeController.php';
    require_once 'app/Controller/ErroController.php';
    require_once 'app/Model/Cadastro.php';
    require_once 'lib/Database/Connection.php';

    $template = file_get_contents('App/Template/Estrutura.html');

    ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
    ob_end_clean();

    $tplPronto = str_replace('{{cadastros}}', $saida, $template);
    echo $tplPronto;
    ?>
</body>
</html>