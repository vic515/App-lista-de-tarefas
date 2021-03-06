<?php

require '../private/tarefa.model.php';
require '../private/tarefa.service.php';
require '../private/conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
    try {
            
            $tarefa = new Tarefa () ;
            $tarefa->__set('tarefa',$_POST['tarefa']);

            $conexao = new Conexao();
            $tarefaService = new TarefaService( $conexao, $tarefa);
            $tarefaService->inserir();
            header('Location: nova_tarefa.php?inclusao=1');
        } catch (Exception $e) {
            header("Location: nova_tarefa.php?inclusao=0");
            $erro = $e->getCode();
        }
   
} else if ($acao == 'recuperar') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao,$tarefa);
    $listaDeTarefas = $tarefaService->recuperar();
} else if ($acao == 'update') {
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['task'])
            ->__set('id',$_POST['id']);
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao,$tarefa);

    $tarefaService->atualizar();
    header('Location: todas_tarefas.php');
} else if ($acao == 'remover') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao,$tarefa);
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $tarefaService->remover($_GET['id']);
    header('Location: todas_tarefas.php');
} else if ($acao == 'alterarStatus') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao,$tarefa);
    $tarefaService->alterarStatus($_GET['id']);
    header('Location: todas_tarefas.php');
}
?>