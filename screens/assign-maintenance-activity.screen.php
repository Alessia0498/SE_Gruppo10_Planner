<!DOCTYPE html>
<html>

<head>
    <title>Assign Maintenance activity</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="../index.css" />
    <meta name="content" content="Assign Maintenance Activity Screen" />
    <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />
</head>

<body>
    <?php
    require_once '../common/library.php';
    include '../services/api.service.php';

    session_start();
    generate_header1();
    if (isset($_GET['assign']) && isset($_GET['activity_id'])  && isset($_GET['user'])  && isset($_GET['week_day']) && isset($_GET['start_time'])) {
        Api::assign($_GET["activity_id"], $_GET['user'], $_GET['week_day'], $_GET['start_time']);
        echo '<h3 style="text-align: center; color: green">Maintenance activity assigned!</h3>';
    }
    back2();
    ?>
</body>

</html>