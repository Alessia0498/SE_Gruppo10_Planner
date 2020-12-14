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
      'name' => 'Pippo', 'skills' => '3/5', 'percentage1' => 80, 'percentage2' => 100,
      'percentage3' => 20, 'percentage4' => 100, 'percentage5' => 50, 'percentage6' => 20, 'percentage7' => 100,
    );


    switch ($maintainer['percentage1']) {
      case 0:
        $color = ("style=\"background:red;\"");
        break;

      case 20:
        $color = ("style=\"background:orange;\"");
        break;

      case 50:
        $color = ("style=\"background:yellow;\"");
        break;


      case 80:
        $color = ("style=\"background:#8cff40;\"");
        break;

      case 100:
        $color = ("style=\"background:green;\"");
        break;
    }

    switch ($maintainer['percentage2']) {
      case 0:
        $color1 = ("style=\"background:red;\"");
        break;

      case 20:
        $color1 = ("style=\"background:orange;\"");
        break;

      case 50:
        $color1 = ("style=\"background:yellow;\"");
        break;


      case 80:
        $color1 = ("style=\"background:#8cff40;\"");
        break;

      case 100:
        $color1 = ("style=\"background:green;\"");
        break;
    }





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



      
        <td " . $color . " style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage1'] . "'\">" . $maintainer['percentage1'] . "%</td>
        <td " . $color1 . " style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage2'] . "'\">" . $maintainer['percentage2'] . "%</td>
        <td style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage3'] . "'\">" . $maintainer['percentage3'] . "%</td>
        <td style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage4'] . "'\">" . $maintainer['percentage4'] . "%</td>
        <td style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage5'] . "'\">" . $maintainer['percentage5'] . "%</td>
        <td style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage6'] . "'\">" . $maintainer['percentage6'] . "%</td>
        <td style='text-align:center;  width:10%; 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage7'] . "'\">" . $maintainer['percentage7'] . "%</td>
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