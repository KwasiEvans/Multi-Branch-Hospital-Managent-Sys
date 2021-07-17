<?php
session_start();
if(isset($_POST['user_email']))
{
    $dbhost = $_SESSION["dhpms_dbhost"];
    $dbuser = $_SESSION["dhpms_dbuser"];
    $dbpass = $_SESSION["dhpms_dbpass"];
    $dbname = $_SESSION["dhpms_dbname"];

    $conn  = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if ($conn->connect_errno) {
    echo "Failed to connect to MySQL using given details. Please edit and try again.";
    exit();
    }

    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $joindate = date('Y-m-d');
    $lastlogin = date('Y-m-d H:i:s');
    $pass = md5($user_pass);

    $sql = "INSERT INTO tbl_users (`user_email`, `user_joindate`, `user_lastlogin`, `user_name`, `user_pass`, `user_type`)
    VALUES ('$user_email', '$joindate', '$lastlogin', 'Administrator', '$pass', 'admin')";


    if ($conn->query($sql) === TRUE) {
        $show = 'success';
    } else {
        $show = 'error';
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calgary HMS Setup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/backend/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/backend/dist/css/font-awesome.min.css">
</head>
<body>

<div class="jumbotron text-center">
  <h1>Calgary HMS - Setup</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <?php if($show == 'success') { ?> 
        <h3>Calgary HMS Installed Successfully. Please remove install folder from root directory.</h3>
    <?php } else { ?>
        <h3>Error while installing Calgary HMS. Please contact support.</h3>
    <?php } ?>
    </div>
  </div>
</div>

</body>
</html>
