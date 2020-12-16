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

  if (isset($_GET['activity_id']) && !isset($_POST['save'])) {
    $response = Api::get_maintenance_activity($_GET['activity_id']);
    $data = json_decode($response, true);

  ?>
    <div class="tableFunctionsDelete">
      <div class="tableFunctionsFloater"></div>
      <a href="delete-maintenance-activity.screen.php?delete=yes&activity_id=<?php echo $data['activity_id']; ?>">
        <img src="../assets/iconBucket.jpg" class="image1" title="Delete maintenance activity" onclick="return show_message();">
      </a>
    </div>
    <?php $_SESSION['week'] = $data['week'];
    $_SESSION['activity_id'] = $data['activity_id'] ?>

    <div class="tableFunctionsForward">
      <div class="tableFunctionsFloater"></div>
      <a href="forward-maintenance-activity.screen.php?forward=yes">
        <img src="../assets/forward.png" class="image1" title="Forward maintenance activity">
      </a>
    </div>
    <div class="meta">
      <?php


      echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2>
       
        <p> Id: " . $data['activity_id'] . "</p>
        <p>Type: " . $data['activity_type'] . "</p>
        <p>Site: " . $data['site'] . "</p>
        <p>Tipology: " . $data['typology'] . "</p>
        <p>Estimated Intervention Time: " . $data['estimated_time'] . "</p>
        <p>Interruptible: " . $data['interruptible'] . "</p>
        <p>Materials: " . $data['materials'] . "</p>
        <p>Week: " . $data['week'] . "</p>
        <p> Worspace notes: " . $data['workspace_notes'] . " <img src=\"../assets/modify.png\" class=\"tableFunctionsModify\" title=\"Modify maintenance activity\" onClick=\"javascript:window.location.href='modify-maintenance-activity.screen.php?modify=yes&activity_id=" . $data['activity_id'] . "'\"></p>
        <p>Intervention Description: " . $data['description'] . "</p>
        <p>Standard maintenance procedure:</p>
        <p>Skills Needed: </p> ";
      foreach ($data['skills_needed'] as $elements) {
        echo "<p>" . $elements . "</p>";
      } ?>
    </div>
  <?php }


  if (isset($_POST['registered']) && isset($_GET['create'])) {
    $new_activity = array('activity_type' => $_POST['activity_type'], 'site' => $_POST['site'], 'typology' => $_POST['typology'], 'description' => $_POST['description'], 'estimated_time' => $_POST['estimated_time'], 'interruptible' => $_POST['interruptible'], 'materials' => $_POST['materials'], 'week' => $_POST['week'], 'workspace_notes' => $_POST['workspace_notes']);
    $response = Api::post_maintenance_activity($new_activity);
    $data = json_decode($response, true);

    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
      go_to_page("insert-maintenance-activity.screen.php?error=yes");
    } else {
      $message = "Successfully entered maintenance activity!";
    }




    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }
  }


  if (isset($_GET['send'])) {


    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
      go_to_page("send-maintenance-activity.screen.php?error=yes");
    } else {
      $message = "Activity assigned with success!";
    }


    $message = "Activity assigned with success!";

    if (isset($message)) {
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';
    }
  }



  if (isset($_GET['modify']) && isset($_POST['save']) && isset($_GET['activity_id'])) {

    $new_activity = array('activity_id' => $_GET['activity_id'], 'workspace_notes' => $_POST['workspace_notes']);
    $response = Api::put_maintenance_activity($_GET["activity_id"], $new_activity);
    $data = json_decode($response, true);

    if (isset($data["message"])) {
      echo "<h3 class='error'>" . $data['message'] . "</h3>";
    } else {
      $message = "Activity modified!";
      echo '<h3 style="text-align: center; color: green">' . $message . '</h3>';

      echo "
      <h2 style='text-align:center'>Activity  Information Modified In</h2> 
      <p style='text-align:center'> Id: " . $data['activity_id'] . "</p>
      <p style='text-align:center'>Type: " . $data['activity_type'] . "</p>
      <p style='text-align:center'>Site: " . $data['site'] . "</p>
      <p style='text-align:center'>Tipology: " . $data['typology'] . "</p>
      <p style='text-align:center'>Estimated Intervention Time: " . $data['estimated_time'] . "</p>
      <p style='text-align:center'>Interruptible: " . $data['interruptible'] . "</p>
      <p style='text-align:center'>Materials: " . $data['materials'] . "</p>
      <p style='text-align:center'>Week: " . $data['week'] . "</p>
      <p style='text-align:center'> Worspace notes: " . $data['workspace_notes'] . "</p>
      <p style='text-align:center'>Intervention Description: " . $data['description'] . "</p>
      <p style='text-align:center'>Standard maintenance procedure:</p>
      <p style='text-align:center'>Skills Needed: competencies</p>";
    }
  }
  back2();

  ?>



</body>

</html>