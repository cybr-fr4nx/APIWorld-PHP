<?php
require_once 'path.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Portal API</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('index.php') ?>">Inicio</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/genero.php') ?>">Genero</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/edad.php') ?>">Edad</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/universidades.php') ?>">Universidades</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/clima.php') ?>">Clima</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/pokemon.php') ?>">Pokémon</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/noticias.php') ?>">Noticias</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/monedas.php') ?>">Monedas</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/imagen.php') ?>">Img</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/pais.php') ?>">Pais</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('api/chistes.php') ?>">Chistes</a></li>
      </ul>
    </div>
  </nav>