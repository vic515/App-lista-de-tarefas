<?php

class Conexao {

    private $host = 'localhost';
    private $dbname = 'db_app_lista_tarefas';
    private $usuario = 'root' ; //usuario do banco de dados  // Database user
    private $senha = ''; // senha do banco de dados // Database password

     public function conectar() {
        try {
            $conexao = new PDO( 
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->usuario,
                $this->senha
            );

            return $conexao;


        } catch (PDOException $e) {
            echo '<p> Houve algo inesperado! Código do erro: '.$e->getCode().'</p><hr>'.$e->getMessage();
        }
    }
}


?>