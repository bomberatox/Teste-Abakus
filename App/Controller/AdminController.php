<?php
    class AdminController
    {
        public function index()
        {
            try {
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('admin.html');

                $objCadastros = Cadastro::selecionaTodos();

                $parametros = array();;
                $parametros['cadastros'] = $objCadastros;

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
            try {
                Cadastro::insert($_POST);

                echo '<script>alert("Cadastro realizado com sucesso!");</script>';
                echo '<script>location.href="https://localhost/_teste%20abakus/?pagina=admin&metodo=index"</script>';
            } catch(Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="https://localhost/_teste%20abakus/?pagina=admin&metodo=create"</script>';
            }
        }

        public function atualizar($paramId){
            try {
                $loader = new \Twig\Loader\FilesystemLoader('app/View');
                $twig = new \Twig\Environment($loader);
                $template = $twig->load('update.html');

                $cadastro = Cadastro::selecionaPorId($paramId);

                $parametros = array();;
                $parametros['cadastro'] = $cadastro;

                $conteudo = $template->render($parametros);
                echo $conteudo;
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }

        public function update(){
            try {
                Cadastro::update($_POST);

                echo '<script>alert("Atualização realizada com sucesso!");</script>';
                echo '<script>location.href="https://localhost/_teste%20abakus/?pagina=admin&metodo=index"</script>';
            } catch(Exception $e){
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="https://localhost/_teste%20abakus/?pagina=admin&metodo=atualizar&id='.$_POST['id'].'"</script>';
            }
        }
    }
?>