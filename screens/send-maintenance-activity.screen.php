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
        $response = json_decode($response, true);
        var_dump($response);




        foreach ($response as  $data) {

            switch ($data) {
                case 0:
                    $color0 = ("style=\"background:red; text-align:center; width:10%;\"");
                    break;

                case 20:
                    $color0 = ("style=\"background:orange; text-align:center; width:10%;\"");
                    break;

                case 35:
                    $color0 = ("style=\"background:yellow; text-align:center; width:10%;\"");
                    break;


                case 50:
                    $color0 = ("style=\"background:#8cff40; text-align:center; width:10%;\"");
                    break;

                case 60:
                    $color0 = ("style=\"background:green; text-align:center; width:10%;\"");
                    break;
            }
        }


        /*switch ($maintainer['skills']) {
            case 0:
                $color7 = ("style=\"background:red; text-align:center; width:10%;\"");
                break;

            case 1:
                $color7 = ("style=\"background:#ff4d00; text-align:center; width:10%;\"");
                break;


            case 2:
                $color7 = ("style=\"background:orange; text-align:center; width:10%;\"");
                break;

            case 3:
                $color7 = ("style=\"background:yellow; text-align:center; width:10%;\"");
                break;


            case 4:
                $color7 = ("style=\"background:#8cff40; text-align:center; width:10%;\"");
                break;

            case 5:
                $color7 = ("style=\"background:green; text-align:center; width:10%;\"");
                break;
        }*/
    ?>

        <div class="content">
            <div class="tableFunctions"> </div>
            <?php
            /*  echo "
        <h2 style='text-align:center'> Maintenance Activity Information </h2> 
        <table  class='table3' border='1'>
        <tr>
        <td style='text-align:center; width:10%;'> Id: " . $data['id'] . "</td>
        <td style='text-align:center;  width:10%;'>Area: " . $data['area'] . "</td>
        <td style='text-align:center; width:10%;'>Tipology: " . $data['tipology'] . "</td>
        <td style='text-align:center; width:10%;'>Estimated Intervention Time: " . $data['time'] . "</td>
        <td style='text-align:center; width:10%;'>Week number: " . $data['week'] . "</td>
        <td style='text-align:center; width:10%;'>Workspace notes: " . $data['note'] . "</td>
        </tr>
            echo "
        <br>*/


            echo "
        <table class='table3'  border='1'>
       <caption>
       <h3> Availability " . $_SESSION['username'] . " </h3>";/*<p " . $color0 . ">" . $_GET['availability'] . " %</p></caption>
*/
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
            /* <td " . $color7 . " > " . $maintainer['skills'] . "/" . $skills . "</td> */
            foreach ($response as $_ => $data) {
                echo " <td " . $color0 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href=''\">" . $data . "min</td>";



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