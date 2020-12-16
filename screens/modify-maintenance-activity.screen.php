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

  /*$data =  array(
    'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
    'week' => 3, 'note' => 'notes', 'description' => 'description', 'type' => 'ua', 'site' => 'site', 'interruptible' => 'yes', 'materials' => 'material1, material2'
  );*/
  ?>

  <div class="form">

    <form method="post" action="view-maintenance-activity.screen.php?modify=yes&activity_id=<?php echo $data['activity_id']; ?>" id="form2" name="form2" enctype="multipart/form-data">


      <label for="activity_type"> Activity Type:
        <!-- <select name="type" id="type" title="Select type">-->
        <?php if ($data['activity_type'] == 'planned') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['activity_type'] ?>" />
          <!--  <option value="pa" selected>Planned Activity</option>
            <option value="ua" readonly>Un-planned Activity (EWO)</option>
            <option value="ea" readonly>Extra Activity </option>-->
        <?php } ?>
        <?php if ($data['activity_type'] == 'unplanned') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['activity_type'] ?>" />
          <!-- <option value="pa">Planned Activity</option>
          <option value="ua" selected>Un-planned Activity (EWO)</option>
          <option value="ea">Extra Activity </option>-->
        <?php } ?>
        <?php if ($data['activity_type'] == 'extra_activity') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['activity_type'] ?>" />
          <!--<option value="pa">Planned Activity</option>
          <option value="ua">Un-planned Activity (EWO)</option>
          <option value="ea" selected>Extra Activity </option>-->
        <?php } ?>
        <!--</select>-->
      </label>



      <br />

      <label for="site">Site (branch offices):
        <input type="text" required="required" name="site" id="site" readonly="readonly" value="<?php echo $data['site'] ?>" />
      </label>


      <!-- <label for="area"> Area (department):
        <input type="text" required="required" name="area" id="area" readonly="readonly" value="<?php //echo $data['area'] 
                                                                                                ?>" />
      </label>-->


      <label for="typology"> Activity's tipology:
        <!--<select name="tipology" id="tipology" readonly="readonly">-->


        <?php if ($data['typology'] == 'electrical') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />
          <!--<option value="electrical" selected> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>-->

        <?php } ?>

        <?php if ($data['typology'] == 'electronic') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />
          <!-- <option value="electrical"> Electrical</option>
            <option value="electronic" selected> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>-->

        <?php } ?>


        <?php if ($data['typology'] == 'hydraulic') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />
          <!-- <option value="electrical"> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic" selected> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>-->

        <?php } ?>


        <?php if ($data['typology'] == 'mechanical') { ?>
          <input type="text" required="required" name="typology" id="typology" readonly="readonly" value="<?php echo $data['typology'] ?>" />
          <!--<option value="electrical"> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical" selected> Mechanical</option>-->

        <?php } ?>

        <!--  </select> -->
      </label>


      <label for="description"> Activity Description: <br />
        <input type="text" required="required" name="description" id="description" readonly="readonly" value="<?php echo $data['description'] ?>"> <br />
      </label>



      <label for="estimated_time"> Estimated intervention time (min):<br />
        <input type="text" id="estimated_time" name="estimated_time" readonly="readonly" value="<?php echo $data['estimated_time'] ?>"> <br />
      </label>


      <label for="interruptible">Interruptible Activity: <br />
        <?php if ($data['interruptible'] == 'yes') { ?>
          <input type="text" required="required" name="interruptible" id="interruptible" readonly="readonly" value="<?php echo $data['interruptible'] ?>" />

          <!--<label for="yes">Yes</label><br>
      <input type="radio" id="no" name="interruptible" value="no" readonly>
      <label for="no">No</label><br>-->
        <?php } ?>

        <?php if ($data['interruptible'] == 'no') { ?>
          <!-- <input type="radio" id="yes" name="interruptible" value="yes" readonly="readonly">
      <label for="yes">Yes</label><br>-->
          <input type="text" required="required" name="interruptible" id="interruptible" readonly="readonly" value="<?php echo $data['interruptible'] ?>" />
          <!--<label for="no">No</label><br>-->
        <?php } ?>
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