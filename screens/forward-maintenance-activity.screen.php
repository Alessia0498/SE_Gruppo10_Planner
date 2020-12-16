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


  foreach ($response['rows'] as $_ => $data) {

    switch ($data['weekly_percentage_availability']['monday']) {
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



    switch ($data['weekly_percentage_availability']['tuesday']) {
      case 0:
        $color2 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color2 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color2 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color2 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color2 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['weekly_percentage_availability']['wednesday']) {
      case 0:
        $color3 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color3 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color3 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color3 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color3 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['weekly_percentage_availability']['thursday']) {
      case 0:
        $color4 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color4 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color4 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color4 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color4 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['weekly_percentage_availability']['friday']) {
      case 0:
        $color5 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color5 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color5 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color5 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color5 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['weekly_percentage_availability']['saturday']) {
      case 0:
        $color6 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color6 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color6 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color6 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color6 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['weekly_percentage_availability']['sunday']) {
      case 0:
        $color7 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 20:
        $color7 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;

      case 50:
        $color7 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;


      case 80:
        $color7 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;

      case 100:
        $color7 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($data['skill_compliance']) {
      case 0:
        $color8 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;

      case 1:
        $color8 = ("style=\"background:#ff4d00; text-align:center; width:10%;\"");
        break;


      case 2:
        $color8 = ("style=\"background:orange; text-align:center; width:10%;\"");
        break;

      case 3:
        $color8 = ("style=\"background:yellow; text-align:center; width:10%;\"");
        break;


      case 4:
        $color8 = ("style=\"background:#8cff40; text-align:center; width:10%;\"");
        break;

      case 5:
        $color8 = ("style=\"background:green; text-align:center; width:10%;\"");
        break;
    }
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
    $day1 = "monday";
    echo "<th>" . $day1 . "</th>";
    $day2 = "tuesday";
    echo "<th>" . $day2 . "</th>";
    $day3 = "wednesday";
    echo "<th>" . $day3 . "</th>";
    $day4 = "thursday";
    echo "<th>" . $day4 . "</th>";
    $day5 = "friday";
    echo "<th>" . $day5 . "</th>";
    $day6 = "saturday";
    echo "<th>" . $day6 . "</th>";
    $day7 = "sunday";
    echo "<th>" . $day7 . "</th>";

    echo "</tr>";

    foreach ($response['rows'] as $_ => $data) {
      $_SESSION['username'] = $data['user']['username'];
      echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2> 
        <p>Week number: " . $data['week'] . "</p>
        <tr>
        <td style='text-align:center; width:10%;'>" . $_SESSION['username'] . "</td>";


      echo "<td " . $color8 . ">" . $data['skill_compliance'] . "</td>";

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['monday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day1 . "'\">" . $data['weekly_percentage_availability']['monday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['monday'] . "</td>";
      }

      echo " <td " . $color2 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['tuesday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day2 . "'\">" . $data['weekly_percentage_availability']['tuesday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['tuesday'] . "</td>";
      }

      echo " <td " . $color3 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['wednesday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day3 . "'\">" . $data['weekly_percentage_availability']['wednesday'] . "</td>";
        echo "'\">" . $data['weekly_percentage_availability']['wednesday'] . "</td>";
      }

      echo " <td " . $color4 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['thursday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day4 . "'\">" . $data['weekly_percentage_availability']['thursday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['thursday'] . "</td>";
      }

      echo " <td " . $color5 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['friday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day5 . "'\">" . $data['weekly_percentage_availability']['friday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['friday'] . "</td>";
      }

      echo " <td " . $color6 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['saturday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day6 . "'\">" . $data['weekly_percentage_availability']['saturday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['saturday'] . "</td>";
      }

      echo " <td " . $color7 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['sunday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&activity_id=" . $_SESSION['activity_id'] . "&week_day=" . $day7 . "'\">" . $data['weekly_percentage_availability']['sunday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['sunday'] . "</td>";
      }


      echo " 
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


    echo " 
         </td>
        </tr></table>";
    ?>
  </div>
</body>

</html>