<form action="" method="get">
    <input type="text" name="search" id="search">
    <button type="submit">Search</button>
</form>

<?php
if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']); 
    $search = urlencode($search);

    $curl = curl_init();
    $url = "https://ww1.gogoanime.wf/search.html?keyword=$search";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);

    if ($result === false) {
        echo "Curl Error: " . curl_error($curl);
    } else {
        preg_match_all("!https://gogocdn.net/cover/[^\s]*?.png!", $result, $match);

        $images = array_unique($match[0]);

        if (count($images) > 0) {
            echo "<div style='text-align: center;'>";
            foreach ($images as $image) {
                echo "<div style='display: inline-block; margin: 10px;'><img src='$image' style='width: 150px; height: auto;'></div>";
            }
            echo "</div>";
        } else {
            echo "No images found for '$search'.";
        }
    }


    curl_close($curl);
} else {
    echo "Please provide a search term.";
}
?>
