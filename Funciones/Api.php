<?php
//personajes
$pe = curl_init();

curl_setopt($ch,CURLOPT_URL,'https://rickandmortyapi.com/api/character');

curl_exec($pe);

if(curl_errno($pe)) echo curl_error($pe);

curl_close($pe);
?>