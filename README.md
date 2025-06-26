# 🌐 Portal Dinámico de APIs en PHP

Este proyecto es un portal web dinámico desarrollado en PHP, que integra **10 APIs públicas diferentes** para demostrar el consumo de servicios externos de forma funcional y visualmente atractiva.

---

## 🧰 Tecnologías utilizadas

- 🐘 PHP 8
- 🎨 Bootstrap 5 (Framework CSS)
- 🌍 HTML5 y CSS3
- 🧠 APIs públicas (REST)
- 🛠️ Servidor local Apache (XAMPP)

---

## 📁 Estructura del proyecto

/TAREA5
│
├── api/ # Todas las páginas que consumen APIs
│ ├── genero.php
│ ├── edad.php
│ ├── universidades.php
│ ├── clima.php
│ ├── pokemon.php
│ ├── chistes.php
│ ├── noticias.php
│ ├── monedas.php
│ ├── imagenes.php
│ └── paises.php
│
├── includes/ # Archivos reutilizables
│ ├── header.php
│ └── path.php
│
├── index.php # Página principal
├── acerca.php # Información sobre el proyecto y framework usado
└── README.md # Documentación del proyecto

---

## 📌 Funcionalidades por API

### 1️⃣ Predicción de Género (https://api.genderize.io)
Formulario para ingresar un nombre y mostrar si es masculino 💙 o femenino 💖.

### 2️⃣ Predicción de Edad (https://api.agify.io)
Muestra una edad estimada y una imagen dependiendo del grupo etario (👶 🧑 👴).

### 3️⃣ Universidades por País (http://universities.hipolabs.com)
Lista universidades de un país con nombre, dominio y enlace web.

### 4️⃣ Clima Actual (https://wttr.in)
Consulta el clima de cualquier ciudad en tiempo real, sin necesidad de API key.

### 5️⃣ Información de Pokémon (https://pokeapi.co)
Busca un Pokémon y muestra su foto, habilidades, experiencia y sonido.

### 6️⃣ Noticias desde WordPress (REST API)
Selecciona un sitio WordPress y muestra sus 3 últimas publicaciones.

### 7️⃣ Conversión de Monedas (https://api.exchangerate-api.com)
Convierte una cantidad en USD a DOP, EUR, MXN y JPY con íconos de banderas.

### 8️⃣ Generador de Imágenes (https://pixabay.com/api)
Busca imágenes relacionadas con una palabra clave usando la API de Pixabay.

### 9️⃣ Datos de un País (https://restcountries.com)
Muestra la bandera, capital, población y moneda de un país ingresado.

### 🔟 Generador de Chistes (https://official-joke-api.appspot.com)
Muestra un chiste aleatorio sin necesidad de formulario.
