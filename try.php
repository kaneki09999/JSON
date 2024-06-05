<?php

$curl = curl_init();

$search = "category/naruto";
$url = "https://ww1.gogoanime.wf/";
curl_setopt($curl, CURLOPT_URL, $url);

echo "
        <a href='$url'>Go to Gogoanime</a>

        ";
curl_exec($curl);

