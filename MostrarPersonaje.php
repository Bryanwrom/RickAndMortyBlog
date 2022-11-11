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
              <a href="Personaje.php" class="nav__link">Personajes</a>
            </li>
            <li class="nav__item">
                <a href="Capitulos.php" class="nav__link active-link">Capitulos</a>
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
      <section class="section cuadros" id="cuadros">
                </form>
                    <?php
                    $id = $_GET['id'];
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
                        'December' => 'Diciembre',
                        'Alive' => 'Vivo',
                        'Dead' => 'Muerto',
                        'unknown' => 'Desconocido',
                        'Human' => 'Humano',
                        'Earth' => 'Tierra',
                        'Male' => 'Masculino',
                        'Female' => 'Femenino',
                        'planet' => 'Planeta'
                        );
                        $url = 'https://rickandmortyapi.com/api/episode/'.$id;
                        $ca = curl_init();
                        curl_setopt($ca,CURLOPT_URL, $url);
                        curl_setopt($ca,CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ca,CURLOPT_HEADER, 0);
                        $datosapi = curl_exec($ca);
                        curl_exec($ca);
                        curl_close($ca);
                        $datos = json_decode($datosapi);
                        echo "<section class='section cuadros' id='cuadros'>";
                        echo "<div class='cuadros__container container grid'>";      
                          echo "<br><br>";
                          echo "<h2>$datos->id.- $datos->name</h2>";
                          $fecha = $datos->air_date;
                          echo "<br><h3>Fecha de estreno del capitulo: ";
                          echo str_replace(array_keys($remplazar), array_values($remplazar), $fecha);
                          echo "</h3>";
                          echo "<br><h3>Identificador de episodio: $datos->episode</h3>";
                          echo "<br><h3>Personajes que aparecen en este capitulo:</h3>";
                          foreach($datos->characters as $personaje){
                            $url = $personaje;
                            $ca = curl_init();
                            curl_setopt($ca,CURLOPT_URL, $url);
                            curl_setopt($ca,CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ca,CURLOPT_HEADER, 0);
                            $datosapi = curl_exec($ca);
                            curl_exec($ca);
                            curl_close($ca);
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
                          echo "<br><br>";
                          echo "</div>
                          </section>";
                    ?>
        </section>  
    </main>
    <script src="Elementos/main.js"></script>
  </body>
</html>