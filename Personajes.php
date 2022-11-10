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
        <a href="Index.HTML" class="nav__logo">
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
              <a href="Index.HTML" class="nav__link">Inicio</a>
            </li>
            <li class="nav__item">
              <a href="Personajes.php" class="nav__link active-link">Personajes</a>
            </li>
            <li class="nav__item">
                <a href="Capitulos.php" class="nav__link">Capitulos</a>
              </li>
              <li class="nav__item">
                <a href="" class="nav__link">Descubre Personajes</a>
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
      <section class="section Personajes" id="Personajes">
        <div class="Personajes__container container grid">

            <div class="Personajes__data">
                <h2 class="section__title Personajes__title">
                Personajes:
                </h2>
                </form>
                    <?php
                    //cambio de paginas
                    $id;
                    if(isset($_GET["id"])){
                      $id = $_GET["id"]+1;
                    }else{
                      $id = 1;
                    }
                    $remplazar = array(
                      'Alive' => 'Vivo',
                      'Dead' => 'Muerto',
                      'unknown' => 'Desconocido'
                    );
                    // formulario
                    echo "
                    <form action='Personajes.php' method='get'>
                      <button type='submit' name='id' value={$id}>Siguiente</button>
                    </form>";
                    $url = 'https://rickandmortyapi.com/api/character?page='.$id;
                      $pe = curl_init();
                      curl_setopt($pe,CURLOPT_URL, $url);
                      curl_setopt($pe,CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($pe,CURLOPT_HEADER, 0);
                      $datosapi = curl_exec($pe);
                      curl_exec($pe);
                      curl_close($pe);
                      $datos = json_decode($datosapi);
                      $personajes = $datos->results;
                      foreach($personajes as $personaje){      
                        echo "<br><br>";
                        echo '<img src="'.$personaje->image.'">';
                        echo "<br><br>";
                        echo "<h2>$personaje->name</h2>";
                        $statusdelpersonaje = $personaje->status;
                        echo "<br><h3>Se encuentra actualmente: ";
                        echo str_replace(array_keys($remplazar), array_values($remplazar), $statusdelpersonaje);
                        echo "</h3>";
                        echo "<a href='$personaje->url' target='_blank'>Más información</a>";
                      }
                    ?>          
                </p>
            </div>
            </div>
        </section>  
    </main>
  </body>
</html>