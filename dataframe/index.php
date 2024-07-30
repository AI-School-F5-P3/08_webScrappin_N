<!DOCTYPE html>
<html lang="es">
<head>
<title>Personajes Célebres</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"><b>Citas</b> de Personajes Célebres</a>
    <div class="w3-right w3-hide-small">
      <a href="#authors" class="w3-bar-item w3-button">Autores</a>
      <a href="#phrases" class="w3-bar-item w3-button">Frases</a>
      <a href="#links" class="w3-bar-item w3-button">Enlaces</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="images/beach.jpg" alt="Libros" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Citas</b></span> <span class="w3-hide-small w3-text-light-grey">de Autores</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Search Section -->
  <div class="w3-container w3-padding-32" id="search">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Buscar Autor</h3>
    <form action="buscar.php" method="post">
      <input class="w3-input w3-border" type="text" placeholder="Nombre del autor" required name="name">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-search"></i> BUSCAR
      </button>
    </form>
  </div>

  <!-- Authors Section -->
  <div class="w3-container w3-padding-32" id="authors">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Autores</h3>
    <!-- Aquí puedes añadir una lista o grid de autores -->
  </div>

  <!-- Phrases Section -->
  <div class="w3-container w3-padding-32" id="phrases">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Frases</h3>
    <!-- Aquí puedes añadir una lista de frases -->
  </div>

  <!-- Links Section -->
  <div class="w3-container w3-padding-32" id="links">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Enlaces</h3>
    <!-- Aquí puedes añadir una lista de enlaces -->
  </div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>