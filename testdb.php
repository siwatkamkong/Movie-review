<?php
include_once "dbcon.php";

try{
    $sql = "SELECT id, title, review, rating, img, created_at FROM reviews";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        echo "id: " . $row['id'] . "<br>";
        echo "title: " . $row['title'] . "<br>";
        echo "review: " . $row['review'] . "<br>" ;
        echo "img: " . $row['img'] . "<br>" ;
        echo "created_at: " . $row['created_at'] . "<br>" ;
    }
} catch (PDOException $e) {
    echo "Error retrieving data: " . $e->getMessage();
}
?>