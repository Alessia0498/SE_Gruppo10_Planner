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

  session_start();
  generate_header1();
  if (isset($_GET['forward'])) {
    $response = Api::forward_maintenance_activity($_SESSION['week']);
    $response = json_decode($response, true);


    //var_dump($response);
    /*   $data =  array(
      'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
      'week' => 3, 'note' => 'notes', 'description' => 'description', 'note' => 'notes'
    );*/

    /*$skills = 5;
    $competencies = array('competence1', 'competence2', 'competence3');
    $maintainer =  array(
      'name' => 'Pippo', 'skills' => 1, 'percentage1' => 80, 'percentage2' => 100,
      'percentage3' => 20, 'percentage4' => 20, 'percentage5' => 50, 'percentage6' => 20, 'percentage7' =>0,
    );*/
  }


  foreach ($response['rows'] as $_ => $data) {

    switch ($data['weekly_percentage_availability']['tuesday']) {
      case 0:
        $color1 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color1 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color1 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color1 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color1 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['skill_compliance']) {
      case 0:
        $color7 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 1:
        $color7 = ("style=\"background:#ff4d00; text-align:center; width:10%;\"");
        break;


      case 2:
        $color7 = ("style=\"background:orange; text-align:center; width:10%;\"");
        break;

      case 3:
        $color7 = ("style=\"background:yellow; text-align:center; width:10%;\"");
        break;


      case 4:
        $color7 = ("style=\"background:#8cff40; text-align:center; width:10%;\"");
        break;

      case 5:
        $color7 = ("style=\"background:green; text-align:center; width:10%;\"");
        break;
    }
  }

  ?>
  <div class="content">
    <div class="tableFunctions"> </div>
    <?php
    echo "
<table class='table3'  border='1'>
<caption>
<h3>Maintainer Availability </h3> </caption>

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

 </tr>";
    foreach ($response['rows'] as $_ => $data) {
      $_SESSION['username'] = $data['user']['username'];
      echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2> 
        <p>Week number: " . $data['week'] . "</p>
        <table  class='table3' border='1'>
        
        <tr>
        <td style='text-align:center; width:10%;'>" . $data['user']['username'] . "</td>
        <td style='text-align:center; width:10%;'>" . $data['user']['role'] . "</td>


       <td " . $color7 . ">" . $data['skill_compliance'] . "</td>";

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['monday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['monday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['monday'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['tuesday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['tuesday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['tuesda'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['wednesday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['wednesday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['wednesday'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['thursday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['thursday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['thursday'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['friday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['friday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['friday'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['saturday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['saturday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['saturday'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['sunday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['sunday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['sunday'] . "</td>";
      }


      echo " </tr>  
        </td>
       </tr></table>";
    }

    if (isset($_GET['current_page']) && isset($_GET['page_size'])) {



      $response = Api::list_availabilities_by_size($_SESSION['week'], $_GET['current_page'], $_GET['page_size']);
      $response = json_decode($response, true);







      foreach ($response['rows'] as $_ => $data) {


        echo "  <tbody>
      <tr class=\"clickable-row\" onClick=\"javascript:window.location.href=''\">
        <td width='17%' height='100%' align='center'>" . $data['meta']['count'] . "</td>
        <td width='17%' height='100%' align='center'>" . $data['meta']['current_page'] . "</td>
        <td width='17%' height='100%' align='center'>" . $data['typology']['page_count'] . "</td> 
        <td width='17%' height='100%' align='center'>" . $data['estimated_time']['page_size'] . "</td>   
      </tr>
    </tbody>";
      }

      echo "</table>";


      if ($response['meta']['count'] > $response['meta']['page_size']) {

        if ($response['meta']['current_page'] > 1) {
          echo "<a style=\"color: black;\" href=\"" . $_SERVER['PHP_SELF'] . "?current_page=" . ($response['meta']['current_page']  - 1) . "&page_size=" . $response['meta']['page_size'] . "\">";
          echo "Prev Page     </a>";
        }
        if ($response['meta']['page_count'] > $response['meta']['current_page']) {
          echo "<a style=\"color: black;\" href=\"" . $_SERVER['PHP_SELF'] . "?current_page=" . ($response['meta']['current_page']  + 1) . "&page_size=" . $response['meta']['page_size'] . "\">";
          echo "Next Page</a>";
        }
      }
    }

    /* <br>

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

        
        <td style='width:10%; text-align:center;'>
      
        <p>" . $competencies[0] . "</p>
        <p>" . $competencies[1] . "</p>
        <p>" . $competencies[2] . "</p>
       
        </td>
      
    
        
        <td style='text-align:center;  width:10%;'> " . $maintainer['name'] . "</td>
        <td " . $color7 . " > " . $maintainer['skills'] . "/" . $skills . "</td> 


      
        <td " . $color . "  'class=\"clickable-row\" ";
    if ($maintainer['percentage1'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage1'] . "'\">" . $maintainer['percentage1'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage1'] . "%</td>";
    }


    echo " <td " . $color1 . " 'class=\"clickable-row\" ";
    if ($maintainer['percentage2'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage2'] . "'\">" . $maintainer['percentage2'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage2'] . "%</td>";
    }


    echo "<td " . $color2 . "   'class=\"clickable-row\" ";
    if ($maintainer['percentage3'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage3'] . "'\">" . $maintainer['percentage3'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage3'] . "%</td>";
    }

    echo " <td " . $color3 . "  'class=\"clickable-row\"";
    if ($maintainer['percentage4'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage4'] . "'\">" . $maintainer['percentage4'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage4'] . "%</td>";
    }

    echo "  <td " . $color4 . "  'class=\"clickable-row\"";
    if ($maintainer['percentage5'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage5'] . "'\">" . $maintainer['percentage5'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage5'] . "%</td>";
    }

    echo "   <td " . $color5 . "  'class=\"clickable-row\"";
    if ($maintainer['percentage6'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage6'] . "'\">" . $maintainer['percentage6'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage6'] . "%</td>";
    }

    echo "   <td  " . $color6 . " 'class=\"clickable-row\"";
    if ($maintainer['percentage7'] != 0) {
      echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage7'] . "'\">" . $maintainer['percentage7'] . "%</td>";
    } else {
      echo "'\">" . $maintainer['percentage7'] . "%</td>";
    }*/

    echo " </tr>  
         </td>
        </tr></table>";
    ?>
  </div>
</body>

</html>