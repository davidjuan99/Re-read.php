<!DOCTYPE html>
<html lang="en">
<head>
<title>Re-Read</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Estilos css -->
<link rel="stylesheet" href="../css/estilos.css">
<script src="../js/code.js"></script>
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
    <h2>Toda la actualidad en eBook</h2>
    <div class="form">
      <form action="./ebooks.php" method="POST">
        <label for="fautor">Autor</label>
        <input type="text" id="fautor" name="fautor" placeholder="Introduzca el autor...">
        <label for="fautor">Titulo</label>
        <input type="text" id="ftitulo" name="ftitulo" placeholder="Introduzca el título...">
        <select name="pais">
        <option value="%">Seleccionar pais</option>
        <?php
        include '../services/connection.php';
        $sql_pais = mysqli_query($conn, "SELECT DISTINCT Authors.Country from Authors order by Authors.Country");
        while ($row = mysqli_fetch_array($sql_pais)) {
        echo "<option value='" . $row['Country'] . "'>" . $row['Country'] . "</option>";
        }
        ?>        
        </select>
        <input type="submit" value="Enviar">
    </form>
    </div>
    <?php
      if(isset($_POST['fautor'])){
        // filtrará los ebooks que se mostrarán en la página.
        $result = mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM Books INNER JOIN BooksAuthors on Books.Id=BooksAuthors.BookId INNER JOIN Authors on BooksAuthors.AuthorId = Authors.Id where Authors.Name LIKE '%{$_POST['fautor']}%' and Authors.Country like '%{$_POST['pais']}%'");

      } else {
        // sino mostrará todos los ebooks de la base de datos.
        $result = mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM Books");
        
      }
      if(isset($_POST['ftitulo'])){
        // filtrará los ebooks que se mostrarán en la página.
        $result = mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM Books INNER JOIN BooksAuthors on Books.Id=BooksAuthors.BookId INNER JOIN Authors on BooksAuthors.AuthorId = Authors.Id where Authors.Name LIKE '%{$_POST['fautor']}%' and Authors.Country like '%{$_POST['pais']}%'and Books.Title LIKE '%{$_POST['ftitulo']}%'");

      } else {
        // sino mostrará todos los ebooks de la base de datos.
        $result = mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM Books");
        
      }
      if (!empty($result) && mysqli_num_rows($result) > 0) {
        // datos de salida de cada clase
         
        while ($row = mysqli_fetch_array($result)) {
          echo "<div class='ebook'>";
          //Añadimos la imagen a la página con la etiqueta img de HTML
          echo "<img src=../img/".$row['img']." alt='".$row['Title']."'>";
          echo "<p class='desc'>".$row['Description']."</p>";
          echo "</div>";
        }
      } else {
        echo "0 resultados";
      }


   /*  ?>
    <?php */


      //2. Selección y muestra datos de la base de datos

    ?> 
   <!-- <div class="ebook">
      <a href="https://www.casadellibro.com/ebook-la-espada-del-destino-ebook/9788408124429/2250609"><img src="../img/ebook1.png" alt="ebook1">
      <div>La espada del destino</div></a>
    </div>
    <div class="ebook">
      <a href="https://www.casadellibro.com/libro-el-ultimo-deseo-saga-geralt-de-rivia-1rustica/9788498891270/11204577"><img src="../img/ebook2.png" alt="ebook22">
      <div>El último deseo</div></a>
    </div>
    <div class="ebook">
      <a href="https://www.casadellibro.com/libro-la-sangre-de-los-elfos-saga-geralt-de-rivia-3/9788498890075/1203823"><img src="../img/ebook3.jpg" alt="ebook3">
      <div>La sangre de los elfos</div></a>
    </div>
    <div class="ebook">
        <a href="https://www.casadellibro.com/libro-bautismo-de-fuego-saga-geralt-de-rivia-5-edicion-coleccionista-/9788498890549/1809990"><img src="../img/ebook4.jpg" alt="ebook4">
        <div>El bautismo de fuego</div></a>
    </div> -->
  </div>
  
  <div class="column right">
    <h2>Top Ventas</h2>
    <?php 
    $result2 = mysqli_query($conn, "SELECT Books.Title FROM Books where Top = '1'");

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