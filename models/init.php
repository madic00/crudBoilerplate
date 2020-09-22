<?php 

    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
    define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT']. "/phpOOP/crudBoilerplate");
    define("MODELS", SITE_ROOT . "/models");
    define("IMG_PATH", SITE_ROOT . "/assets/images");

    require_once "functions.php";

    require_once "database.php";
    require_once "dbObject.php";
    require_once MODELS . "/user.php";
    require_once MODELS . "/photo.php";
    require_once MODELS . "/session.php";
    require_once MODELS . "/comment.php";

?>