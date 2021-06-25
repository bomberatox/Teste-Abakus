<?php
    class CadastroController
    {
        public function index($params)
        {
            try {
                $cadastro = Cadastro::selecionaPorId($params);


                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('single.html');

                $parametros = array();
                $parametros['cadastro'] = $cadastro;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }
?>