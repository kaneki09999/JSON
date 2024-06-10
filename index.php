<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = isset($_POST['search']) ? $_POST['search'] : '';
            $url = "https://jsonplaceholder.typicode.com/posts/" . urlencode($search);

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($curl);

            if ($result === false) {
                echo 'Curl error: ' . curl_error($curl);
            } else {
                $data = json_decode($result, true);
                if (!empty($data)) {
                    echo '
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">UserID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>' . htmlspecialchars($data['id']) . '</td>
                                <td>' . htmlspecialchars($data['userId']) . '</td>
                                <td>' . htmlspecialchars($data['title']) . '</td>
                                <td>' . htmlspecialchars($data['body']) . '</td>
                            </tr>
                        </tbody>
                    </table>';
                } else {
                    echo '<p>No post found with ID ' . htmlspecialchars($search) . '.</p>';
                    
                }
            }

            curl_close($curl);
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
