<?php 

    // require "models/new_config.php";

    // if(!$session->isSignedIn()) {
    //     redirect("login.php");
    // }



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

        <!-- // switch ($_GET['page']) {
        //     case 'users':
        //         $page = "users";
        //     break;

        //     case 'photos':
        //         $page = "photos";
        //     break;

        //     case "editUser":
        //         $page = "editUser";
        //     break;

        //     case "addUser":
        //         $page = "addUser";
        //     break;

        //     case "deleteUser":
        //         $page = "deleteUser";
        //     break;

        //     case "login":
        //         $page = "login";
        //     break;

        //     case "logout":
        //         $page = "logout";
        //     break;
            
        //     default:
        //         $page = "home";
        //     break;
        // } -->