<?php
    
class ReadingList{
    private $conn;
    private $table = "reading_list";

    public function __construct($db)
    {
        $this->conn = $db;

    }
    
    public function getAllReadingList(){
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     public function addReadingList($bookName, $authorName, $type, $targetDate){
       $query = "INSERT INTO reading_list (book_name, author_name, type, target_date)
                 VALUES (:bookName, :authorName, :type, :targetDate)";
       $stmt = $this->conn->prepare($query);
       $stmt->execute([':bookName' => $bookName, ':authorName' => $authorName, ':type' => $type, ':targetDate' => $targetDate]);
     }

     public function updateReadingList($readId, $bookName, $authorName, $type, $targetDate){
        $query = "UPDATE reading_list
                  SET book_name = :bookName, author_name = :authorName, type = :type, target_date = :targetDate
                  WHERE read_id = :readId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':bookName' => $bookName, ':authorName' => $authorName, ':type' => $type, ':targetDate' => $targetDate, ':readId' => $readId]);
     }

     public function deleteReadingList($readId){
        $query = "DELETE FROM reading_list WHERE read_id = :readId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':readId' => $readId]);
     }

     

}


?>