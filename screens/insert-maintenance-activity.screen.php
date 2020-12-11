<!DOCTYPE html>
<html>

<head>
    <title> Insert Maintenance Activity </title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="../index.css" />
    <meta name="content" content="Maintenance Activity Screen" />
    <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />
</head>

<body>
    <?php
    require_once '../common/library.php';
    include '../services/api.service.php';


    generate_header1();
    session_start();
    if (isset($_GET['error'])) {
        $message = "";
        echo '<h3 style="text-align: center; color: red">' . $message . '</h3>';
    }




    ?>



    <div class="form">
        <form method="post" action="view-maintenance-activity.screen.php" id="form1" name="form1" enctype="multipart/form-data">


            <label for="type"> Activity Type: *
                <select name="type" id="type" title="Select type">
                    <option value="pa">Planned Activity</option>
                    <option value="up">Un-planned Activity (EWO)</option>
                    <option value="ea">Extra Activity</option>
                </select>
            </label>


            <br />

            <label for="site">Site (branch offices): *
                <input type="text" required="required" name="site" id="site" placeholder="Enter a site" title="Enter a site" />
            </label>


            <label for="area"> Area (department): *
                <input type="text" required="required" name="area" id="area" placeholder="Enter a area" title="Enter a area" />
            </label>


            <label for="tipology"> Activity's tipology: *
                <select name="tipology" id="tipology" title="Select tipology">
                    <option value="eletrical"> Eletrical</option>
                    <option value="electronic"> Electronic</option>
                    <option value="hydraulic"> Hydraulic</option>
                    <option value="mechanical"> Mechanical</option>
                </select>
            </label>


            <label for="description"> Activity Description: * <br />
                <textarea rows="5" cols="81" required="required" name="description" id="description" placeholder="Enter an activity description" title="Enter an activity description "> </textarea> <br />
            </label>

            <br />


            <label for="time"> Estimated intervention time (min): *</label>
            <input type="number" id="time" name="time" min="1" max="480"> <br />
            </label>


            <p>Interruptible Activity: *</p>
            <input type="radio" id="yes" name="interruptible" value="yes">
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="interruptible" value="no">
            <label for="no">No</label><br>

            <br />


            <legend>Materials:</legend><br>
            <input type="checkbox" name="materials[]" value="material1" /> Material 1
            <br />
            <input type="checkbox" name="materials[]" value="material2" /> Material 2
            <br />
            <input type="checkbox" name="materials[]" value="material3" /> Material 3 <br />

            <br>


            <label for="week"> Week (1-52 weeks): *</label>
            <input type="number" id="week" name="week" min="1" max="52"> <br />
            </label>

            <br />

            <label for="note">Workspace notes:<br />
                <textarea rows="5" cols="81" name="note" id="note"> </textarea> <br />
            </label>

            <br />
       <p>  (*)Fields marked with an asterisk are required  </p>
            <button type="submit" class="button" name="registered" value="Insert a new maintenance activity">Insert a new maintenance activity</button>
            <?php back2(); ?>
        </form>
    </div>


</body>

</html>