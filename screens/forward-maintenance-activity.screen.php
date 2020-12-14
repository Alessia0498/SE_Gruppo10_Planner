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
        <td style='text-align:center;  width:10%;'>
        <p> Skills Needed: </p>
        <li>" . $competencies[0] . "</li>
        <li>" . $competencies[1] . "</li>
        <li>" . $competencies[2] . "</li>
        </td>
        <br>
        <td style='text-align:center;  width:10%;'>
        <p> Maintainer Availability </p>
        <table class='table1'>
        <thead>
        <tr>
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
         </thead>
         <tbody>
        <tr>
         <td style='text-align:center;  width:10%;'> " . $maintainer['name'] . "</td>
        <td style='text-align:center;  width:10%;'> " . $maintainer['skills'] . "</td>
        <td style='text-align:center;  width:10%;'>" . $maintainer['AM'] . "</td>
        <td style='text-align:center;  width:10%;'>" . $maintainer['AT'] . "</td>
        <td style='text-align:center;  width:10%;'> " . $maintainer['AW'] . "</td>
        <td style='text-align:center;  width:10%;'> " . $maintainer['ATH'] . "</td>
        <td style='text-align:center;  width:10%;'> " . $maintainer['AF'] . "</td>
        <td style='text-align:center;  width:10%;'> " . $maintainer['ASA'] . "</td>
        <td style='text-align:center;  width:10%;'> " . $maintainer['ASU'] . "</td>
        </tr>  
         </tbody>
         </table>
         </td>
        </tr></table>";
  }
  ?>

  <body>
  </body>

</html>