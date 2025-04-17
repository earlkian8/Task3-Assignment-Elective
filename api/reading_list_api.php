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
             echo json_encode(["status" => "success", "data" => $list]);
             break;

 
         case "POST":
             $data = json_decode(file_get_contents("php://input"));
             $readingList->addReadingList($data->bookName, $data->authorName, $data->type, $data->targetDate);
             break;
 
         case "PUT":
         
         default:
             echo json_encode(["status" => "error", "message" => "Invalid request method"]);
     }
 ?>