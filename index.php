<?php
$curl = curl_init();

$search = "posts/45"; 
$url = "https://jsonplaceholder.typicode.com/".$search;

$data = array(
    'title' => 'Updated Title', 
    'body' => 'Updated body text'
);

$jsonData = json_encode($data);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$result = curl_exec($curl);

if ($result === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    $data = json_decode($result, true);
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <table class='table text-center'>
        <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Title</th>
                <th scope='col'>Body</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{$data['id']}</td>
                <td>{$data['title']}</td>
                <td>{$data['body']}</td>
            </tr>
        </tbody>
    </table>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>";
}

curl_close($curl);
?>
