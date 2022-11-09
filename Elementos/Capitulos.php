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
    <link rel="stylesheet" href="./Estilos.css" />
    <link
    rel="shortcut icon"
    href="img/icon.png"
    type="image/x-icon"
  />
  </head>
  <body>
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">
          <img
            src="img/icon.png"
            alt=""
            class="nav__logo-img"
          />
          Rick y Morty Blog
        </a>
        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="http://localhost/RickAndMortyBlog/" class="nav__link">Inicio</a>
            </li>
            <li class="nav__item">
              <a href="http://localhost/RickAndMortyBlog/Elementos/ca$capitulos.php" class="nav__link active-link">capitulos</a>
            </li>
            <li class="nav__item">
                <a href="http://localhost/RickAndMortyBlog/Elementos/Capitulos.php" class="nav__link">Capitulos</a>
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
                <h2 class="section__title capitulos__title">
                capitulos:
                <br />
                </h2>
                <p class="capitulos__description">
                    <?php
                        //capitulos
                        $url = 'https://rickandmortyapi.com/api/episode/?page=';
                                $pe = curl_init();
                                curl_setopt($pe,CURLOPT_URL, $url);
                                curl_setopt($pe,CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($pe,CURLOPT_HEADER, 0);
                                $datosapi = curl_exec($pe);
                                curl_exec($pe);
                                curl_close($pe);
                                $datos = json_decode($datosapi);
                                $capitulos = $datos->results;
                                $pagina = $datos->info;
                                foreach($capitulos as $capitulo){      
                                    echo "<centre>";
                                    echo "<br><br>";
                                    echo "<br><br>";
                                    echo "<h2>$capitulo->id.- $capitulo->name</h2>";
                                    echo str_replace_assoc($replace,$string);
                                    echo "<br><h3>El capitulo fue estrenado: $capitulo->air_date</h3>";
                                    echo "<br><h3>Este siendo: $capitulo->episode</h3>";
                                    echo "<a href='$capitulo->url' target='_blank'>Más información</a>";
                                    echo "</centre>";
                            }
                    ?>          
                </p>
            </div>
            </div>
        </section>
    </main>
  </body>
</html>