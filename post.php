<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP cURL POST</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php 
 
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $ch = curl_init();
 
            curl_setopt($ch, CURLOPT_URL,"http://localhost/JSON/post_api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_HEADER, true); 
            // curl_setopt($ch, CURLOPT_NOBODY, true);
            $output = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
            curl_close($ch);
 
        }
    ?>
    <h2 class="text-center">PHP cURL with POST Data</h2>
    <hr>
    <div class="card rounded-0 mx-auto col-lg-6 col-md-8 col-sm-12">
        <div class="card-header">
            <div class="card-title">Sample Form</div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="" method="POST" id="sample-form">
                    <div class="mb-3">
                        <label for="name" class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="control-label">Contact #</label>
                        <input type="text" class="form-control" id="contact" name="contact" required="required">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="control-label">Address</label>
                        <textarea rows="3" class="form-control" id="address" name="address" required="required"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="d-grid justify-content-center">
                <button class="btn btn-primary rounded-0" form="sample-form">Submit</button>
            </div>
        </div>
    </div>
    <div class="card rounded-0 mx-auto col-lg-6 col-md-8 col-sm-12 mt-3">
        <div class="card-header">
            <div class="card-title">cURL Response</div>
        </div>
        <div class="card-body">
            <?php if(isset($output)): ?>
            <div class="container-fluid">
    
                <p><b>Output:</b></p>
                <div class="bg-secondary bg-opacity-50 p-2">
                <?= $output ?>
                </div>
            </div>
            <?php else: ?>
                <div class="text-center"><b>Submit Data using the Form above first.</b></div>
            <?php endif; ?>
        </div>
    </div>
 
</body>
</html>