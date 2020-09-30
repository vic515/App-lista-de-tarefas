<?php 


// CRUD
class TarefaService {
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao,Tarefa $tarefa)
    {
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }



    public function inserir() { // create
        $query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
        $statement = $this->conexao->prepare($query);
        $statement->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $statement->execute();
    }

    public function recuperar() { // read
        $query = 'select id, id_status, tarefa from tb_tarefas';
        $statement = $this->conexao->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function atualizar() { // update

    }

    public function remover() { // remove

    }
}

?>