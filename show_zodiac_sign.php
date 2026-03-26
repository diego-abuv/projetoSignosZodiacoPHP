<?php 
    // Função para converter a data do XML (dd/mm) para um objeto DateTime com o ano especificado
    function criarDataComAno($strData, $ano) {
        // O formato 'd/m/Y H:i:s' com ' 00:00:00' garante que a comparação seja feita a partir do início do dia.
        return DateTime::createFromFormat('d/m/Y H:i:s', $strData . '/' . $ano . ' 00:00:00');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include('header.php'); ?>
</head>
<body class="zodiac-background">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="text-center" style="width: 50rem;">
            
                <?php
                // Verifica se a data de nascimento foi enviada pelo formulário
                if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
                    
                    // 1. Pega a data de nascimento do POST e cria um objeto DateTime
                    $dataNascimento = new DateTime($_POST['data_nascimento']);
                    $anoNascimento = $dataNascimento->format('Y');

                    // 2. Carrega o arquivo XML com os signos
                    // O caminho para o arquivo XML é construído a partir do diretório do script atual (__DIR__)
                    // para garantir que funcione independentemente de onde o script é chamado.
                    $signos = simplexml_load_file(__DIR__ . '/db/signos.xml');
                    $signoEncontrado = null;

                    // 3. Itera sobre cada signo no XML
                    foreach ($signos->signo as $signo) {
                        $dataInicio = criarDataComAno($signo->dataInicio, $anoNascimento);
                        $dataFim = criarDataComAno($signo->dataFim, $anoNascimento);

                        // 4. Lógica para signos que cruzam a virada do ano (ex: Capricórnio)
                        // Se a data de início for maior que a data de fim (ex: Início em Dezembro, Fim em Janeiro)
                        if ($dataInicio > $dataFim) {
                            // Verifica se a data de nascimento está no intervalo do final do ano
                            // ou no intervalo do começo do ano seguinte.
                            if ($dataNascimento >= $dataInicio || $dataNascimento <= $dataFim) {
                                $signoEncontrado = $signo;
                                break; // Encontrou o signo para o loop
                            }
                        } 
                        // 5. Lógica para os demais signos
                        else {
                            if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
                                $signoEncontrado = $signo;
                                break; // Encontrou o signo para o loop
                            }
                        }
                    }

                    // 6. Exibe o resultado
                    if ($signoEncontrado) {
                        echo "<h1 class='card-title display-1 text-white'>" . htmlspecialchars($signoEncontrado->signoNome) . "</h1>";
                        echo "<p class='card-text text-white mt-5'>" . htmlspecialchars($signoEncontrado->descricao) . "</p>";
                    } else {
                        echo "<p class='text-danger'>Não foi possível determinar o seu signo. Por favor, tente novamente.</p>";
                    }
                } else {
                    echo "<p class='text-warning'>Por favor, retorne e insira uma data de nascimento válida.</p>";
                }
                ?>
                <a href="index.php" class="btn btn-secondary btn-lg mt-5">Voltar</a>
            
        </div>
    </div>
</body>
</html>
