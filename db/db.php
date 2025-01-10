<?php 

try {
    $db = new PDO("mysql:host=localhost;dbname=gelisim;charset=utf8", "root", "") ;
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

?>