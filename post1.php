<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL,"https://jsonplaceholder.typicode.com/posts");
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_POST));

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($curl);
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);
    }

    ?>

    <form action="" method="POST">
        <input type="text" name="id" placeholder="ID">
        <input type="text" name="userId" placeholder="User ID">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="body" placeholder="Body">
        <button type="submit">Submit</button>
    </form>



    <?php  if (isset($result)): ?>

    <?php echo $result; ?>



    <?php endif; ?>