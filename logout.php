<?php 

require 'db/db.php';

session_start();

if (isset($_SESSION['admin'])) {
    session_destroy();
    header('Location: admin-login.php');
} else {
    header('Location: index.html');
}

?>