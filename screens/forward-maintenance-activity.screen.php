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
    $response = Api::forward_maintenance_activity($_SESSION['activity_id']);
    $response = json_decode($response, true);
  }

  $week_days = array(
    'monday',
    'tuesday',
    'wednesday',
    'thursday',
    'friday',
    'saturday',
    'sunday',
  );

  $colors = array();

  foreach ($week_days as $_ => $week_day) {
    foreach ($response['rows'] as $i => $data) {

      $daily_percentage = $data['weekly_percentage_availability'][$week_day];
      if ($daily_percentage <= 0) {
        $colors[$i][$week_day] = ("style=\"background:red; text-align:center; width:10%;\"");
      } else if ($daily_percentage <= 20) {
        $colors[$i][$week_day] = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
      } else if ($daily_percentage <= 50) {
        $colors[$i][$week_day] = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
      } else if ($daily_percentage <= 80) {
        $colors[$i][$week_day] = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
      } else {
        $colors[$i][$week_day] = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
      }
    }
  }

  switch ($data['skill_compliance'][0]) {
    case 0:
      $skill_compliance_color = ("style=\"background:red; text-align:center; width:10%;\"");
      break;

    case 1:
      $skill_compliance_color = ("style=\"background:#ff4d00; text-align:center; width:10%;\"");
      break;

    case 2:
      $skill_compliance_color = ("style=\"background:orange; text-align:center; width:10%;\"");
      break;

    case 3:
      $skill_compliance_color = ("style=\"background:yellow; text-align:center; width:10%;\"");
      break;

    case 4:
      $skill_compliance_color = ("style=\"background:#8cff40; text-align:center; width:10%;\"");
      break;

    case 5:
      $skill_compliance_color = ("style=\"background:green; text-align:center; width:10%;\"");
      break;
  }


  ?>
  <div class="content">
    <div class="tableFunctions"> </div>
    <?php
    echo " <table class='table3'  border='1'>
        <caption><h3>Maintainer Availability </h3> </caption>

 <tr>
 
 <th> Maintainer </th>
 <th> Skills </th>";

    foreach ($week_days as $_ => $week_day) {
      echo "<th>" . $week_day . "</th>";
    }
    echo "</tr>";
    echo "<h2 style='text-align:center'> Maintenance Activity Information </h2>
    <h3 style='display:inline'>Week number:  " . $data['week'] . "</h3> ";

    foreach ($response['rows'] as $i => $data) {

      echo "
          <tr>
          <td style='text-align:center; width:10%;'>" . $data['user']['username'] . "</td>";


      echo "<td " . $skill_compliance_color . ">" . $data['skill_compliance'] . "</td>";

      foreach ($colors[$i] as $week_day => $color) {

        echo "<td " . $color . " class=\"clickable-row\"";
        if ($data['weekly_percentage_availability'][$week_day] != 0) {
          echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $week_day . "&user=" . $data['user']['username'] . "'\">" . $data['weekly_percentage_availability'][$week_day] . "</td>";
        } else {
          echo  $data['weekly_percentage_availability'][$week_day] . "</td>";
        }
      }
      echo "</tr>";
    }

    echo "</table>";




    if (isset($_GET['current_page']) && isset($_GET['page_size'])) {



      $response = Api::list_availabilities_by_size($_SESSION['week'], $_GET['current_page'], $_GET['page_size']);
      $response = json_decode($response, true);







      foreach ($response['rows'] as $i => $data) {


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


    echo " 
         </td>
        </tr></table>";
    ?>
  </div>
</body>

</html>