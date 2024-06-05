<?php
$curl = curl_init();

$search = "posts";
$url = "https://jsonplaceholder.typicode.com/".$search;

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

if ($result === false) {
    echo 'Curl error: ' . curl_error($curl);
}
else {
    $data = json_decode($result, true);
        echo "
         <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
        <table class='table text-center'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Body</th>
                </tr>
            </thead>
        ";
        echo "<tbody>
        ";
        foreach ($data as $users) {
           echo " <tr>
                <td>$users[id]</td>
                <td>$users[title]</td>
                <td>$users[body]</td>
           </tr>
           ";
        }

        echo "
            </tbody>
        </table>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>
        ";
}


curl_close($curl);

?>
 