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
        <form method="post" action="view-maintenance-activity.screen.php?create=yes" id="form1" name="form1" enctype="multipart/form-data">


            <label for="type"> Activity Type: *
                <select name="activity_type" id="activity_type" title="Select type">
                    <option value="planned">Planned Activity</option>
                    <option value="unplanned">Un-planned Activity (EWO)</option>
                    <option value="extra_activity">Extra Activity</option>
                </select>
            </label>


            <br />

            <label for="site">Site (branch offices): *
                <input type="text" required="required" name="site" id="site" placeholder="Enter a site" title="Enter a site" />
            </label>

            <label for="typology"> Activity's tipology: *
                <select name="typology" id="typology" title="Select tipology">
                    <option value="electrical"> Electrical</option>
                    <option value="electronic"> Electronic</option>
                    <option value="hydraulic"> Hydraulic</option>
                    <option value="mechanical"> Mechanical</option>
                </select>
            </label>


            <label for="description"> Activity Description: *
                <textarea rows="5" cols="81" required="required" name="description" id="description" placeholder="Enter an activity description" title="Enter an activity description "> </textarea> <br />
            </label>



            <label for="estimated_time"> Estimated intervention time (min): *</label>
            <input type="number" id="estimated_time" name="estimated_time" min="1" max="480">
            </label>


            <p>Interruptible Activity: *</p>
            <input type="radio" id="interruptible" name="interruptible" value="true" required />
            <label for="yes">Yes</label>
            <input type="radio" id="interruptible" name="interruptible" value="false" required />
            <label for="no">No</label><br>

            <br />


            <legend>Materials:</legend>
            <input type="text" name="materials" id="materials" />

            <br>


            <label for="week"> Week (1-52 weeks): *</label>
            <input type="number" id="week" name="week" min="1" max="52"> <br />
            </label>



            <label for="workspace_notes">Workspace notes:<br />
                <textarea rows="5" cols="81" name="workspace_notes" id="workspace_notes"> </textarea> <br />
            </label>

            <br />
            <p> (*)Fields marked with an asterisk are required </p><br>
            <button type="submit" class="button" name="registered" value="Insert a new maintenance activity">Insert a new maintenance activity</button>
            <?php back2(); ?>
            <br>
        </form>
    </div>


</body>

</html>