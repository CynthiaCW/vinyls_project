<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/Database.php';
    include_once '../class/Vinyl.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Vinyl($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->picture_link = $data->picture_link;
    $item->title = $data->title;
    $item->band = $data->band;
    $item->year_release = $data->year_release;
    $item->genre = $data->genre;
    $item->description = $data->description;
    $item->available = $data->available;

    try{
        $item->createVinyl();
        echo 'Vinyl created successfully';
    }catch(Error $e){
        $e->getMessage();
        echo 'Vinyl could not be created';
    }
    
?>