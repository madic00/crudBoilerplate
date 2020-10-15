<?php 

    require_once "../../models/init.php";

    jsonHeaders();

    if(isset($_POST["insertCategory"])) {
        $newCat = new Category();
        $newCat->name = $_POST['categoryName'];

        $newCat->insert();

        goodHttpResponse();

        $data = ["category" => $newCat, "error" => "", "status" => true];

        // var_dump($newCat);

    } else {
        badHttpRequest();

        $data = ["category" => null, "error" => "Click new category first!"];
    }

    echo json_encode($data);


?>