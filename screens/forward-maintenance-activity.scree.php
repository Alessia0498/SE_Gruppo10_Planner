<!DOCTYPE html>
<html>

<head>
  <title>Forward Maintenance Activity</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="Forward Maintenance Activity Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  generate_header1();
  if (isset($_GET['id'])) {
    $response = Api::get_maintenance_activity($_GET['id']);
    $data = json_decode($response, true);


    echo "
        <h2 style='text-align:center'> Maintenance Activity Informtation </h2> 
        <p style='text-align:center'> Id: " . $data['id'] . "</p>";
    echo "<p style='text-align:center'>Area: " . $data['area'] . "</p>";
    echo "<p style='text-align:center'>Tipology: " . $data['tipology'] . "</p>";
    echo "<p style='text-align:center'>Estimated Intervention Time: " . $data['time'] . "</p>";
    echo "<p style='text-align:center'>Week number: " . $data['week'] . "</p>";
    echo "<p style='text-align:center'>Skills Needed: competencies</p>";
    echo"<p style='text-align:center'> Maintainer Availability </p>";

  }
  ?>

<body>
  </body>
 </html> 
