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

    generate_header1();
    if (isset($_GET['availability'])) {


        $data =  array(
            'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
            'week' => 3, 'note' => 'notes', 'description' => 'description', 'day' => 18
        );

        $skills = 5;

        $maintainer =  array(
            'name' => 'Pippo', 'skills' => 1, 'min1' => 30, 'min2' => 35,
            'min3' => 60, 'min4' => 50, 'min5' => 50, 'min6' => 40, 'min7' => 60
        );
        // }

        switch ($_GET['availability']) {
            case 0:
                $color0 = ("style=\"background:red; text-align:center; width:10%;\"");
                break;

            case 20:
                $color0 = ("style=\"background:orange; text-align:center; width:10%;\"");
                break;

            case 50:
                $color0 = ("style=\"background:yellow; text-align:center; width:10%;\"");
                break;


            case 80:
                $color0 = ("style=\"background:#8cff40; text-align:center; width:10%;\"");
                break;

            case 100:
                $color0 = ("style=\"background:green; text-align:center; width:10%;\"");
                break;
        }

        switch ($maintainer['min1']) {
            case 30:
                $color = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 35:
                $color = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }

        switch ($maintainer['min2']) {
            case 30:
                $color1 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 35:
                $color1 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color1 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color1 = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color1 = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }

        switch ($maintainer['min3']) {
            case 30:
                $color2 = ("style=\"background:yellow; text-align:center; width:10%; cursor:pointer;\"");
                break;

            case 35:
                $color2 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color2 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color2 = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color2 = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }

        switch ($maintainer['min4']) {
            case 30:
                $color3 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 35:
                $color3 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color3 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color3 = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color3 = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }


        switch ($maintainer['min5']) {
            case 30:
                $color4 = ("style=\"background:yellow; text-align:center; width:10%; cursor:pointer;\"");
                break;

            case 35:
                $color4 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color4 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color4 = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color4 = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }

        switch ($maintainer['min6']) {
            case 30:
                $color5 = ("style=\"background:yellow; text-align:center; width:10%; cursor:pointer;\"");
                break;

            case 35:
                $color5 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color5 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color5 = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color5 = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }

        switch ($maintainer['min7']) {
            case 30:
                $color6 = ("style=\"background:yellow; text-align:center; width:10%; cursor:pointer;\"");
                break;

            case 35:
                $color6 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 40:
                $color6 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
                break;


            case 50:
                $color6 = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
                break;

            case 60:
                $color6 = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
                break;
        }


        switch ($maintainer['skills']) {
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
        }
    ?>

        <div class="content">
            <div class="tableFunctions"> </div>
            <?php
            echo "
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
        
        <br>

        <table class='table3'  border='1'>
       <caption>
       <h3> Availability " . $maintainer['name'] . " </h3><p " . $color0 . ">" . $_GET['availability'] . " %</p></caption>

        <tr>
        
        <th> Maintainer </th>
        <th> Skills </th>
        <th> Availability  <br> 8.00-9.00</th>
        <th> Availability  <br> 9.00-10.00</th>
        <th> Availability  <br>10.00-11.00</th>
        <th> Availability  <br>11.00-12.00</th>
        <th> Availability  <br>14.00-15.00</th>
        <th> Availability  <br>15.00-16.00</th>
        <th> Availability  <br>16.00-17.00</th>
        </tr>

        
        
        <td style='text-align:center;  width:10%;'> " . $maintainer['name'] . "</td>
        <td " . $color7 . " > " . $maintainer['skills'] . "/" . $skills . "</td> 


      
        <td " . $color . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min1'] . "'\">" . $maintainer['min1'] . "min</td>
        <td " . $color1 . " 'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min2'] . "'\">" . $maintainer['min2'] . "min</td>
        <td " . $color2 . "   'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min3'] . "'\">" . $maintainer['min3'] . "min</td>
        <td " . $color3 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min4'] . "'\">" . $maintainer['min4'] . "min</td>
        <td " . $color4 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min5'] . "'\">" . $maintainer['min5'] . "min</td>
        <td " . $color5 . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min6'] . "'\">" . $maintainer['min6'] . "min</td>
        <td  " . $color6 . " 'class=\"clickable-row\" onClick=\"javascript:window.location.href='" . $_SERVER['PHP_SELF'] . "?availability=" . $_GET['availability'] . "&availability_time=" . $maintainer['min7'] . "'\">" . $maintainer['min7'] . "min</td>
        </tr>  
         </tbody>
         </table>
         </td>
        </tr></table>";

            ?>
        </div>

        <div class="tableFunctionsSend">
            <div class="tableFunctionsSend"></div>

            <a href="view-maintenance-activity.screen.php?send=yes">
                <img src="../assets/send.png" class="image1" title="Send maintenance activity to maintainer">
            </a>
        </div>

    <?php

    }


    ?>

</body>

</html>