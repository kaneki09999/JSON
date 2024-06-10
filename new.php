<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<?php


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['post_id'])) {
    $postId = intval($_POST['post_id']);
    $ch = curl_init();
    $url = "https://jsonplaceholder.typicode.com/posts/$postId";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    
    if ($http_code == 200) {
        $post_data = json_decode($output, true);
    }
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="POST" id="search-form" style="border: 2px solid; border-radius: 10px; padding: 8px;">
                <div class="form-group">
                    <label for="post_id">Search ID</label>
                    <input type="text" class="form-control" id="post_id" name="post_id" placeholder="Enter Post ID">
                </div>
                <div class="buttons d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="background-color: blue; border: 1px solid black;">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php if (isset($post_data) && !empty($post_data)): ?>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($post_data['id']); ?></td>
                        <td><?php echo htmlspecialchars($post_data['userId']); ?></td>
                        <td><?php echo htmlspecialchars($post_data['title']); ?></td>
                        <td><?php echo htmlspecialchars($post_data['body']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php elseif (isset($post_data)): ?>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Post not found.
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
