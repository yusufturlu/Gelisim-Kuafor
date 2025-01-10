<?php
require 'db/db.php';

$id = $_GET['id'];

$query = $db->prepare("SELECT * FROM kuafor WHERE id = ?");
$query->execute([$id]);
$kuafor = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bakim_adi = $_POST['bakim_adi'];
    $fiyat = $_POST['fiyat'];

    $query = $db->prepare("UPDATE kuafor SET bakim_adi = ?, fiyat = ? WHERE id = ?");
    $query->execute([$bakim_adi, $fiyat,$id]);

    header('Location: kuafor.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hizmet Düzenle</title>
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
    <h1>Hizmeti Düzenle</h1>
    <form method="POST">
        <input type="text" placeholder="Hizmet İsmi" name="bakim_adi" value="<?= $kuafor['bakim_adi'] ?>" required><br>
        <input type="number" placeholder="Fiyat" step="0.01" name="fiyat" value="<?= $kuafor['fiyat'] ?>" required><br>
        <button type="submit">Güncelle</button>
    </form>
</body>
</html>
