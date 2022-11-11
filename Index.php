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
    <link rel="stylesheet" href="./Elementos/Estilos.css" />
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
              <a href="index.php" class="nav__link active-link">Inicio</a>
            </li>
            <li class="nav__item">
              <a href="Personaje.php" class="nav__link">Personaje</a>
            </li>
            <li class="nav__item">
                <a href="Capitulos.php" class="nav__link">Capitulos</a>
              </li>
              <li class="nav__item">
                <a href="" class="nav__link">Descubre Personaje</a>
              </li>
          </ul>
          <div class="nav__close" id="nav-close">
            <i class="bx bx-x"></i>
          </div>
          <img src="Elementos/img/nav-img.png" alt="" class="nav__img" />
        </div>
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bx-grid-alt"></i>
        </div>
      </nav>
    </header>
    <main class="main">
      <section class="Inicio container" id="Inicio">
        <div class="swiper Inicio-swiper">
          <div class="swiper-wrapper">
            <section class="swiper-slide">
              <div class="Inicio__content grid">
                <div class="Inicio__group">
                  <img
                    src="Elementos/img/RickIcon.png"
                    alt=""
                    class="Inicio__img"
                  />
                  <div class="Inicio__indicator"></div>
                  <div class="Inicio__details-img">
                    <h4 class="Inicio__details-title">Rick Sanchez (C-137)</h4>
                    <span class="Inicio__details-subtitle">
                      El Rick más Rick.</span>
                  </div>
                </div>
                <div class="Inicio__data">
                  <h3 class="Inicio__subtitle">Bienvenidos Al Blog de Rick y Morty.</h3>
                  <br />
                  <h1 class="Inicio__title">
                    Sientete como en tu propia dimension. <br />
                  </h1>
                  <p class="Inicio__description">
                    <br />
                    Wubba Lubba Dub Dub.
                    <br />
                  </p>
                </div>
              </div>
            </section>
            <section class="swiper-slide">
              <div class="Inicio__content grid">
                <div class="Inicio__group">
                  <img
                    src="Elementos/img/RickIcon.png"
                    alt=""
                    class="Inicio__img"
                  />
                  <div class="Inicio__indicator"></div>

                  <div class="Inicio__details-img">
                    <h4 class="Inicio__details-title">Rick Sanchez (C-137)</h4>
                    <span class="Inicio__details-subtitle"
                      >El Rick más Rick.</span>
                  </div>
                </div>
            </section>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </section>
      <section class="section cuadros" id="cuadros">
      <h2 class="section__title">Personaje Aleatorio</h2>
        <div class='cuadros__container container grid'>
        <?php
        for($i = 1; $i <= 3 ; $i++){   
                      $id = rand(1, 826);
                      $remplazar = array(
                        'Alive' => 'Vivo',
                        'Dead' => 'Muerto',
                        'unknown' => 'Desconocido',
                        'Human' => 'Humano',
                        'Earth' => 'Tierra',
                        'Male' => 'Masculino',
                        'Female' => 'Femenino',
                        'planet' => 'Planeta'
                      );
                      $url = 'https://rickandmortyapi.com/api/character/'.$id;
                      
                        $pe = curl_init();
                        curl_setopt($pe,CURLOPT_URL, $url);
                        curl_setopt($pe,CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($pe,CURLOPT_HEADER, 0);
                        $datosapi = curl_exec($pe);
                        curl_exec($pe);
                        curl_close($pe);
                        $datos = json_decode($datosapi);     
                          echo "<div class='cuadros__content'>";
                          echo '<img src="'.$datos->image.'" class="cuadros__img">';
                          echo "<br><br>";
                          echo "<h3 class='cuadros__title'>$datos->name</h3>";
                          $statusdelpersonaje = $datos->status;
                          echo "<span class='cuadros__subtitle'>Se encuentra actualmente: ";
                          echo str_replace(array_keys($remplazar), array_values($remplazar), $statusdelpersonaje);
                          echo "<span class='button cuadros__button'>";   
                              echo "<br>";
                              $especie = $datos->species;
                              echo "<span>Es de la especie: <span>";
                              echo str_replace(array_keys($remplazar), array_values($remplazar), $especie);
                              echo "<br>";
                              $generodelpersonaje = $datos->gender;
                              echo "<span>Es del genenero: ";
                              echo str_replace(array_keys($remplazar), array_values($remplazar), $generodelpersonaje);
                              echo "<br>";
                              $locacion = $datos->location->name;
                              echo "<span>Se localiza en: ";
                              echo str_replace(array_keys($remplazar), array_values($remplazar), $locacion);
                          echo "</span></span></h3>
                            </div>";
                      }
                      echo"<div class='cuadros__container container grid'>";
                      $remplazar = array(
                        'Alive' => 'Vivo',
                        'Dead' => 'Muerto',
                        'unknown' => 'Desconocido',
                        'Human' => 'Humano',
                        'Earth' => 'Tierra',
                        'Male' => 'Masculino',
                        'Female' => 'Femenino',
                        'planet' => 'Planeta'
                      );
                      $url = 'https://rickandmortyapi.com/api/episode/1';
                        $epi = curl_init();
                        curl_setopt($epi,CURLOPT_URL, $url);
                        curl_setopt($epi,CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($epi,CURLOPT_HEADER, 0);
                        $datosapiepi = curl_exec($epi);
                        curl_exec($epi);
                        curl_close($epi);
                        $datosepi = json_decode($datosapiepi);
                        echo "<h2 class='section__title'>$datosepi->name :</h2>";
                      $numper = count($datosepi->characters);
                      for($i = 0; $i < $numper ; $i++){
                        $urlpe = $datosepi->characters[$i];
                        $pec = curl_init();
                        curl_setopt($pec,CURLOPT_URL, $urlpe);
                        curl_setopt($pec,CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($pec,CURLOPT_HEADER, 0);
                        $datosapicap = curl_exec($pec);
                        curl_exec($pec);
                        curl_close($pec);
                        $datoscap = json_decode($datosapicap);     
                          echo "<div class='cuadros__content'>";
                          echo '<img src="'.$datoscap->image.'" class="cuadros__img">';
                          echo "<br><br>";
                          echo "<h3 class='cuadros__title'>$datoscap->name</h3>";
                          $statusdelpersonaje = $datoscap->status;
                          echo "<span class='cuadros__subtitle'>Se encuentra actualmente: ";
                          echo str_replace(array_keys($remplazar), array_values($remplazar), $statusdelpersonaje);
                          echo "<span class='button cuadros__button'>";   
                              echo "<br>";
                              $especie = $datoscap->species;
                              echo "<span>Es de la especie: <span>";
                              echo str_replace(array_keys($remplazar), array_values($remplazar), $especie);
                              echo "<br>";
                              $generodelpersonaje = $datoscap->gender;
                              echo "<span>Es del genenero: ";
                              echo str_replace(array_keys($remplazar), array_values($remplazar), $generodelpersonaje);
                              echo "<br>";
                              $locacion = $datoscap->location->name;
                              echo "<span>Se localiza en: ";
                              echo str_replace(array_keys($remplazar), array_values($remplazar), $locacion);
                          echo "</span></span></h3>
                            </div>";
                      }
                      ?>
                      </div>
      </section>
    </main>
      <img src="Elementos/img/Portal.gif" alt="" class="Pie__img-two" />
      <img src="Elementos/img/Pickle_rick.png" alt="" class="Pie__img-one" />
    </footer>
  </body>
</html>