<?php 

    // require "models/new_config.php";

    // if(!$session->isSignedIn()) {
    //     redirect("login.php");
    // }
    
    require_once "models/init.php";

    if(!isset($_GET['page'])) {
        $page = "home";
    } else {
        $page = $_GET['page'];
    }

    include "views/fixed/header.php";
    include "views/fixed/nav.php";
    include "views/{$page}.php";
    include "views/fixed/footer.php";


?>
