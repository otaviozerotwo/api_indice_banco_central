<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $codigoSerie = $_GET['codigoSerie'];

        if($codigoSerie == '11 - SELIC'){
            $codigoSerie = '11';
        }elseif($codigoSerie == '4175 - IGPM'){
            $codigoSerie = '4175';
        }elseif($codigoSerie == '11426 - IPCA'){
            $codigoSerie = '11426';
        }

        $dataInicialNormal = $_GET['dataInicial'];
        $dataFinalNormal = $_GET['dataFinal'];

        $dataInicial = date('d/m/y', strtotime($dataInicialNormal));
        $dataFinal = date('d/m/y', strtotime($dataFinalNormal));

        $valor = $_GET['valor'];
    }

    $api_url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.$codigoSerie/dados?formato=json&dataInicial=$dataInicial&dataFinal=$dataFinal";

    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: PHP',
        ],
    ];

    $context = stream_context_create($options);

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Atualizador de Contratos</title>
    <!-- import css interno  -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="w-100 m-auto form-container">
        <div class="border border-primary rounded p-5">
            <div class="text-align-center">
                <h3 class="h1 d-flex justify-content-center mb-5"> $ Resultado $</h3>
            </div>

            <div class="text-center">
                <?php
                    // Faz a solicitação à API
                    $response = file_get_contents($api_url, false, $context);

                    // Verifica se a solicitação foi bem-sucedida
                    if($response !== false){
                        // Decodifica a resposta JSON para um array associativo
                        $data = json_decode($response, true);

                        // Verifica se a decodificação foi bem-sucedida
                        if($data !== null){
                            // A resposta agora está no formato de um array associativo
                            // Você pode acessar os dados conforme necessário
                            $indicePercentual = 0;
                            foreach ($data as $entry){
                                $indicePercentual = $indicePercentual + $entry['valor'];
                            }
                            
                            $indicePercentual = ($indicePercentual / 100) + 1;
                            
                            echo '<div class="h3 mb-5">Índice: ' . number_format($indicePercentual, 4) . '</div>';

                            $valorAtualizado = $indicePercentual * $valor;

                            echo '<div class="h3">Valor atualizado: R$ ' . number_format($valorAtualizado, 2, ',', '.') . '</div>';
                        }else{
                            echo '<div class="h3">Erro na decodificação JSON.</div>';
                        }
                    }else{
                        echo '<div class="h3">Erro na solicitação à API.</div>';
                    }
                ?>
            </div>
        </div>

        <div class="form-floating">
            <div class="my-3">
                <a class="btn btn-primary w-100" href="index.php">Voltar</a>
            </div>
        </div>
    </main>
</body>
</html>

