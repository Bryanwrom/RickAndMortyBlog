<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog de Rick y Morty</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="Elementos/Estilos.css" />
    <link
    rel="shortcut icon"
    href="Elementos/img/icon.png"
    type="image/x-icon"
  />
  </head>
  <body>
    <header class="header" id="header">
      <nav class="nav container">
        <a href="index.php" class="nav__logo">
          <img
            src="Elementos/img/icon.png"
            alt=""
            class="nav__logo-img"
          />
          Rick y Morty Blog
        </a>
        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.php" class="nav__link">Inicio</a>
            </li>
            <li class="nav__item">
              <a href="Personajes.php" class="nav__link ">Personajes</a>
            </li>
            <li class="nav__item">
                <a href="Capitulos.php" class="nav__link active-link">Capitulos</a>
              </li>
              <li class="nav__item">
                <a href="" class="nav__link">Descubre capitulos</a>
              </li>
          </ul>
          <div class="nav__close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
          <img src="img/nav-img.png" alt="" class="nav__img" />
        </div>
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-grid-alt"></i>
        </div>
      </nav>
    </header>
    <main class="main">
      <section class="section capitulos" id="capitulos">
        <div class="capitulos__container container grid">

            <div class="capitulos__data">
                <br />
                </h2>
                <p class="capitulos__description">
                    <?php
                      //cambio de paginas
                    $id;
                    if(isset($_GET["pag"])){
                      $id = $_GET["pag"]-1;
                    }
                    if(isset($_GET["pagina"])){
                      $id = $_GET["pagina"]+1;
                    }else{
                      $id = 1;
                    }
                    if($id == 0){
                      $id = 1;
                    }
                    if($id == 4){
                      $id = 1;
                    }
                    $remplazar = array(
                      'January' => 'Enero',
                      'February' => 'Febrero',
                      'March' => 'Marzo',
                      'April' => 'Abril',
                      'May' => 'Mayo',
                      'June' => 'Junio',
                      'July' => 'Julio',
                      'August' => 'Agosto',
                      'September' => 'Septiembre',
                      'Octuber' => 'Octubre',
                      'November' => 'Noviembre',
                      'December' => 'Diciembre'
                      );
                      // formulario
                    echo "
                    <form action='Capitulos.php' method='get'>
                      <button type='submit' name='pag' value={$id}>Atras</button>
                      <button type='submit' name='pagina' value={$id}>Siguiente</button>
                    </form>";
                    $url = 'https://rickandmortyapi.com/api/episode/?page='.$id;
                      $ca = curl_init();
                      curl_setopt($ca,CURLOPT_URL, $url);
                      curl_setopt($ca,CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ca,CURLOPT_HEADER, 0);
                      $datosapi = curl_exec($ca);
                      curl_exec($ca);
                      curl_close($ca);
                      $datos = json_decode($datosapi);
                      $capitulos = $datos->results;
                      foreach($capitulos as $capitulo){      
                        echo "<br><br>";
                        echo "<br><br>";
                        echo "<h2>$capitulo->id.- $capitulo->name</h2>";
                        $fecha = $capitulo->air_date;
                        echo "<br><h3>Fecha de estreno del capitulo: ";
                        echo str_replace(array_keys($remplazar), array_values($remplazar), $fecha);
                        echo "</h3>";
                        echo "<br><h3>Este siendo: $capitulo->episode</h3>";
                        echo "<a href='$capitulo->url' target='_blank'>Más información</a>";
                      }  
                    ?>          
                </p>
            </div>
            </div>
        </section>
    </main>
  </body>
</html>