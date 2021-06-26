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
        public static function insert($dadosCad){
            if (empty($dadosCad['nome']) OR empty($dadosCad['idade']) OR empty($dadosCad['cpf'])){
                throw new Exception("Preencha todos os dados!");

                return false;
            }

            $con = Connection::getConn();
            
            $sql = 'INSERT INTO cadastro (nome, idade, cpf) VALUES (:nome, :idade, :cpf)';
            $sql = $con->prepare($sql);
            $sql->bindValue(':nome', $dadosCad['nome']);
            $sql->bindValue(':idade', $dadosCad['idade']);
            $sql->bindValue(':cpf', $dadosCad['cpf']);
            $res = $sql->execute();

            if ($res == 0){
                throw new Exception("Falha ao inserir novo cadastro");
                
                return false;
            }
            
            return true;
        }

        public static function update($params){
            if (empty($dadosCad['nome']) OR empty($dadosCad['idade']) OR empty($dadosCad['cpf'])){
                throw new Exception("Falha ao atualizar cadastro");

                return false;
            }

            $con = Connection::getConn();

            $sql = "UPDATE cadastro SET nome = :nome, idade = :idade, cpf = :cpf WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':nome', $params['nome']);
            $sql->bindValue(':idade', $params['idade']);
            $sql->bindValue(':cpf', $params['cpf']);
            $sql->bindValue(':id', $params['id']);
            $res = $sql->execute();

            if ($res == 0){
                throw new Exception("Falha ao atualizar cadastro");
                
                return false;
            }
            
            return true;
        }
    }
?>