<?php
require_once("./model/ApiService.php");
$weatherData = null;
$error = null;
if (isset($_POST['submit']))
{
    $cidade = htmlspecialchars(trim($_POST['city']));
    if (!empty($cidade)) {
        $apiService = new ApiService;
        $apiService->getKey();
        $apiService->setCity($cidade);
        $apiCall = "https://api.openweathermap.org/data/2.5/weather?q=". urlencode($apiService->getCity())."&appid="
        . $apiService->getKey(). "&lang=pt_br";
        $apiData = file_get_contents($apiCall);
        if ($apiData) {
            $weatherData = json_decode($apiData);
            $weatherData->main->temp = $weatherData->main->temp - 273.15;
        } else {
            $error = "Não foi possível obter os dados do tempo. Por favor, tente novamente.";
        }
    } else {
        $error = "Por favor, insira o nome de uma cidade.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsão do Tempo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body style="background-color: aliceblue;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card p-xl-5 shadow-lg" style="width: 34rem; border: none;">
            <h4 class="text-center"><i class="bi bi-cloud-sun" style="font-size:4rem"></i></h4>
            <h4 class="text-center">Previsão do Tempo</h4>
            <div class="card-body">
                <form method="post" class="p-2 row g-3">
                    <div class="col-12">
                        <input type="text" class="form-control p-3" name="city" placeholder="Cidade">
                    </div>
                    <input type="submit" name="submit" class="btn btn-success d-flex justify-content-center" value="Visualizar">
                    <a href="index.html" class="text-center justify-content-center" style="text-decoration: none; color: #111;">Voltar</a>
                </form>
                
                <?php if ($weatherData): ?>
                    <div class="mt-4">
                        <h5 class="text-center">Tempo em <?php echo htmlspecialchars($weatherData->name); ?></h5>
                        <p class="text-center">Temperatura: <?php echo htmlspecialchars(round($weatherData->main->temp)); ?>°C</p>
                        <p class="text-center">Descrição: <?php echo htmlspecialchars($weatherData->weather[0]->description); ?></p>
                    </div>
                <?php elseif ($error): ?>
                    <div class="mt-4 alert alert-danger text-center">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
