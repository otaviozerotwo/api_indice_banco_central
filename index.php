<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div>
            <h1>Atualizador de Contratos</h1>
        </div>

        <div>
            <form action="api.php" method="GET">
                <div>
                    <label for="codigoSerie">Selecione um índice</label>
                    <select name="codigoSerie">
                        <option>11 - SELIC</option>
                        <option>4175 - IGPM</option>
                        <option>11426 - IPCA</option>
                    </select>
                </div>

                <div>
                    <label for="dataInicial">Data início contrato:</label>
                    <input type="date" id="dataInicial" name="dataInicial">
                </div>

                <div>
                    <label for="dataFinal">Data fim contrato:</label>
                    <input type="date" id="dataFinal" name="dataFinal">
                </div>

                <div>
                    <button type="submit">Calcular</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

