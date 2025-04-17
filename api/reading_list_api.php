<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");

    include "database.php";
    include "../class/ReadingList.php";

    $database = new Database();
    $db = $database->getConnection();

    $readingList = new ReadingList($db);

    $method = $_SERVER["REQUEST_METHOD"];

    switch ($method){
        case "GET":
            $list = $readingList->getAllReadingList();
            echo json_encode(["status" => "success", "lists" => $list]);
            break;


        case "POST":
            $postData = file_get_contents("php://input");
            $data = json_decode($postData, true);
            $readingLists = $readingList->addReadingList($data["bookName"], $data["authorName"], $data["type"], $data["targetDate"]);
            echo json_encode(["status" => "success", "readingLists" => $readingLists]);
            break;

        case "PUT":
            $putData = file_get_contents("php://input");
            $data = json_decode($putData, true);
            $readingLists = $readingList->updateReadingList($data["editId"], $data["editBookName"], $data["editAuthorName"], $data["editBookType"], $data["editTargetDate"]);
            echo json_encode(["status" => "success", "readingLists" => $readingLists]);
            break;
        
        case "DELETE":
            $deleteData = file_get_contents("php://input");
            $data = json_decode($deleteData, true);
            $readingLists = $readingList->deleteReadingList($data["deleteId"]);
            break;
        case "PATCH":
            $patchData = file_get_contents("php://input");
            $data = json_decode($patchData, true);
            $readingLists = $readingList->updateReadingStatus($data["readId"], $data["status"]);
            echo json_encode(["status" => "success", "readingLists" => $readingLists]);
            break;
        
        default:
            echo json_encode(["status" => "error", "message" => "Invalid request method"]);
        }
?>