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
<?php
$dhpmspath = dirname(__DIR__);
$config_file_write_perm = is_writable('../spymvc/config/config.php');
$db_file_write_perm = is_writable('../spymvc/config/database.php.lock');
$routes_file_write_perm = is_writable('../spymvc/config/routes.php');
$curl_enabled = function_exists('curl_version');
$errcount = 0;
function check($bool)
{
    global $errcount;
    if($bool == 'pass')
    {
        return '<i class="fa fa-check" aria-hidden="true" style="color:green"></i>';
    }
    else
    {
        $errcount++;
        return '<i class="fa fa-times" aria-hidden="true" style="color:red"></i>';
    }
}
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3>System & File Requirements</h3><hr/>
      <table class="table table-bordered">
      <tr>
        <td>PHP Version</td>
        <td><b><?php echo phpversion(); ?></b> <?php echo (phpversion() >= 5.6) ? check('pass') : check('fail'); ?></td>
      </tr>
      <tr>
        <td>Writable /spymvc/config/config.php</td>
        <td> <?php echo ($config_file_write_perm == true) ? check('pass') : check('fail'); ?></td>
      </tr>
      <tr>
        <td>Writable /spymvc/config/database.php.lock</td>
        <td> <?php echo ($db_file_write_perm == true) ? check('pass') : check('fail'); ?></td>
      </tr>
      <tr>
        <td>Writable /spymvc/config/routes.php</td>
        <td> <?php echo ($routes_file_write_perm == true) ? check('pass') : check('fail'); ?></td>
      </tr>
      <tr>
        <td>CURL enabled</td>
        <td> <?php echo ($curl_enabled == true) ? check('pass') : check('fail'); ?></td>
      </tr>
      </table>
      <?php if($errcount == 0) { ?>
      <a href='step2.php' class="btn btn-success">Next >></a>
      <?php } ?>
    </div>
  </div>
</div>

</body>
</html>
