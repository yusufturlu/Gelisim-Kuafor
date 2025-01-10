<?php
require 'db/db.php';

$id = $_GET['id'];

$query = $db->prepare("DELETE FROM kuafor WHERE id = ?");
$query->execute([$id]);

header('Location: kuafor.php'); 
exit;
?>
