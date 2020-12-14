<!DOCTYPE html>
<html>

<head>
  <title>View Maintenance Activity</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="View Maintenance Activity Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<script type="text/javascript">
  function show_message() {
    if (confirm("Are you sure you want to cancel?")) {
      return true;
    }
    self.location = 'list-maintenance-activity.screen.php';
    return false;
  }
</script>
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  generate_header1();
  session_start();
  ?>

  <?php
  $data =  array(
    'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
    'week' => 3, 'note' => 'notes', 'description' => 'description'
  );
  if (isset($_GET['id']) && !isset($_POST['save'])) {
    // $response = Api::get_maintenance_activity($_GET['id']);
    //  $data = json_decode($response, true);

  ?>
    <div class="tableFunctionsDelete">
      <div class="tableFunctionsFloater"></div>
      <a href="delete-maintenance-activity.screen.php?delete=yes&id=<?php echo $data['id']; ?>">
        <img src="../assets/iconBucket.jpg" style="height:50px" title="Delete maintenance activity" onclick="return show_message();">
      </a>
    </div>

    <div class="tableFunctionsForward">
      <div class="tableFunctionsFloater"></div>
      <a href="forward-maintenance-activity.screen.php?forward=yes&id=<?php echo $data['id']; ?>">
        <img src="../assets/forward.png" style="height:40px" title="Forward maintenance activity">
      </a>
    </div>

  <?php


    echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2>
        <div class='meta'>
        <p> Id: " . $data['id'] . "</p>
        <p>Area: " . $data['area'] . "</p>
        <p>Tipology: " . $data['tipology'] . "</p>
        <p>Estimated Intervention Time: " . $data['time'] . "</p>
        <p> Worspace notes: " . $data['note'] . " <img src=\"../assets/modify.png\" class=\"tableFunctionsModify\" title=\"Modify maintenance activity\" onClick=\"javascript:window.location.href='modify-maintenance-activity.screen.php?modify=yes&id=" . $data['id'] . "'\"></p>
        <p>Intervention Description: " . $data['description'] . "</p>
        <p>Standard maintenance procedure:</p>
        <p>Skills Needed: competencies</p></div>";
  }


  if (isset($_POST['registered']) && isset($_GET['create'])) {
    // $new_activity = array('site' => $_POST['site'], 'area' => $_POST['area'], 'tipology' => $_POST['tipology'], 'description' => $_POST['description'], 'time' => $_POST['time'], 'interruptible' => $_POST['interruptible'], 'materials' => $_POST['materials'], 'week' => $_POST['week'], 'note' => $_POST['note']);
    // $response = Api::post_maintenance_activity($new_activity);
    // $data = json_decode($response, true);

    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
    } else {
      $message = "Successfully entered maintenance activity!";
    }

    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }
  } else {
    go_to_page("insert-maintenance-activity.screen.php?error=yes");
  }



  if (isset($_GET['modify']) && isset($_POST['save']) && isset($_GET['id'])) {

    //$new_activity = array('id' => $_GET['id'], 'note' => $_POST['note']);
    //$response = Api::put_maintenance_activity($_GET["id"], $new_activity);
    //$data = json_decode($response, true);

    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
    } else {
      $message = "Activity modified!";
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';

      echo "
      <h2 style='text-align:center'>Activity  Information Modified In</h2> 
      <p style='text-align:center'> Id: " . $data['id'] . "</p>";
      echo "<p style='text-align:center'>Area: " . $data['area'] . "</p>";
      echo "<p style='text-align:center'>Tipology: " . $data['tipology'] . "</p>";
      echo "<p style='text-align:center'>Estimated Intervention Time: " . $data['time'] . "</p>";
      echo "<p style='text-align:center'> Worspace notes: " . $data['note'] . "</p>";
      echo "<p style='text-align:center'>Intervention Description: " . $data['description'] . "</p>";
      echo "<p style='text-align:center'>Standard maintenance procedure:</p>";
      echo "<p style='text-align:center'>Skills Needed: competencies</p>";
    }
  }
  back2();

  ?>



</body>

</html>