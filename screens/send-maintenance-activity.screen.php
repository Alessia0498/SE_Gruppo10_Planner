<!DOCTYPE html>
<html>

<head>
    <title>Send Maintenance Activity</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="../index.css" />
    <meta name="content" content="Send Maintenance Activity Screen" />
    <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />

    <script type="text/javascript">
        function show_message_assign(hour) {
            if (confirm("Are you sure you want assign the activity to this maintainer?")) {
                console.log("AA");
                var user = "<?php echo $_GET["user"]; ?>";
                var activity = "<?php echo $_GET["activity_id"]; ?>";
                var week_day = "<?php echo $_GET["week_day"]; ?>";

                self.location = 'assign-maintenance-activity.screen.php?assign=yes&user=' + user + '&activity_id=' + activity + "&week_day=" + week_day + "&start_time=" + hour;
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

    session_start();
    generate_header1();
    if (isset($_GET['send']) && isset($_GET['activity_id']) && isset($_GET['week_day']) && isset($_GET['user'])) {
        $week = array('activity_id' => $_GET['activity_id'], 'week_day' => $_GET['week_day']);
        $response = Api::availability($_GET['user'], $week);
        $response = json_decode($response, true);;




        foreach ($response as  $data) {

            switch ($data) {
                case 0:
                    $color0 = ("style=\"background:red; text-align:center; width:10%;\"");
                    break;

                case 20:
                    $color0 = ("style=\"background:orange; text-align:center; width:10%; cursor:pointer;\"");
                    break;

                case 35:
                    $color0 = ("style=\"background:yellow; text-align:center; width:10%; cursor:pointer;\"");
                    break;


                case 50:
                    $color0 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
                    break;

                case 60:
                    $color0 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
                    break;
            }
        }

    ?>

        <div class="content">
            <div class="tableFunctions"> </div>
            <?php



            echo "
        <table class='table3'  border='1'>
       <caption>
       <h3> Availability " . $_GET['user'] . " </h3>";
            echo "
        <tr>
        
        <th> Maintainer </th>";

            foreach ($response as $hour => $time_left) {
                echo "<th> Availability  <br> " . $hour . ".00-" . ($hour + 1) . ".00</th>";
            }


            echo " <tr> <td style='text-align:center;  width:10%;'> " . $_GET['user'] . "</td>";

            foreach ($response as $hour => $data) {
                echo " <td " . $color0 . " 'class=\"clickable-row\"";
                if ($data != 0) {
                    echo "onclick=\"show_message_assign(" . $hour . ");\" >" . $data . "min</td>";
                } else {
                    echo "'\">" . $data . "min</td>";
                }
            }

            echo " </tr>  
         </tbody>
         </table>";
            ?>
        </div>



    <?php

    }


    ?>

</body>

</html>