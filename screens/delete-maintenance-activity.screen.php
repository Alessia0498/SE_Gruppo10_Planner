<!DOCTYPE html>
<html>

<head>
    <title>Delete Maintenance activity</title>
    <meta name="author" content="gruppo 10" />
    <link rel="stylesheet" type="text/css" href="../index.css" />
    <meta name="content" content="Delete Maintenance Activity Screen" />
    <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
    <meta charset="utf-8" />
</head>

<body>
    <?php
    require_once '../common/library.php';
    include '../services/api.service.php';

    generate_header1();
    if (isset($_GET['delete']) && isset($_GET['id'])) {
        Api::delete_maintenance_activity($_GET["id"]);
        echo '<h3 style="text-align: center; color: green">User deleted!</h3>';
    }
    back2();
    ?>
</body>

</html>