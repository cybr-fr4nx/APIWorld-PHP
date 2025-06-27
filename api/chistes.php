<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container mt-4">
  <h2>Chiste del día</h2>
  <?php
  $respuesta = file_get_contents("https://official-joke-api.appspot.com/random_joke");
  if ($respuesta) {
    $datos = json_decode($respuesta, true);
    echo "<div class='alert alert-success'>
          <strong>{$datos['setup']}</strong><br>{$datos['punchline']}
        </div>";
  } else {
    echo "<div class='alert alert-danger'>No se pudo obtener un chiste</div>";
  }
  ?>
</div>

<?php include '../includes/footer.php'; ?>