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
        $query = '
            select
                t.id, s.status, tarefa
             from 
                 tb_tarefas as t
             left join tb_status as s on (t.id_status = s.id)
             ';
        $statement = $this->conexao->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function atualizar($newTask, $idTask) { // update
        $query = "
                UPDATE `tb_tarefas` SET `tarefa` = :newTarefa 
                where id = :id_tarefa
        ";
        $statement = $this->conexao->prepare($query);
        $statement->bindValue(':newTarefa', $newTask);
        $statement->bindValue(':id_tarefa', $idTask);
        $statement->execute();
    }

    public function remover($idTask) { // remove
        $query = '
                delete
                        from tb_tarefas
                where
                        id = :id_tarefa';
        $statement = $this->conexao->prepare($query);
        $statement->bindValue(':id_tarefa', $idTask);
        $statement->execute();
    }
}

?>