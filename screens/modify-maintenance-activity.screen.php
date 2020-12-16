<!DOCTYPE html>
<html>

<head>
  <title>Modify Maintenance Activity</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="Modify Maintenance Activity Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php

  require_once '../common/library.php';
  include '../services/api.service.php';
  generate_header1();
  session_start();

  $response = Api::get_maintenance_activity($_GET['activity_id']);
  $data = json_decode($response, true);


  ?>

  <div class="form">

    <form method="post" action="view-maintenance-activity.screen.php?modify=yes&activity_id=<?php echo $data['activity_id']; ?>" id="form2" name="form2" enctype="multipart/form-data">


      <label for="activity_type"> Activity Type:

        <?php if ($data['activity_type'] == 'planned') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['activity_type'] ?>" />

        <?php } ?>
        <?php if ($data['activity_type'] == 'unplanned') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['activity_type'] ?>" />

        <?php } ?>
        <?php if ($data['activity_type'] == 'extra_activity') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['activity_type'] ?>" />

        <?php } ?>

      </label>

      <br />

      <label for="site">Site (branch offices):
        <input type="text" required="required" name="site" id="site" readonly="readonly" value="<?php echo $data['site'] ?>" />
      </label>





      <label for="typology"> Activity's tipology:


        <?php if ($data['typology'] == 'electrical') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />

        <?php } ?>

        <?php if ($data['typology'] == 'electronic') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />

        <?php } ?>


        <?php if ($data['typology'] == 'hydraulic') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />


        <?php } ?>


        <?php if ($data['typology'] == 'mechanical') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />


        <?php } ?>


      </label>


      <label for="description"> Activity Description: <br />
        <input type="text" required="required" name="description" id="description" readonly="readonly" value="<?php echo $data['description'] ?>"> <br />
      </label>



      <label for="estimated_time"> Estimated intervention time (min):<br />
        <input type="text" id="estimated_time" name="estimated_time" readonly="readonly" value="<?php echo $data['estimated_time'] ?>"> <br />
      </label>


      <label for="interruptible">Interruptible Activity: <br />
        <input type="text" required="required" name="interruptible" id="interruptible" readonly="readonly" value="<?php echo $data['interruptible'] ?>" />
      </label>




      <label for="Materials"> Materials: <br />
        <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>"> <br />
      </label>





      <label for="week"> Week (1-52 weeks):</label>
      <input type="number" id="week" name="week" min="1" max="52" readonly="readonly" value="<?php echo $data['week'] ?>"> <br />
      </label>



      <label for="workspace_notes">Workspace notes: <br />
        <input type="text" name="workspace_notes" id="workspace_notes" value="<?php echo $data['workspace_notes']; ?>" /> <br />
      </label>

      <button type="submit" name="save" id="save" value="Save" class="button"> Save</button>
    </form>

    <?php back2(); ?>

</body>

</html>