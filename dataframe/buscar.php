<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_database";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    
    // Preparar la consulta SQL
    $sql = "SELECT phrases.text 
            FROM authors 
            JOIN phrases ON authors.id = phrases.author_id 
            WHERE authors.name LIKE ?";
    
    // Preparar y vincular
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$nombre%";
    $stmt->bind_param("s", $searchTerm);
    
    // Ejecutar la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Mostrar resultados
    if ($result->num_rows > 0) {
        echo "Frases de $nombre:<br>";
        $resultados = ""; // Inicializa la variable
        while($row = $result->fetch_assoc()) {
            $resultados .= "- " . $row["text"] . "<br>" ; // Utiliza el punto (.) para concatenar
        }
    } else {
        $resultados= "No se encontraron frases para este autor";
    }

    $stmt->close();
}




$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Autor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="index.html" class="w3-bar-item w3-button"><b>Citas</b> de Autores</a>
    <div class="w3-right w3-hide-small">
      <a href="index.html#authors" class="w3-bar-item w3-button">Autores</a>
      <a href="index.html#phrases" class="w3-bar-item w3-button">Frases</a>
      <a href="index.html#links" class="w3-bar-item w3-button">Enlaces</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="images/coffee.jpg" alt="Libros" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"  style="font-weight: bold; font-size: 36px;"><span class="w3-padding w3-black w3-opacity-min"><b><?php echo $nombre;?></b></span> <span class="w3-hide-small w3-text-light-grey">frase</span></h1>
    <div style="text-align: center; font-weight: bold; font-style: italic;">
        <?php
          $frases = explode(',', $resultados); // suponiendo que las frases estén separadas por comas
          foreach ($frases as $frase) {
            echo "<p>$frase</p>";
          }
       ?>
        
        <?php echo $nombre; ?>

</div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Results Section -->
  <div class="w3-container w3-padding-32" id="results">
    
    <div style="text-align: center; font-style: italic; line-height: 3;">
      <?php echo $resultados; ?>
    </div>
  </div>
</div>

  <!-- Search Again Section -->
  <div class="w3-container w3-padding-32" id="search">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Buscar otro autor</h3>
    <form action="buscar.php" method="post">
      <input class="w3-input w3-border" type="text" placeholder="Nombre del autor" required name="name">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-search"></i> BUSCAR
      </button>
    </form>
  </div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>