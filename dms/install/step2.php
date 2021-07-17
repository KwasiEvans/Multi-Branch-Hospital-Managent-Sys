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
      <h3>Database Settings</h3><hr/>
      <form action="step3.php" method="POST">
      <table class="table table-bordered">
      <tr>
        <td>Host</td>
        <td><input type="text" class="form-control" name="dbhost" required></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><input type="text" class="form-control" name="dbuser" required></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="text" class="form-control" name="dbpass"></td>
      </tr>
      <tr>
        <td>Database Name</td>
        <td><input type="text" class="form-control" name="dbname" required></td>
      </tr>
      </table>
      <input type="submit" class="btn btn-success" value="Submit">
      </form>
    </div>
  </div>
</div>

</body>
</html>
