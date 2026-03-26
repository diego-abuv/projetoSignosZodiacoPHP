<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include('header.php'); ?>
</head>
<body class="index.background">
    
    <!-- Conteúdo principal da página -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card text-center shadow-sm" style="width: 25rem;">

            <div class="card-header bg-primary text-white">
                <h2>Descubra o seu Signo</h2>
            </div>
            <div class="card-body">
                <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Consultar</button>
                </form>
            </div>

        </div>
    </div>
    
    <!-- Elemento modal para a mensagem de alerta (pop-up) -->
    <div class="modal fade" id="alertaModal" tabindex="-1" aria-labelledby="alertaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">

            <div class="modal-content text-center">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="alertaModalLabel">Atenção!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalMensagem"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Entendi</button>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>