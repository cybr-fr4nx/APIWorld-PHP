<?php require_once __DIR__ . '/../includes/header.php';
?>
<div class="container mt-4">
  <h2>Información de Pokémon</h2>
  <form method="GET">
    <input type="text" name="nombre" placeholder="Ej: pikachu" class="form-control mb-2" required>
    <button type="submit" class="btn btn-warning">Buscar Pokemon</button>
  </form>
  <?php
  if (isset($_GET['nombre'])) {
    $nombre = strtolower(htmlspecialchars($_GET['nombre']));
    $url = "https://pokeapi.co/api/v2/pokemon/$nombre";
    $respuesta = file_get_contents($url);
    if ($respuesta) {
      $datos = json_decode($respuesta, true);
      $imagen = $datos['sprites']['front_default'];
      $exp = $datos['base_experience'];
      $habilidades = array_map(fn($h) => $h['ability']['name'], $datos['abilities']);
      echo "<div class='card mt-3'><div class='card-body'>
        <img src='$imagen'><h3>$nombre</h3>
        <p>Experiencia base: $exp</p>
        <p>Habilidades: " . implode(', ', $habilidades) . "</p>
      </div></div>";
    } else
      echo "<div class='alert alert-danger mt-3'>Pokémon no encontrado</div>";
  }
  ?>
</div>
<?php include '../includes/footer.php'; ?>