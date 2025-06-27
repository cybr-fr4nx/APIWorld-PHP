<?php
require_once __DIR__ . '/../includes/header.php';

$ciudad = $_POST['ciudad'] ?? 'Santo Domingo';
$datos_clima = null;
$error = '';

if (!empty($ciudad)) {
  $url = 'https://wttr.in/' . urlencode($ciudad) . '?format=j1';

  $json = @file_get_contents($url);
  if ($json) {
    $datos = json_decode($json, true);
    if (isset($datos['current_condition'][0])) {
      $datos_clima = $datos['current_condition'][0];
    } else {

      $error = "No se encontraron datos del clima para esa ciudad.";
    }
  } else {
    $error = "No se pudo conectar con el servicio del clima.";
  }
}
?>

<div class="container mt-5">
  <h1 class="mb-4">☀️ Clima en tiempo real</h1>

  <form method="POST" class="mb-4">
    <div class="mb-3">
      <label for="ciudad" class="form-label">Ciudad:</label>
      <input type="text" name="ciudad" id="ciudad" class="form-control" required
        value="<?= htmlspecialchars($ciudad) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Consultar clima</button>
  </form>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php elseif ($datos_clima): ?>
    <div class="card text-center">
      <div class="card-body">
        <h4>🌍 <?= htmlspecialchars($ciudad) ?></h4>
        <p><strong>Temperatura:</strong> <?= $datos_clima['temp_C'] ?> °C</p>
        <p><strong>Condición:</strong> <?= $datos_clima['weatherDesc'][0]['value'] ?></p>
        <p><strong>Humedad:</strong> <?= $datos_clima['humidity'] ?>%</p>
        <p><strong>Viento:</strong> <?= $datos_clima['windspeedKmph'] ?> km/h</p>
      </div>
    </div>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>