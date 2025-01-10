<?php
require 'db/db.php';

$id = $_GET['id'];

$query = $db->prepare("DELETE FROM urunler WHERE id = ?");
$query->execute([$id]);

header('Location: urunler.php'); 
exit;
?>
