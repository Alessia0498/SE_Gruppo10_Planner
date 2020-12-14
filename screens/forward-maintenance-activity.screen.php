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

    $competencies = array('competence1', 'competence2', 'competence3');
    $maintainer =  array(
      'name' => 'Pippo', 'skills' => '3/5', 'AM' => '80%', 'AT' => '100%',
      'AW' => '20%', 'ATH' => '100%', 'AF' => '50%', 'ASA' => '20%', 'ASU' => '100%',
    );
  }

 ?>
    <div class="content">
    <div class="tableFunctions"> </div>
<?php
    echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2> 
        <table  class='table3' border='1'>
        <tr>
        <td style='text-align:center; width:10%;'> Id: " . $data['id'] . "</td>
        <td style='text-align:center;  width:10%;'>Area: " . $data['area'] . "</td>
        <td style='text-align:center; width:10%;'>Tipology: " . $data['tipology'] . "</td>
        <td style='text-align:center; width:10%;'>Estimated Intervention Time: " . $data['time'] . "</td>
        <td style='text-align:center; width:10%;'>Week number: " . $data['week'] . "</td>
        </tr>
        
        <br>

        <table class='table3'  border='1'>
       <caption>
       <h3>Maintainer Availability </h3> </caption>

        <tr>
        <th>Skills Needed</th>
        <th> Maintainer </th>
        <th> Skills </th>
        <th> Availability  Monday</th>
        <th> Availability  Tuesday</th>
        <th> Availability  Wednesday</th>
        <th> Availability  Thursday</th>
        <th> Availability  Friday</th>
        <th> Availability  Saturday</th>
        <th> Availability  Sunday</th>
        </tr>
      
    
        <tr>
        <td style='width:10%; text-align:center;'>
      
        <p>" . $competencies[0] . "</p>
        <p>" . $competencies[1] . "</p>
        <p>" . $competencies[2] . "</p>
       
        </td>
        <td style='text-align:center;'> " . $maintainer['name'] . "</td>
        <td style='text-align:center;'> " . $maintainer['skills'] . "</td>
        <td style='text-align:center;'>" . $maintainer['AM'] . "</td>
        <td style='text-align:center;'>" . $maintainer['AT'] . "</td>
        <td style='text-align:center;'> " . $maintainer['AW'] . "</td>
        <td style='text-align:center;'> " . $maintainer['ATH'] . "</td>
        <td style='text-align:center;'> " . $maintainer['AF'] . "</td>
        <td style='text-align:center;'> " . $maintainer['ASA'] . "</td>
        <td style='text-align:center;'> " . $maintainer['ASU'] . "</td>
        </tr>
        </table>"
  ?>
  </div>
  </body>

</html>