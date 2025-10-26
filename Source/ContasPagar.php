<?php
    class ContasPagar extends Conn
    {
        //  Atributos
        public int $id;
        public array $formDados;
        public object $conn;

        //  Metodos 
        public function cadastrar(): bool{
            //var_dump($this->formDados);
            //  Conectando com o banco de dados
            $this->conn = $this->connect();
            $query_conta_pagar = "INSERT INTO contas_pagars 
                (nome, valor, vencimento, obs, created) 
            VALUES 
                (:nome, :valor, :vencimento, :obs, NOW())";
            $cad_conta_pagar = $this->conn->prepare($query_conta_pagar);

            //  Vinculando os valores
            $cad_conta_pagar->bindParam(':nome', $this->formDados['nome']);
            $cad_conta_pagar->bindParam(':valor', $this->formDados['valor']);
            $cad_conta_pagar->bindParam(':vencimento', $this->formDados['vencimento']);
            $cad_conta_pagar->bindParam(':obs', $this->formDados['obs']);

            //  
            $cad_conta_pagar->execute();
            if($cad_conta_pagar->rowCount()){
                return true;
            }else{
                return false;
            }
        }

        public function listar(): array{
            //  Conectando com o banco de dados
            $this->conn = $this->connect();
            $query_conta_pagars = "SELECT id, nome, valor, vencimento, obs 
                FROM contas_pagars 
                ORDER BY id DESC
                LIMIT 40";
            $result_contas_pagars = $this->conn->prepare($query_conta_pagars);
            $result_contas_pagars->execute();
            $retorno = $result_contas_pagars->fetchAll();
            //var_dump($retorno);
            return $retorno;
        }

        public function visualizar(): array{
            $this->conn = $this->connect();
            $query_conta_pagar = "SELECT id, nome, valor, vencimento, obs
            FROM contas_pagars
            WHERE id =: id
            LIMIT 1";
            $result_contas_pagar = $this->conn->prepare(query_conta_pagar);
            $result_contas_pagar->bindParam(':id', $this->id, PDO::PARAM_INT);
            $result_contas_pagar->execute();
            $retorno = $result_contas_pagar->fetch();
            return $retorno;
        }
    }
?>