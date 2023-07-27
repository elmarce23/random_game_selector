
    <?php

    require_once 'config/config.php';
    require_once 'models/db.php';

    if (!isset($_GET["controllers"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
    if (!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

    $controller_path = 'controllers/' . $_GET["controller"] . '.php';

    /* Check if controller exists */
    if (!file_exists($controller_path)) $controller_path = 'controllers/' . constant("DEFAULT_CONTROLLER") . '.php';

    /* Load controller */
    require_once $controller_path;
    $controllerName = $_GET["controller"] . 'Controller';
    $controller = new $controllerName();

    /* Check if method is defined */
    $dataToView["data"] = array();
    if (method_exists($controller, $_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();


    /* Load views */
    require_once 'views/header.php';
    require_once 'views/' . $controller->view . '.php';
    require_once 'views/footer.php';

    ?>

    