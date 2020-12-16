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
 <th> Skills </th>";
    $day = "monday";
    echo "<th>$day</th>
 <th>Tuesday</th>
 <th>Wednesday</th>
 <th>Thursday</th>
 <th>Friday</th>
 <th>Saturday</th>
 <th>Sunday</th>
 </tr>";

    foreach ($response['rows'] as $_ => $data) {
      $_SESSION['username'] = $data['user']['username'];
      echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2> 
        <p>Week number: " . $data['week'] . "</p>
        <tr>
        <td style='text-align:center; width:10%;'>" . $data['user']['username'] . "</td>
       

       <td style='text-align:center; width:10%; '" . $color7 . ">" . $data['skill_compliance'] . "</td>";

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['monday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes&week=" . $data['week'] . "&week_day=" . $day . "'\">" . $data['weekly_percentage_availability']['monday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['monday'] . "</td>";
      }

      echo " <td " . $color1 . " 'class=\"clickable-row\"";
      if ($data['weekly_percentage_availability']['tuesday'] != 0) {
        echo "onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?send=yes'\">" . $data['weekly_percentage_availability']['tuesday'] . "</td>";
      } else {
        echo "'\">" . $data['weekly_percentage_availability']['tuesday'] . "</td>";
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


    echo " </tr>  
         </td>
        </tr></table>";
    ?>
  </div>
</body>

</html>