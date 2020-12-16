<!DOCTYPE html>
<html>

<head>
  <title>Maintenance Activity List</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="Maintenance Activity List Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  session_start();
  generate_header1();
  $response = Api::list_maintenance_activity();

  $response = json_decode($response, true);

  ?>


  <div class="content">
    <div class="tableFunctions">
      <div class="tableFunctionsFloater"></div>
      <a href="insert-maintenance-activity.screen.php?create=yes"><img src="../assets/più.png" style="height:20px" title="Insert new activity"></a>
    </div>

    <div>
      <?php
      // $data =  array('id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'week' => 3);


      echo "
      <form method=\"get\" action=\"$_SERVER[PHP_SELF]\" id=\"form\" name=\"form\" enctype=\"multipart/form-data\">
      <label for=\"week\"> WEEK: <input type=\"text\" style=\"border: 1px solid black; width:20vw; text-align:center;\" class=\"weeknumber\" required=\"required\" name=\"week\" id=\"week\" placeholder=\"Enter a week [1-52]\" title=\"Enter a week\" />
      </label></form>";

      echo "<table class='table2' border='1'>";
      echo "
      <thead>
        <tr>
          <th width='17%' height='100%' align='center'>Id</th>
          <th width='17%' height='100%' align='center'>Area</th>
          <th width='17%' height='100%' align='center'>Tipology</th>
          <th width='17%' height='100%' align='center'>Estimated Intervention Time[min]</th>
        </tr>
      </thead>";


      // if ($response && isset($_POST['week'])) {

      foreach ($response['rows'] as $_ => $data) {
        // if ($_GET['week'] == $data['week']) {


        echo "  <tbody>
          <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-maintenance-activity.screen.php?id=" . $data['activity_id'] . "'\">
            <td width='17%' height='100%' align='center'>" . $data['activity_id'] . "</td>
            <td width='17%' height='100%' align='center'>" . $data['site'] . "</td>
            <td width='17%' height='100%' align='center'>" . $data['typology'] . "</td> 
            <td width='17%' height='100%' align='center'>" . $data['estimated_time'] . "</td>   
          </tr>
        </tbody>";
      }
      // }
      //  }
      echo "</table>";

      if ($response && isset($_POST['week'])) {
        echo "
      <form method=\"get\" action=\"$_SERVER[PHP_SELF]\" id=\"form\" name=\"form\" enctype=\"multipart/form-data\">
      <label for=\"week\"> WEEK: <input type=\"text\" style=\"border: 1px solid black; width:20vw; text-align:center;\" class=\"weeknumber\" required=\"required\" name=\"week\" id=\"week\" placeholder=\"Enter a week [1-52]\" title=\"Enter a week\" />
      </label></form>";

        echo "<table class='table2' border='1'>";
        echo "
      <thead>
        <tr>
          <th width='17%' height='100%' align='center'>Id</th>
          <th width='17%' height='100%' align='center'>Area</th>
          <th width='17%' height='100%' align='center'>Tipology</th>
          <th width='17%' height='100%' align='center'>Estimated Intervention Time[min]</th>
        </tr>
      </thead>";




        foreach ($response['rows'] as $_ => $data) {
          if ($_GET['week'] == $data['week']) {


            echo "  <tbody>
          <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-maintenance-activity.screen.php?id=" . $data['activity_id'] . "'\">
            <td width='17%' height='100%' align='center'>" . $data['activity_id'] . "</td>
            <td width='17%' height='100%' align='center'>" . $data['site'] . "</td>
            <td width='17%' height='100%' align='center'>" . $data['tipology'] . "</td> 
            <td width='17%' height='100%' align='center'>" . $data['estimated_time'] . "</td>   
          </tr>
        </tbody>";
          }
        }
      }
      echo "</table>";




      if (isset($_GET['current_page']) && isset($_GET['page_size']) && isset($_GET['week'])) {



        $response = Api::list_activities_by_size($_GET['week'], $_GET['current_page'], $_GET['page_size']);
        $response = json_decode($response, true);



        echo "
    <form method=\"post\" action=\"$_SERVER[PHP_SELF]\" id=\"form\" name=\"form\" enctype=\"multipart/form-data\">
    <label for=\"week\"> WEEK: <input type=\"text\" style=\"border: 1px solid black; width:20vw; text-align:center;\" class=\"weeknumber\" required=\"required\" name=\"week\" id=\"week\" placeholder=\"Enter a week [1-52]\" title=\"Enter a week\" />
    </label></form>";

        echo "<table class='table2' border='1'>";
        echo "
    <thead>
      <tr>
        <th width='17%' height='100%' align='center'>Id</th>
        <th width='17%' height='100%' align='center'>Area</th>
        <th width='17%' height='100%' align='center'>Tipology</th>
        <th width='17%' height='100%' align='center'>Estimated Intervention Time[min]</th>
      </tr>
    </thead>";


        //if ($response && $response['rows'] && isset($_POST['week'])) {

        foreach ($response['rows'] as $_ => $data) {
          //  if (isset($_POST['week']) && $_POST['week'] == $data['week']) {


          echo "  <tbody>
        <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-maintenance-activity.screen.php?id=" . $data['activity_id'] . "'\">
          <td width='17%' height='100%' align='center'>" . $data['activity_id'] . "</td>
          <td width='17%' height='100%' align='center'>" . $data['site'] . "</td>
          <td width='17%' height='100%' align='center'>" . $data['tipology'] . "</td> 
          <td width='17%' height='100%' align='center'>" . $data['estimated_time'] . "</td>   
        </tr>
      </tbody>";
          // }
        }
        // }
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
      ?>
    </div>
  </div>

  <div class="footer2"></div>

</body>

</html>