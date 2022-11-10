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
        <a href="index.HTML" class="nav__logo">
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
              <a href="index.HTML" class="nav__link">Inicio</a>
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
      <section class="section cuadros" id="cuadros">
                </form>
                    <?php
                    //cambio de paginas
                    $id;
                    $BotonMos = "";
                    if(isset($_GET["pagina"])){
                      $id = $_GET["pagina"]+1;
                    }else{
                      $id = 1;
                    }
                    if(isset($_GET["pag"])){
                      $id = $_GET["pag"]-1;
                    }
                    if($id == 0){
                      $id = 1;
                    }
                    if($id == 42){
                      $id = 1;
                    }
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
                      echo"<div class='cuadros__container container grid'>";
                      foreach($personajes as $personaje){
                        $BotonMos = $personaje->id;      
                        echo "<div class='cuadros__content'>";
                        echo '<img src="'.$personaje->image.'" class="cuadros__img">';
                        echo "<br><br>";
                        echo "<h3 class='cuadros__title'>$personaje->name</h3>";
                        $statusdelpersonaje = $personaje->status;
                        echo "<span class='cuadros__subtitle'>Se encuentra actualmente: ";
                        echo str_replace(array_keys($remplazar), array_values($remplazar), $statusdelpersonaje);
                          $idper = $personaje->id;
                          $url = 'https://rickandmortyapi.com/api/character/'.$idper;
                          $perin = curl_init();
                          curl_setopt($perin,CURLOPT_URL, $url);
                          curl_setopt($perin,CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($perin,CURLOPT_HEADER, 0);
                          $datosapiper = curl_exec($perin);
                          curl_exec($perin);
                          curl_close($perin);
                          $datosper = json_decode($datosapiper);    
                            echo "<br>";
                            $especie = $datosper->species;
                            echo "<span>Es de la especie: <span>";
                            echo str_replace(array_keys($remplazar), array_values($remplazar), $especie);
                            echo "<br>";
                            $generodelpersonaje = $datosper->gender;
                            echo "<span>Es del genenero: ";
                            echo str_replace(array_keys($remplazar), array_values($remplazar), $generodelpersonaje);
                            echo "<br>";
                            $locacion = $datosper->location->name;
                            echo "<span>Se localiza en: ";
                            echo str_replace(array_keys($remplazar), array_values($remplazar), $locacion);
                        echo "</span></h3>
                          <button class='button cuadros__button' name='BotonMos'>
                          <i class='bx bx-book cuadros__icon'></i>
                          </button>
                          </div>";
                      }
                      echo"</div>";
                       // formulario
                    echo "
                    <form action='Personajes.php' method='get'>
                      <button class='button' type='submit' name='pag' value={$id}>Atras</button>
                      <button class='button' type='submit' name='pagina' value={$id}>Siguiente</button>
                    </form>";
                    ?>
        </section>  
    </main>
  </body>
</html>