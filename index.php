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
        <div class="d-flex mb-5 justify-content-center">
            <h1>Atualizador de Contratos</h1>
        </div>

        <div class="form-floating">
            <form action="api.php" method="GET" autocomplete="off">
                <div class="mb-3">
                    <label for="codigoSerie" class="mb-1">Selecione um índice:</label>
                    <select name="codigoSerie" class="form-select">
                        <option>11 - SELIC</option>
                        <option>4175 - IGPM</option>
                        <option>11426 - IPCA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dataInicial" class="mb-1">Data início contrato:</label>
                    <input type="date" id="dataInicial" name="dataInicial" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="dataFinal" class="mb-1">Data fim contrato:</label>
                    <input type="date" id="dataFinal" name="dataFinal" class="form-control" required>
                </div>

                <div>
                    <label for="valor" class="mb-1">Valor do contrato:</label>
                    <input type="text" id="valor" name="valor" class="form-control" required>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary w-100">Calcular</button>
                </div>

                <div id="resultado">
                    <span></span>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

