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

  //$response = Api::get_maintenance_activity($_GET['id']);
  //$data = json_decode($response, true);

  $data =  array(
    'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
    'week' => 3, 'note' => 'notes', 'description' => 'description', 'type' => 'ua', 'site' => 'site', 'interruptible' => 'yes', 'materials' => 'material1, material2'
  );
  ?>

  <div class="form">

    <form method="post" action="view-maintenance-activity.screen.php?modify=yes&id=<?php echo $data['id']; ?>" id="form2" name="form2" enctype="multipart/form-data">


      <label for="type"> Activity Type:
        <!-- <select name="type" id="type" title="Select type">-->
        <?php if ($data['type'] == 'pa') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['type'] ?>" />
          <!--  <option value="pa" selected>Planned Activity</option>
            <option value="ua" readonly>Un-planned Activity (EWO)</option>
            <option value="ea" readonly>Extra Activity </option>-->
        <?php } ?>
        <?php if ($data['type'] == 'ua') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['type'] ?>" />
          <!-- <option value="pa">Planned Activity</option>
          <option value="ua" selected>Un-planned Activity (EWO)</option>
          <option value="ea">Extra Activity </option>-->
        <?php } ?>
        <?php if ($data['type'] == 'ea') { ?>
          <input type="text" required="required" name="type" id="type" readonly="readonly" value="<?php echo $data['type'] ?>" />
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


      <label for="area"> Area (department):
        <input type="text" required="required" name="area" id="area" readonly="readonly" value="<?php echo $data['area'] ?>" />
      </label>


      <label for="tipology"> Activity's tipology:
        <!--<select name="tipology" id="tipology" readonly="readonly">-->


        <?php if ($data['tipology'] == 'electrical') { ?>
          <input type="text" required="required" name="tipology" id="tipology" readonly="readonly" value="<?php echo $data['tipology'] ?>" />
          <!--<option value="electrical" selected> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>-->

        <?php } ?>

        <?php if ($data['tipology'] == 'electronic') { ?>
          <input type="text" required="required" name="tipology" id="tipology" readonly="readonly" value="<?php echo $data['tipology'] ?>" />
          <!-- <option value="electrical"> Electrical</option>
            <option value="electronic" selected> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>-->

        <?php } ?>


        <?php if ($data['tipology'] == 'hydraulic') { ?>
          <input type="text" required="required" name="tipology" id="tipology" readonly="readonly" value="<?php echo $data['tipology'] ?>" />
          <!-- <option value="electrical"> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic" selected> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>-->

        <?php } ?>


        <?php if ($data['tipology'] == 'mechanical') { ?>
          <input type="text" required="required" name="tipology" id="tipology" readonly="readonly" value="<?php echo $data['tipology'] ?>" />
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



      <label for="time"> Estimated intervention time (min):<br />
        <input type="text" id="time" name="time" readonly="readonly" value="<?php echo $data['time'] ?>"> <br />
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



      <label for="materials">
        <!--<legend>-->Materials:
        <!--</legend>--><br>
        <?php if ($data['materials'] == 'material1') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" readonly value="material3" /> Material 3-->
        <?php } ?>


        <?php if ($data['materials'] == 'material2') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" readonly value="material3" /> Material 3-->
        <?php } ?>


        <?php if ($data['materials'] == 'material3') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3 <br />-->
        <?php } ?>


        <?php if ($data['materials'] == 'material1, material2') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" readonly value="material3" /> Material 3-->
        <?php } ?>


        <?php if ($data['materials'] == 'material1 , material3') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
        <input type="checkbox" name="material2" readonly value="material2" /> Material 2
        <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3
        --><?php } ?>


        <?php if ($data['materials'] == 'material2 , material3') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" readonly value="material1" /> Material 1
        <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
        <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3
        --><?php } ?>


        <?php if ($data['materials'] == 'material1 , material2 , material3') { ?>
          <input type="text" required="required" name="materials" id="materials" readonly="readonly" value="<?php echo $data['materials'] ?>" />
          <!--<input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
        <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
        <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3
        --><?php } ?>




        <label for="week"> Week (1-52 weeks):</label>
        <input type="number" id="week" name="week" min="1" max="52" readonly="readonly" value="<?php echo $data['week'] ?>"> <br />
      </label>



      <label for="note">Workspace notes: <br />
        <input type="text" name="note" id="note" value="<?php echo $data['note']; ?>" /> <br />
      </label>

      <button type="submit" name="save" id="save" value="Save" class="button"> Save</button>
    </form>

    <?php back2(); ?>

</body>

</html>