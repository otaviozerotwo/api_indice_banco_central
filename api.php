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

        $dataInicial = $_GET['dataInicial'];
        $dataFinal = $_GET['dataFinal'];
    }

    $api_url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.$codigoSerie/dados?formato=json&dataInicial=$dataInicial&dataFinal=$dataFinal";

    // Define a chave de acesso da API, se necessário
    // $api_key = "sua_chave_de_acesso";

    // Configura as opções de contexto para a solicitação
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: PHP',
            // Adicione a chave de acesso, se necessário
            // 'header' => "Authorization: Bearer $api_key",
        ],
    ];

    $context = stream_context_create($options);

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
            $total = 0;
            foreach ($data as $entry){
                $total = $total + $entry['valor'];
                // echo "Data: " . $entry['data'] . "<br>";
                // echo "Valor: " . $entry['valor'] . "<br>";
                // echo "Sub total: " . $total . "<br>";
                // echo "<br>";
            }
            $total = ($total/100)+1;
            echo "Índice: " . $total . "<br>";
        }else{
            echo "Erro na decodificação JSON.";
        }
    }else{
        echo "Erro na solicitação à API.";
    }
?>