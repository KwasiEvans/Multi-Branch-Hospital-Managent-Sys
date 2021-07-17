<?php
session_start();
if(isset($_POST['dbhost']))
{
    $dbhost = $_POST['dbhost'];
    $dbuser = $_POST['dbuser'];
    $dbpass = $_POST['dbpass'];
    $dbname = $_POST['dbname'];

    $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL using given details. Please edit and try again.";
    //exit();
    }

    $_SESSION["dhpms_dbhost"] = $dbhost;
    $_SESSION["dhpms_dbuser"] = $dbuser;
    $_SESSION["dhpms_dbpass"] = $dbpass;
    $_SESSION["dhpms_dbname"] = $dbname;

    $sqlfile = file_get_contents("../assets/db/dhpms.sql");

    $mysqli->multi_query($sqlfile);

    $dbfile = file_get_contents("../spymvc/config/database.php.lock");
    $dbdata = array(
        '{{db_host}}' => $dbhost,
        '{{db_user}}' => $dbuser,
        '{{db_pass}}' => $dbpass,
        '{{db_name}}' => $dbname
    );
    $dbfile = str_replace(array_keys($dbdata), $dbdata, $dbfile);
    $file = fopen("../spymvc/config/database.php.lock","w");
    fwrite($file,$dbfile);
    fclose($file);
    rename("../spymvc/config/database.php.lock","../spymvc/config/database.php");
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
      <h3>Admin User Settings (Create Administration Account)</h3><hr/>
      <form action="step4.php" method="POST">
      <table class="table table-bordered">
      <tr>
        <td>Admin Email</td>
        <td><input type="text" class="form-control" name="user_email" required validate></td>
      </tr>
      <tr>
        <td>Admin Password</td>
        <td><input type="text" class="form-control" name="user_pass" required></td>
      </tr>
      </table>
      <input type="submit" class="btn btn-success" value="Submit">
      </form>
    </div>
  </div>
</div>

</body>
</html>
