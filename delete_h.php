<?php
require 'db/db.php';

$id = $_GET['id'];

$query = $db->prepare("DELETE FROM hizmetler WHERE id = ?");
$query->execute([$id]);

header('Location: hizmetler.php'); 
exit;
?>
