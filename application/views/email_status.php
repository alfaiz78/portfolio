<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Email Status</h2>
    <p><?php echo $status; ?></p>
    <a href="<?php echo base_url(''); ?>" class="btn btn-secondary">Send Another Email</a>
</div>
</body>
</html>
