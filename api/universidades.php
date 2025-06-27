<?php require_once __DIR__ . '/../includes/header.php';
?>
<div class="container mt-4">
  <h2>Universidades por país</h2>
  <form method="GET">
    <input type="text" name="pais" placeholder="Nombre del país (en inglés)" class="form-control mb-2" required>
    <button type="submit" class="btn btn-primary">Buscar</button>
  </form>
  <?php
  if (isset($_GET['pais'])) {
    $pais = urlencode($_GET['pais']);
    $url = "http://universities.hipolabs.com/search?country=$pais";
    $respuesta = file_get_contents($url);
    if ($respuesta) {
      $datos = json_decode($respuesta, true);
      echo "<ul class='list-group mt-3'>";
      foreach ($datos as $uni) {
        echo "<li class='list-group-item'>
          <strong>{$uni['name']}</strong><br>
          Dominio: {$uni['domains'][0]}<br>
          <a href='{$uni['web_pages'][0]}' target='_blank'>Ir al sitio</a>
        </li>";
      }
      echo "</ul>";
    } else
      echo "<div class='alert alert-danger mt-3'>Error al obtener datos</div>";
  }
  ?>
</div>
<?php include '../includes/footer.php'; ?>