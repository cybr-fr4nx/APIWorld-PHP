<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container mt-5">
    <h2>🌍 Información de un país</h2>

    <form method="GET" class="mb-4">
        <div class="mb-3">
            <label for="pais" class="form-label">Nombre del país (en inglés):</label>
            <input type="text" name="pais" id="pais" class="form-control" required
                placeholder="Ej: Dominican Republic, France, Japan...">
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    if (isset($_GET['pais'])) {
        $pais_input = trim($_GET['pais']);
        $pais_codificado = rawurlencode($pais_input); 
        $url = "https://restcountries.com/v3.1/name/{$pais_codificado}";

        $options = [
            "http" => [
                "header" => "User-Agent: PHP\r\n"
            ]
        ];
        $context = stream_context_create($options);

        $json = @file_get_contents($url, false, $context);

        if ($json) {
            $data = json_decode($json, true);
            if (!empty($data[0])) {
                $info = $data[0];
                $nombre = $info['name']['common'] ?? 'Desconocido';
                $bandera = $info['flags']['png'] ?? '';
                $capital = $info['capital'][0] ?? 'No disponible';
                $poblacion = number_format($info['population']);

                // Obtener la moneda
                $monedas = $info['currencies'] ?? [];
                $moneda_nombre = $moneda_codigo = 'Desconocida';
                if (!empty($monedas)) {
                    $codigo = array_keys($monedas)[0];
                    $moneda_nombre = $monedas[$codigo]['name'] ?? 'Desconocida';
                    $moneda_codigo = $codigo;
                }
                ?>

                <div class="card">
                    <div class="card-body text-center">
                        <h4><?= htmlspecialchars($nombre) ?></h4>
                        <img src="<?= $bandera ?>" alt="Bandera de <?= $nombre ?>" class="img-fluid mb-3" style="max-width: 200px;">
                        <p><strong>Capital:</strong> <?= htmlspecialchars($capital) ?></p>
                        <p><strong>Población:</strong> <?= $poblacion ?></p>
                        <p><strong>Moneda:</strong> <?= $moneda_nombre ?> (<?= $moneda_codigo ?>)</p>
                    </div>
                </div>

                <?php
            } else {
                echo "<div class='alert alert-warning'>No se encontró información para ese país.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error al conectar con la API.</div>";
        }
    }
    ?>
</div>

<?php include '../includes/footer.php'; ?>