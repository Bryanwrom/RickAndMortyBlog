<?php
//personajes
$pe = curl_init();

curl_setopt($pe,CURLOPT_URL,'https://rickandmortyapi.com/api/character');
curl_setopt($pe,CURLOPT_RETURNTRANSFER, true);
curl_setopt($pe,CURLOPT_HEADER, 0);
$datos = curl_exec($pe);
curl_exec($pe);
curl_close($pe);
?>