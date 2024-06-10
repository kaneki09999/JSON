<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $ch = curl_init();

    // Set the target URL
    curl_setopt($ch, CURLOPT_URL, "http://localhost/php_curl_post/post_api.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    $output = curl_exec($ch);

 
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    
}
?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="POST" id="sample-form"  style="border: 2px solid; border-radius: 10px; padding: 8px;">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
            </div>
            <div class="buttons d-flex justify-content-center">
                <button type="submit" name="action" value="submit" class="btn btn-primary mr-2" style="background-color: green; border: 1px solid black;">Submit</button>
                <button type="submit" name="action" value="update" class="btn btn-primary mr-2" style="background-color: yellow; border: 1px solid black;">Update</button>
                <button type="submit" name="action" value="delete" class="btn btn-primary mr-2" style="background-color: red; border: 1px solid black;">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php 

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
        
?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
