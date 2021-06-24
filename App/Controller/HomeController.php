<?php
    class HomeController
    {
        public function index()
        {
            try {
                $colecPostagens = Cadastro::selecionaTodos();

                var_dump($colecPostagens);
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }
?>