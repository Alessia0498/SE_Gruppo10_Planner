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

  $response = Api::get_maintenance_activity($_GET['id']);
  $data = json_decode($response, true);
  ?>

  <div class="form">

    <form method="post" action="view-maintenance-activity.screen.php?modify=yes&id=<?php echo $data['id']; ?>" id="form2" name="form2" enctype="multipart/form-data">


      <label for="type"> Activity Type:
        <select name="type" id="type" title="Select type" readonly="readonly">
          <?php if ($data['type'] == 'pa') { ?>
            <option value="pa" selected>Planned Activity</option>
            <option value="ua">Un-planned Activity (EWO)</option>
            <option value="ea">Extra Activity </option>
          <?php } ?>
          <?php if ($data['type'] == 'ua') { ?>
            <option value="pa">Planned Activity</option>
            <option value="ua" selected>Un-planned Activity (EWO)</option>
            <option value="ea">Extra Activity </option>
          <?php } ?>
          <?php if ($data['type'] == 'ea') { ?>
            <option value="pa">Planned Activity</option>
            <option value="ua">Un-planned Activity (EWO)</option>
            <option value="ea" selected>Extra Activity </option>
          <?php } ?>
        </select>
      </label>



      <br />

      <label for="site">Site (branch offices):
        <input type="text" required="required" name="site" id="site" readonly="readonly" value="<?php echo $data['site'] ?>" />
      </label>


      <label for="area"> Area (department):
        <input type="text" required="required" name="area" id="area" readonly="readonly" value="<?php echo $data['area'] ?>" />
      </label>


      <label for="tipology"> Activity's tipology:
        <select name="tipology" id="tipology" readonly="readonly">


          <?php if ($data['tipology'] == 'electrical') { ?>
            <option value="electrical" selected> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>

          <?php } ?>

          <?php if ($data['tipology'] == 'electronic') { ?>
            <option value="electrical"> Electrical</option>
            <option value="electronic" selected> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>

          <?php } ?>


          <?php if ($data['tipology'] == 'hydraulic') { ?>
            <option value="electrical"> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic" selected> Hydraulic</option>
            <option value="mechanical"> Mechanical</option>

          <?php } ?>


          <?php if ($data['tipology'] == 'mechanical') { ?>
            <option value="electrical"> Electrical</option>
            <option value="electronic"> Electronic</option>
            <option value="hydraulic"> Hydraulic</option>
            <option value="mechanical" selected> Mechanical</option>

          <?php } ?>

        </select>
      </label>


      <label for="description"> Activity Description: <br />
        <textarea rows="5" cols="81" required="required" name="description" id="description" readonly="readonly" value="<?php echo $data['description'] ?>"> </textarea> <br />
      </label>

      <br />


      <label for="time"> Estimated intervention time (min):</label>
      <input type="number" id="time" name="time" min="1" max="480" readonly="readonly" value="<?php echo $data['time'] ?>"> <br />
      </label>


      <p>Interruptible Activity:</p>
      <? php  if ($data['interruptible'] == 'yes'){ ?>
      <input type="radio" id="yes" name="interruptible" value="yes" selected readonly="readonly">
      <label for="yes">Yes</label><br>
      <input type="radio" id="no" name="interruptible" value="no" readonly="readonly">
      <label for="no">No</label><br>
      <? php } ?>

      <? php  if ($data['interruptible'] == 'no'){ ?>
      <input type="radio" id="yes" name="interruptible" value="yes" readonly="readonly">
      <label for="yes">Yes</label><br>
      <input type="radio" id="no" name="interruptible" value="no" selected readonly="readonly">
      <label for="no">No</label><br>
      <? php } ?>

      <br />


      <legend>Materials:</legend><br>
      <? php  if (isset($data['material1'])){ ?>
      <input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" readonly value="material3" /> Material 3
      <? php } ?>
      <br />

      <? php  if (isset($data['material2'])){ ?>
      <input type="checkbox" name="material1" readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" readonly value="material3" /> Material 3
      <? php } ?>
      <br />

      <? php  if (isset($data['material3'])){ ?>
      <input type="checkbox" name="material1" readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3 <br />
      <? php } ?>
      <br />

      <? php  if (isset($data['material1']) && isset($data['material2']) ){ ?>
      <input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" readonly value="material3" /> Material 3
      <? php } ?>
      <br>

      <? php  if (isset($data['material1']) && isset($data['material3']) ){ ?>
      <input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3
      <? php } ?>
      <br>

      <? php  if (isset($data['material2']) && isset($data['material3']) ){ ?>
      <input type="checkbox" name="material1" readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3
      <? php } ?>
      <br>

      <? php  if (isset($data['material1']) && isset($data['material2']) && isset($data['material3']) ){ ?>
      <input type="checkbox" name="material1" selected readonly value="material1" /> Material 1
      <input type="checkbox" name="material2" selected readonly value="material2" /> Material 2
      <input type="checkbox" name="material3" selected readonly value="material3" /> Material 3
      <? php } ?>
      <br>



      <label for="week"> Week (1-52 weeks):</label>
      <input type="number" id="week" name="week" min="1" max="52" readonly="readonly" value="<?php echo $data['week'] ?>"> <br />
      </label>

      <br />

      <label for="note">Workspace notes: <br />
        <textarea rows="5" cols="81" name="note" id="note" value="<?php echo $data['note'] ?>"> </textarea> <br />
      </label>

      <button type="submit" name="save" id="save" value="Save" class="button"> Save</button>
    </form>

    <?php back2(); ?>

</body>

</html>