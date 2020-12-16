<!DOCTYPE html>
<html>

<head>
    <title>Send Maintenance Activity</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="../index.css" />
    <meta name="content" content="Send Maintenance Activity Screen" />
    <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />
</head>

<body>
    <?php
    require_once '../common/library.php';
    include '../services/api.service.php';

    session_start();
    generate_header1();
    if (isset($_GET['send']) && isset($_GET['week']) && isset($_GET['week_day'])) {
        $week = array('week' => $_GET['week'], 'week_day' => $_GET['week_day']);
        $response = Api::availability($_SESSION['username'], $week);
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
       <h3> Availability " . $_SESSION['username'] . " </h3>";
            echo "
        <tr>
        
        <th> Maintainer </th>
        
        <th> Availability  <br> 8.00-9.00</th>
        <th> Availability  <br> 9.00-10.00</th>
        <th> Availability  <br>10.00-11.00</th>
        <th> Availability  <br>11.00-12.00</th>
        <th> Availability  <br>12.00-13.00</th>
        <th> Availability  <br>13.00-14.00</th>
        <th> Availability  <br>14.00-15.00</th>
        <th> Availability  <br>15.00-16.00</th>
        </tr>";



            echo " <tr> <td style='text-align:center;  width:10%;'> " . $_SESSION['username'] . "</td>";

            foreach ($response as $_ => $data) {
                echo " <td " . $color0 . " 'class=\"clickable-row\"";
                if ($data != 0) {
                    echo "onClick=\"javascript:window.location.href=''\">" . $data . "min</td>";
                } else {
                    echo "'\">" . $data . "min</td>";
                }



                /*
                echo " <td " . $color0 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min1'] . "'\">" . $data . "min</td>
        <td " . $color0 . " 'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min2'] . "'\">" . $data['9'] . "min</td>
        <td " . $color0 . "   'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min3'] . "'\">" . $data['10'] . "min</td>
        <td " . $color0 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min4'] . "'\">" . $data['11'] . "min</td>
        <td " . $color0 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min5'] . "'\">" . $data['12'] . "min</td>
        <td " . $color0 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min6'] . "'\">" . $data['13'] . "min</td>
        <td  " . $color0 . " 'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min7'] . "'\">" . $data['14'] . "min</td>
        <td  " . $color0 . " 'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min7'] . "'\">" . $data['15'] . "min</td>
      */
            }

            echo " </tr>  
         </tbody>
         </table>";
            ?>
        </div>

        <div class="tableFunctionsSend">
            <div class="tableFunctionsSend"></div>

            <a href='view-maintenance-activity.screen.php?send=yes/activity/" "/assign?username="'>
                <img src="../assets/send.png" class="image1" title="Send maintenance activity to maintainer">
            </a>
        </div>

    <?php

    }


    ?>

</body>

</html>