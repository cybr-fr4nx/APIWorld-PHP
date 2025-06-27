<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container mt-4">
  <h2>Predicción de Edad</h2>
  <form method="GET">
    <input type="text" name="nombre" placeholder="Escribe un nombre" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Consultar</button>
  </form>

  <?php
  if (isset($_GET['nombre'])) {
    $nombre = htmlspecialchars($_GET['nombre']);
    $url = "https://api.agify.io/?name=$nombre";
    $respuesta = file_get_contents($url);

    if ($respuesta) {
      $datos = json_decode($respuesta, true);
      $edad = $datos['age'];
      echo "<div class='alert alert-info mt-3'>Edad estimada para <strong>$nombre</strong>: $edad años ";
      if ($edad < 18)
        echo "👶";
      elseif ($edad < 60)
        echo "🧑";
      else
        echo "👴";
      echo "</div>";
    } else {
      echo "<div class='alert alert-danger mt-3'>Error al obtener datos</div>";
    }
  }
  ?>
</div>

<?php include '../includes/footer.php'; ?>
