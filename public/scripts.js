function editar(id, txt_tarefa) {

    // criar um form de edição 

    let form = document.createElement('form');
    form.action = 'tarefa_controller.php?acao=update';
    form.method = 'post';
    form.className = 'row';

    // criar um input para entrada de texto
    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'task';
    input.className = 'form-control col-9';
    input.value = txt_tarefa;

    // criar um input hidden para guardar o id da tarefa 
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id
    let button = document.createElement('button');
    button.className = 'btn btn-sm btn-outline-info col-3';
    button.innerHTML = 'Atualizar'
    
    form.appendChild(input);
    form.appendChild(inputId);
    form.appendChild(button);
    //selecionando a div tarefa
    tarefa = document.getElementById('tarefa_' + id);
    tarefa.innerHTML = ''
    tarefa.insertBefore(form, tarefa[0]);
}


function remover(idTarefa) {
   
    let response =  window.confirm('Deseja remover esta tarefa?');
    if (response) {
        // remover tarefa do banco de dados
        location.href = 'todas_tarefas.php?acao=remover&id='+idTarefa;  
     } 
}

function alterarStatus (idTarefa,tarefa) {
    let response = window.confirm('A tarefa: "' + tarefa + '" foi concluída?');
    if (response) {
        location.href = 'todas_tarefas.php?acao=alterarStatus&id='+idTarefa;
    }
} 