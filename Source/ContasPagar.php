<?php
    class ContasPagar extends Conn
    {
        //  Atributos
        public array $formDados;
        public object $conn;

        //  Metodos 
        public function cadastrar():bool{
            $this->conn = $this->connect();
            $query_conta_pagar = "INSERT INTO contas_pagars 
                (nome, valor, vencimento, obs, created) 
            VALUES 
                (:nome, :valor, :vencimento, :obs, NOW())";
            $cad_conta_pagar = $this->conn->prepare($query_conta_pagar);
        }
    }
?>