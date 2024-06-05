<?php
echo "Hello World!";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_response = curl_exec($ch);

curl_close($ch);


print_r($server_response);
?>
