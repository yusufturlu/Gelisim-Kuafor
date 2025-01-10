<?php
require 'db/db.php';

$id = $_GET['id'];

$query = $db->prepare("SELECT * FROM urunler WHERE id = ?");
$query->execute([$id]);
$product = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $urun_adi = $_POST['urun_adi'];
    $fiyat = $_POST['fiyat'];

    $query = $db->prepare("UPDATE urunler SET urun_adi = ?, fiyat = ? WHERE id = ?");
    $query->execute([$urun_adi, $fiyat,$id]);

    header('Location: urunler.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürün Düzenle</title>
    <style>
        *{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }

        h1 {
            margin-top: 20px;
            letter-spacing: 1px;
        }

        form {
            margin-top: 20px;
            display: inline-block;
            border: 1px solid #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            background-color: #f8f9fa;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input {
            padding: 10px;
            margin: 10px;
            width: 200px;
        }
        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Ürün Düzenle</h1>
    <form method="POST">
        <input type="text" placeholder="Ürün İsmi" name="urun_adi" value="<?= $product['urun_adi'] ?>" required><br>
        <input type="number" placeholder="Fiyat" step="0.01" name="fiyat" value="<?= $product['fiyat'] ?>" required><br>
        <button type="submit">Güncelle</button>
    </form>
</body>
</html>
