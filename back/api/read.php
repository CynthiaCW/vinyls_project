<?php
    ini_set('display_errors',1);
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/Database.php';
    include_once '../class/Vinyl.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Vinyl($db);

    $stmt = $items->getVinyls();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $vinylArr = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "picture_link" => $picture_link,
                "title" => $title,
                "band" => $band,
                "year_release" => $year_release,
                "genre" => $genre,
                "description" => $description,
                "available" => $available
            );

            array_push($vinylArr, $e);
        }
        echo json_encode($vinylArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }

   
?>