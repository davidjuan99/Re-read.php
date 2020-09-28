<!DOCTYPE html>
<html lang="en">
<head>
<title>Re-Read</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Estilos css -->
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="logo">Re-Read</div>

<div class="header">
    <h1>Re-Read</h1>
    <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
  </div>

<div class="row">  
  <div class="column left">
    <div class="topnav">
        <a href="../index.php">Re-Read</a>
        <a href="../view/libros.php">Libros</a>
        <a href="../view/ebooks.php">eBooks</a>
      </div>
    <h2>Todos los libros tienen el mismo precio</h2>
    <p>Libros casi nuevos a un precio casi imposible.</p>
    <div class="alineacionImg">
      <img src="../img/1-libro-3€.gif" alt="imagen1">
    </div>
    <div class="alineacionImg">
      <img src="../img/2-libros-5€.gif" alt="imagen2">
    </div>
    <div class="alineacionImg">
      <img src="../img/5-libros-10€.gif" alt="imagen3">
    </div>
    <h2>¿Te cambias de piso? ¿Tienes que vaciar la casa? ¿O sencillamente necesitas algo más de espacio?</h2>
    <p>En Re-Read compramos tus libros para darles una segunda vida. Los compramos todos al mismo precio: 0,20 euros. Siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
  </div>
  
  <div class="column right">
    <h2>Top Ventas</h2>
    <?php 
    include '../services/connection.php';
    $result2 = mysqli_query($conn, "SELECT Books.Title FROM Books");

    if (!empty($result2) && mysqli_num_rows($result2) > 0) {
      // datos de salida de cada clase 
      while ($row2 = mysqli_fetch_array($result2)) {
        echo "<p>".$row2['Title']."</p>";
      }
    }
  //  <p>Cien años de soledad</p>
   // <p>Crónica de una muerte anunciada</p>
   // <p>El otoño del patriarca</p>
    //<p>El general en su laberinto</p>
    ?>
  </div>
</div>
  
</body>
</html>