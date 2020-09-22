<?php 

    include("includes/init.php");

    if(!$session->isSignedIn()) {
        redirect("login.php");
    } 

    if(empty($_GET['id'])) {
        redirect("comments.php");
    }

    $comment = Comment::findSingle($_GET['id']);
    // var_dump($comment);

    if($comment) {
        $comment->delete();

        redirect("comments.php");
    } else {
        redirect("comments.php");
    }


?>

    