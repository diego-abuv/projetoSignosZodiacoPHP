// Captura o evento de carregamento do DOM para só depois executar a função
// Garante que o conteúdo da página esteja 100% carregado antes de iniciar as funcionalidades
document.addEventListener('DOMContentLoaded', function() {
    // Referencias ao formulário e campo de data
    const form = document.getElementById('signo-form');
    const inputData = document.getElementById('data_nascimento');

    // Referencias aos elementos Modal (pop-up de alerta)
    const alertaModal = new bootstrap.Modal(document.getElementById('alertaModal'));
    const modalMensagem = document.getElementById('modalMensagem');


    if (form) {
        form.addEventListener('submit', function(event) {
            // Verifica se o campo de data está vazio (se não tem valor)
            if (!inputData.value) {
                // Impede o envio do formulário
                event.preventDefault();
                
                modalMensagem.textContent = 'Por favor, insira sua data de nascimento para a consulta.';
                
                // Exibe o pop-up
                alertaModal.show();
                
                // foca no campo após o pop-up ser fechado (requer evento modal)
                document.getElementById('alertaModal').addEventListener('hidden.bs.modal', function () {
                    inputData.focus();
                }, { once: true });
            }

            const dataNascimento = new Date(inputData.value);
            const dataAtual = new Date();
            const anoAtual = dataAtual.getFullYear();

            // Verifica se a data é futura
            if (dataNascimento > dataAtual) {
                event.preventDefault();
                
                modalMensagem.textContent = 'Datas futuras não são permitidas.';
                
                // Exibe o pop-up
                alertaModal.show();
                
                // foca no campo após o pop-up ser fechado (requer evento modal)
                document.getElementById('alertaModal').addEventListener('hidden.bs.modal', function () {
                    inputData.focus();
                }, { once: true });
            }
        });        
    }
});