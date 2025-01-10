<?php 

require 'db/db.php';

session_start();


if (!isset($_SESSION['admin'])) {
    header('Location: admin-login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            text-align: center;
        }
        h1 {
            margin-top: 50px;
        }
        ul {
            list-style-type: none;
            margin-top: 50px;
        }
        li {
            display: inline;
            margin-right: 20px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            color: blue;
        }
        p {
            margin-top: 50px;
        }
        a {
            margin-top: 20px;
            display: block;
            width: 200px;
            margin: 0 auto;
            padding: 10px;
            background-color: #f1f1f1;
            color: black;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <ul>
        <li><a href="hizmetler.php">Bakım Hizmetleri</a></li>
        <li><a href="kuafor.php">Kuaför Hizmetleri</a></li>
        <li><a href="urunler.php">Ürünler</a></li>
        <li><a href="logout.php">Çıkış Yap</a></li>
    </ul>
    <p>Hoşgeldiniz, Admin <?php echo $_SESSION['admin'] ?> </p>
    <a href="add_h.php">Yeni Hizmet Ekle</a>
    <a href="add.php">Yeni Ürün Ekle</a>
    <a href="add_k.php">Yeni Kuaför Hizmeti Ekle</a>
</body>
</html>