<?php
require 'db/db.php';

$query = $db->query("SELECT * FROM urunler"); 
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Ürün Yönetimi</title>
    <style>
        *{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color:rgb(0, 139, 231);
            text-decoration: none;
        }
        a:hover {
            color: #a5890e;
        }
    </style>
</head>
<body>
    <h1>Ürünler</h1>
    <a href="add.php">Yeni Ürün Ekle</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ürün Adı</th>
            <th>Fiyat</th>
            <th>İşlemler</th>
        </tr>
        <?php while ($product = $query->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['urun_adi'] ?></td>
                <td><?= $product['fiyat'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $product['id'] ?>">Düzenle</a> | 
                    <a href="delete.php?id=<?= $product['id'] ?>">Sil</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
