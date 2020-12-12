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
    //$response = Api::get_maintenance_activity($_GET['id']);
    // $data = json_decode($response, true);
    $data =  array(
      'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
      'week' => 3, 'note' => 'notes', 'description' => 'description'
    );


    echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2> 
        <table class='table1'>
        <tr>
        <td style='text-align:center;  width:10%;'> Id: " . $data['id'] . "</td>
        <td style='text-align:center;  width:10%;'>Area: " . $data['area'] . "</td>
        <td style='text-align:center;  width:10%;'>Tipology: " . $data['tipology'] . "</td>
        <td style='text-align:center;  width:10%;'>Estimated Intervention Time: " . $data['time'] . "</td>
        <td style='text-align:center;  width:10%;'>Week number: " . $data['week'] . "</td>
        </tr>
        <tr>
        <td style='text-align:center;  width:10%;'>Skills Needed: competencies</td></tr>
        <br>
        <tr><td style='text-align:center;  width:10%;'> Maintainer Availability </td>
        </tr></table>";
  }
  ?>

  <body>
  </body>

</html>