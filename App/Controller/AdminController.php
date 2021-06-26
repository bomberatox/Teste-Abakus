<?php
    class AdminController
    {
        public function index()
        {
            try {
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('admin.html');

                $parametros = array();;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }

        public function create (){
            try {
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('create.html');

                $parametros = array();;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
        public function insert(){
            var_dump($_POST);
        }
    }
?>