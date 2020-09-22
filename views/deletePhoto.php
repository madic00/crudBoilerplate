<?php 

    include("includes/init.php");

    // if(!$session->isSignedIn()) {
    //     redirect("login.php");
    // } 

    if(empty($_GET['id'])) {
        redirect("index.php?page=photos");
    }

    $photo = Photo::getSingle($_GET['id']);
    // var_dump($photo);

    if($photo) {
        $photo->deletePhoto();

        $session->message("The photo has been deleted");
        redirect("index.php?page=photos");
    } else {
        redirect("index.php?page=photos");
    }


?>

    