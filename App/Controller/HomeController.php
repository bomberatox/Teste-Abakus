<?php
    class HomeController
    {
        public function index()
        {
            try {
                $colecCadastros = Cadastro::selecionaTodos();

                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('cadastros.html');

                $parametros = array();
                $parametros['cadastros'] = $colecCadastros;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }
?>