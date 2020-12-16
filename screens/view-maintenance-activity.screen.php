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
    <div>
      <?php


      echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2>
       
        <h3 style='display:inline'> Id: </h3> <p style='display:inline'> " . $data['activity_id'] . "</p> </br>
        <br> <h3 style='display:inline'>Type: </h3> <p style='display:inline'> " . $data['activity_type'] . "</p> </br>
        <br> <h3 style='display:inline'>Site: </h3><p style='display:inline'>" . $data['site'] . "</p> </br>
        <br> <h3 style='display:inline'>Tipology:</h3><p style='display:inline'> " . $data['typology'] . "</p> </br>
        <br> <h3 style='display:inline'>Estimated Intervention Time:</h3><p style='display:inline'> " . $data['estimated_time'] . "</p> </br>
        <br> <h3 style='display:inline'>Interruptible:</h3><p style='display:inline'> " . $data['interruptible'] . "</p> </br>
        <br> <h3 style='display:inline'>Materials: </h3><p style='display:inline'>" . $data['materials'] . "</p> </br>
        <br> <h3 style='display:inline'>Week:</h3><p style='display:inline'> " . $data['week'] . "</p> </br>
        <br> <h3 style='display:inline'> Worspace notes: </h3><p style='display:inline'> " . $data['workspace_notes'] . " <img src=\"../assets/modify.png\" class=\"tableFunctionsModify\" title=\"Modify maintenance activity\" onClick=\"javascript:window.location.href='modify-maintenance-activity.screen.php?modify=yes&activity_id=" . $data['activity_id'] . "'\"></p> </br>
        <br> <h3 style='display:inline'>Intervention Description: </h3> <p style='display:inline'> " . $data['description'] . "</p> </br>
        <br> <h3 style='display:inline'>Skills Needed: </h3> <ul>";
      foreach ($data['skills_needed'] as $elements) {
        echo " <li>" .$elements. "</li> ";
       }
       echo " </ul> " ;?>
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
      <h3 style='display:inline'> Id: </h3> <p style='display:inline'> " . $data['activity_id'] . "</p> </br>
      <br> <h3 style='display:inline'>Type: </h3> <p style='display:inline'> " . $data['activity_type'] . "</p> </br>
      <br> <h3 style='display:inline'>Site: </h3><p style='display:inline'>" . $data['site'] . "</p> </br>
      <br> <h3 style='display:inline'>Tipology:</h3><p style='display:inline'> " . $data['typology'] . "</p> </br>
      <br> <h3 style='display:inline'>Estimated Intervention Time:</h3><p style='display:inline'> " . $data['estimated_time'] . "</p> </br>
      <br> <h3 style='display:inline'>Interruptible:</h3><p style='display:inline'> " . $data['interruptible'] . "</p> </br>
      <br> <h3 style='display:inline'>Materials: </h3><p style='display:inline'>" . $data['materials'] . "</p> </br>
      <br> <h3 style='display:inline'>Week:</h3><p style='display:inline'> " . $data['week'] . "</p> </br>
      <br> <h3 style='display:inline'> Worspace notes: </h3><p style='display:inline'> " . $data['workspace_notes'] . "</p> </br>
      <br> <h3 style='display:inline'>Intervention Description: </h3> <p style='display:inline'> " . $data['description'] . "</p> </br>
      <br> <h3 style='display:inline'>Skills Needed: </h3> <ul>";
    foreach ($data['skills_needed'] as $elements) {
      echo " <li>" .$elements. "</li> ";
     }
     echo " </ul> " ;
     
    
    }
  }
 back2();?>



</body>

</html>