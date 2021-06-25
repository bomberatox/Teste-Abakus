<?php
    class Cadastro
    {
        public static function selecionaTodos(){
            $con = Connection::getConn();

            $sql = "SELECT * FROM cadastro ORDER BY id DESC";
            $sql = $con->prepare($sql);
            $sql->execute();

            $resultado = array();

            while ($row = $sql->fetchObject('Cadastro')){
                $resultado[] = $row;
            }

            if (!$resultado){
                throw new Exception("Não foi encontrado nenhum cadastro no banco");
            }
            return $resultado;
        }
        public static function selecionaPorId($idCad)
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM cadastro WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $idCad, PDO::PARAM_INT);
            $sql->execute();

            $resultado = $sql->fetchObject('Cadastro');

            if (!$resultado){
                throw new Exception("Não foi encontrado nenhum cadastro no banco");
            }

            return $resultado;
        }
    }
?>