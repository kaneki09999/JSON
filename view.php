<?php



$curl = curl_init();
$url = "https://ww1.gogoanime.wf/category/naruto";
curl_setopt($curl, CURLOPT_URL, $url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_exec($curl);

curl_close($curl);

