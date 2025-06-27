<?php
require_once __DIR__ . '/../includes/header.php';

$keyword = $_POST['keyword'] ?? '';
$apiKey = '51054118-456b5cc159f013f47eb3d1e86';
$url_imagen = '';

if ($keyword !== '') {
  $keyword_encoded = urlencode($keyword);
  $api_url = "https://pixabay.com/api/?key=$apiKey&q=$keyword_encoded&image_type=photo&per_page=3";

  $json = @file_get_contents($api_url);

  if ($json) {
    $data = json_decode($json, true);
    if (!empty($data['hits'])) {
      // Tomamos la primera imagen
      $url_imagen = $data['hits'][0]['webformatURL'];
    } else {
      $error = "No se encontraron imagenes para esa palabra.";
    }
  } else {
    $error = "Error al conectar con la API de Pixabay.";
  }
}
?>

<div class="container mt-5">
  <h1 class="mb-4">🖼️ Generador de Imagenes con IA (Pixabay)</h1>

  <form method="POST" class="mb-4">
    <div class="mb-3">
      <label for="keyword" class="form-label">Palabra clave:</label>
      <input type="text" name="keyword" id="keyword" class="form-control" required placeholder="Ej: beach, dog, food..."
        value="<?= htmlspecialchars($keyword) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Buscar Imagen</button>
  </form>

  <?php if (!empty($error)): ?>
    <div class="alert alert-warning"><?= $error ?></div>
  <?php elseif ($url_imagen): ?>
    <div class="text-center mt-4">
      <h5>Resultado para: <strong><?= htmlspecialchars($keyword) ?></strong></h5>
      <img src="<?= $url_imagen ?>" alt="Imagen generada" class="img-fluid rounded shadow">
    </div>
  <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>