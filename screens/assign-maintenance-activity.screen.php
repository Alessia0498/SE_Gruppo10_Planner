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
    if (isset($_GET['assign'])) {
        Api::assign($_SESSION["activity_id"], $_SESSION['username']);
        echo '<h3 style="text-align: center; color: green">Maintenance activity assigned!</h3>';
    }
    back2();
    ?>
</body>

</html>