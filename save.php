<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $target_dir = "uploads/"; //image upload folder name
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    //moving multiple images inside folder
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $data = array("data" => "File is valid, and was successfully uploaded.");
        print json_encode($data);
    }
?>