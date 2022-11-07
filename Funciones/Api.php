<?php
    //personajes
    $pe = curl_init();

    curl_setopt($pe,CURLOPT_URL,'https://rickandmortyapi.com/api/character');
    curl_setopt($pe,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($pe,CURLOPT_HEADER, 0);
    $datosapi = curl_exec($pe);
    curl_exec($pe);
    curl_close($pe);

    $datos = json_decode($datosapi);
    $personajes = $datos->results;
    foreach($personajes as $personaje){
        echo "<centre>";
        echo "<br><br>";
        echo "<img src='$personaje->image'>";
        echo "<br><br>";
        echo "<h2>$personaje->name</h2>";
        if($personaje->status == "Alive"){
            $personaje->status = "Vivo";
        }else{
            $personaje->status = "Muerto";
        }
        echo "<br><h3>Se encuentra actualmente: $personaje->status</h3>";
        echo "<a href='$personaje->url' target='_blank'>Más información</a>";
        echo "</centre>";
    }
?>