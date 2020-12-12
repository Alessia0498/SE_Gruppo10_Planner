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


  generate_header1();
  $response = Api::list_maintenance_activity();
  $response = json_decode($response, true);
  ?>


  <div class="content">
    <div class="tableFunctions">
      <div class="tableFunctionsFloater"></div>
      <a href="insert-maintenance-activity.screen.php?create=yes"><img src="../assets/più.png" style="height:20px" title="Insert new activity"></a>
    </div>


    <?php
    $activity =  array('id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'week' => 3);


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


    // if ($response && $response['rows'] && isset($_POST['week'])) {

    //  foreach ($response['rows'] as $_ => $activity) {
    if (isset($_POST['week']) && $_POST['week'] == $activity['week']) {


      echo "  <tbody>
          <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-maintenance-activity.screen.php?activity=" . $activity['id'] . "'\">
            <td width='35%' height='100%' align='center'>" . $activity['id'] . "</td>
            <td width='35%' height='100%' align='center'>" . $activity['area'] . "</td>
            <td width='35%' height='100%' align='center'>" . $activity['tipology'] . "</td> 
            <td width='35%' height='100%' align='center'>" . $activity['eit'] . "</td>   
          </tr>
        </tbody>";
      //}
    }
    // }
    echo "</table>";
    ?>

  </div>

  <div class="footer2"></div>

</body>

</html>