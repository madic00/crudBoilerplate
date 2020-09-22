<?php 

    // if(!$session->isSignedIn()) {
    //     redirect("login.php");
    // } 

    if(empty($_GET['id'])) {
        redirect("index.php?page=users");
    }

    $user = User::getSingle($_GET['id']);
    // var_dump($user);

    if($user) {
        $user->deleteUserImg();

        $session->message("The user has been deleted");

        redirect("index.php?page=users");
    } else {
        redirect("index.php?page=users");
    }


?>

    