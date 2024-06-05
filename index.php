<?php
echo "Hello World!";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://my-json-server.typicode.com/kaneki09999/JSON');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_response = curl_exec($ch);

curl_close($ch);


print_r($server_response);
?>
 