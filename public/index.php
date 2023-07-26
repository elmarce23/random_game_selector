<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Random Game Selector</title>
</head>

<body>

    <?php

    require_once 'config/config.php';
    require_once 'model/db.php';

    if (!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
    if (!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

    $controller_path = 'controller/' . $_GET["controller"] . '.php';

    /* Check if controller exists */
    if (!file_exists($controller_path)) $controller_path = 'controller/' . constant("DEFAULT_CONTROLLER") . '.php';

    /* Load controller */
    require_once $controller_path;
    $controllerName = $_GET["controller"] . 'Controller';
    $controller = new $controllerName();

    /* Check if method is defined */
    $dataToView["data"] = array();
    if (method_exists($controller, $_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();


    /* Load views */
    //require_once 'view/template/header.php';
    require_once 'views/' . $controller->view . '.php';
    require_once 'views/footer.php';

    ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>