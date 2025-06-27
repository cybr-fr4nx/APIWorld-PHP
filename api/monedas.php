<?php
require_once __DIR__ . '/../includes/header.php';

$cantidad = $_POST['cantidad'] ?? '';
$resultados = [];

if ($cantidad !== '' && is_numeric($cantidad)) {
  $api_url = "https://api.exchangerate-api.com/v4/latest/USD";
  $json = @file_get_contents($api_url);

  if ($json) {
    $data = json_decode($json, true);

    $monedas_deseadas = [
      'DOP' => '🇩🇴',
      'EUR' => '🇪🇺',
      'MXN' => '🇲🇽',
      'JPY' => '🇯🇵'
    ];

    foreach ($monedas_deseadas as $codigo => $icono) {
      $tasa = $data['rates'][$codigo] ?? null;
      if ($tasa) {
        $resultados[$codigo] = [
          'icono' => $icono,
          'valor' => round($cantidad * $tasa, 2)
        ];
      }
    }
  } else {
    $error = "No se pudo obtener la tasa de cambio.";
  }
}
?>

<div class="container mt-5">
  <h1 class="mb-4">💱 Conversión de Monedas</h1>

  <form method="POST" class="mb-4">
    <div class="mb-3">
      <label for="cantidad" class="form-label">Cantidad en USD ($):</label>
      <input type="number" name="cantidad" id="cantidad" class="form-control" step="0.01" required
        value="<?= htmlspecialchars($cantidad) ?>">
    </div>
    <button type="submit" class="btn btn-success">Convertir</button>
  </form>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php elseif (!empty($resultados)): ?>
    <div class="row">
      <?php foreach ($resultados as $codigo => $info): ?>
        <div class="col-md-3">
          <div class="card text-center mb-3">
            <div class="card-body">
              <h5 class="card-title"><?= $info['icono'] ?>     <?= $codigo ?></h5>
              <p class="card-text"><strong><?= $info['valor'] ?></strong></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>