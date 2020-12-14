<!DOCTYPE html>
<html>

<head>
  <title>Forward Maintenance Activity</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="Forward Maintenance Activity Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  generate_header1();
  if (isset($_GET['id'])) {
    //$response = Api::get_maintenance_activity($_GET['id']);
    // $data = json_decode($response, true);
    $data =  array(
      'id' => 1, 'area' => 'zone1', 'tipology' => 'electrical', 'eit' => '30min', 'time' => '30min',
      'week' => 3, 'note' => 'notes', 'description' => 'description'
    );

    $skills=5;
    $competencies = array('competence1', 'competence2', 'competence3');
    $maintainer =  array(
      'name' => 'Pippo', 'skills' => 1, 'percentage1' => 80, 'percentage2' => 100,
      'percentage3' => 20, 'percentage4' => 0, 'percentage5' => 50, 'percentage6' => 20, 'percentage7' => 100,
    );
  }


  switch ($maintainer['percentage1']) {
    case 0:
      $color = ("style=\"background:red; text-align:center; width:10%;\"");
      break;

    case 20:
      $color = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
      break;

    case 50:
      $color = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
      break;


    case 80:
      $color = ("style=\"background:#8cff40; text-align:center; width:10%;cursor:pointer;\"");
      break;

    case 100:
      $color = ("style=\"background:green; text-align:center; width:10%;cursor:pointer;\"");
      break;
  }

  switch ($maintainer['percentage2']) {
    case 0:
      $color1 = ("style=\"background:red; text-align:center; width:10%;\"");
      break;

    case 20:
      $color1 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
      break;

    case 50:
      $color1 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
      break;


    case 80:
      $color1 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
      break;

    case 100:
      $color1 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
      break;
    }

    switch ($maintainer['percentage3']) {
      case 0:
        $color2 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;
  
      case 20:
        $color2 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
      case 50:
        $color2 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
  
      case 80:
        $color2 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;
  
      case 100:
        $color2 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }

    switch ($maintainer['percentage4']) {
      case 0:
        $color3 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;
  
      case 20:
        $color3 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
      case 50:
        $color3 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
  
      case 80:
        $color3 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;
  
      case 100:
        $color3 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }


    switch ($maintainer['percentage5']) {
      case 0:
        $color4 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;
  
      case 20:
        $color4 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
      case 50:
        $color4 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
  
      case 80:
        $color4 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;
  
      case 100:
        $color4 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }

    switch ($maintainer['percentage6']) {
      case 0:
        $color5 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;
  
      case 20:
        $color5 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
      case 50:
        $color5 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
  
      case 80:
        $color5 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;
  
      case 100:
        $color5= ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }
  
    switch ($maintainer['percentage7']) {
      case 0:
        $color6 = ("style=\"background:red; text-align:center; width:10%;\"");
        break;
  
      case 20:
        $color6 = ("style=\"background:orange; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
      case 50:
        $color6 = ("style=\"background:yellow; text-align:center; width:10%;cursor:pointer;\"");
        break;
  
  
      case 80:
        $color6 = ("style=\"background:#8cff40; text-align:center; width:10%; cursor:pointer;\"");
        break;
  
      case 100:
        $color6 = ("style=\"background:green; text-align:center; width:10%; cursor:pointer;\"");
        break;
    }
  


   switch($maintainer['skills']){
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
        </tr>
        
        <br>

        <table class='table3'  border='1'>
       <caption>
       <h3>Maintainer Availability </h3> </caption>

        <tr>
        <th>Skills Needed</th>
        <th> Maintainer </th>
        <th> Skills </th>
        <th> Availability  Monday</th>
        <th> Availability  Tuesday</th>
        <th> Availability  Wednesday</th>
        <th> Availability  Thursday</th>
        <th> Availability  Friday</th>
        <th> Availability  Saturday</th>
        <th> Availability  Sunday</th>
        </tr>

        
        <td style='width:10%; text-align:center;'>
      
        <p>" . $competencies[0] . "</p>
        <p>" . $competencies[1] . "</p>
        <p>" . $competencies[2] . "</p>
       
        </td>
      
    
        
        <td style='text-align:center;  width:10%;'> " . $maintainer['name'] . "</td>
        <td " . $color7. " > " . $maintainer['skills'] . "/".$skills."</td> 


      
        <td " . $color . "  'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage1'] . "'\">" . $maintainer['percentage1'] . "%</td>
        <td " . $color1 . " 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage2'] . "'\">" . $maintainer['percentage2'] . "%</td>
        <td ". $color2 ."   'class=\"clickable-row\" "; if ($maintainer['percentage3']!=0){  echo"onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage3'] . "'\">" . $maintainer['percentage3'] ."%";  else{ echo $maintainer['percentage3']}"</td>"; 
         echo " <td ". $color3 ."  'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage4'] . "'\">" . $maintainer['percentage4'] . "%</td>
        <td ". $color4 ."  'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage5'] . "'\">" . $maintainer['percentage5'] . "%</td>
        <td ". $color5 ."  'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage6'] . "'\">" . $maintainer['percentage6'] . "%</td>
        <td  ". $color6 ." 'class=\"clickable-row\" onClick=\"javascript:window.location.href='send-maintenance-activity.screen.php?availability=" . $maintainer['percentage7'] . "'\">" . $maintainer['percentage7'] . "%</td>
        </tr>  
         </tbody>
         </table>
         </td>
        </tr></table>";
    ?>
  </div>
</body>

</html>