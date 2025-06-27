<?php require_once __DIR__ . '/../includes/header.php';
?>

<div class="container mt-4">
    <h2>Predicción de Género</h2>
    <form method="GET">
        <input type="text" name="nombre" placeholder="Escribe un nombre" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

    <?php
    if (isset($_GET['nombre'])) {
        $nombre = htmlspecialchars($_GET['nombre']);
        $url = "https://api.genderize.io/?name=$nombre";

        $respuesta = file_get_contents($url);

        if ($respuesta) {
            $datos = json_decode($respuesta, true);
            $genero = $datos['gender'];

            if ($genero == 'male') {
                echo "<div class='alert alert-primary mt-3'>Género: Masculino 💙</div>";
            } elseif ($genero == 'female') {
                echo "<div class='alert alert-pink mt-3' style='background-color:#ffc0cb;'>Género: Femenino 💖</div>";
            } else {
                echo "<div class='alert alert-secondary mt-3'>No se pudo determinar el género</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3'>Error al obtener datos de la API</div>";
        }
    }
    ?>

</div>

<?php include '../includes/footer.php'; ?>