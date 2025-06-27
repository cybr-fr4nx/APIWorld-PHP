<?php
require_once __DIR__ . '/../includes/header.php';

$urls = [
  'TechCrunch' => 'https://techcrunch.com/wp-json/wp/v2/posts',
];

$selected_url = $_POST['site'] ?? '';
?>
<div class="container mt-5">
  <h1 class="mb-4">Ultimas noticias desde WordPress</h1>
  <form method="POST" class="mb-4">
    <div class="mb-3">
      <label for="site" class="form-label">Selecciona una fuente:</label>
      <select name="site" id="site" class="form-select" required>
        <option value="">-- Elige una opción --</option>
        <?php foreach ($urls as $name => $url): ?>
          <option value="<?= $url ?>" <?= ($selected_url == $url ? 'selected' : '') ?>>
            <?= $name ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Cargar noticias</button>
  </form>

  <?php
  if ($selected_url) {
    $json = @file_get_contents($selected_url);

    if (!$json) {
      echo '<div class="alert alert-danger">No se pudo cargar la fuente seleccionada.</div>';
    } else {
      $posts = json_decode($json, true);
      echo "<div class='row'>";
      for ($i = 0; $i < 3 && $i < count($posts); $i++) {
        $post = $posts[$i];
        $title = $post['title']['rendered'];
        $excerpt = strip_tags($post['excerpt']['rendered']);
        $link = $post['link'];

        echo "<div class='col-md-4 mb-3'>";
        echo "<div class='card h-100'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>$title</h5>";
        echo "<p class='card-text'>$excerpt</p>";
        echo "<a href='$link' target='_blank' class='btn btn-outline-primary'>Leer más</a>";
        echo "</div></div></div>";
      }
      echo "</div>";
    }
  }
  ?>
</div>

<?php include '../includes/footer.php'; ?>