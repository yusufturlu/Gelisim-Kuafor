<?php

require 'db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hizmet_adi = $_POST['hizmet_adi'];
    $fiyat = $_POST['fiyat'];

    $query = $db->prepare("INSERT INTO hizmetler (hizmet_adi, fiyat) VALUES (?, ?)");
    $query->execute([$hizmet_adi, $fiyat]);

    header('Location: hizmetler.php'); 
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
        form {
            margin-top: 50px;
        }
        label {
            display: block;
            margin-top: 20px;
        }
        input {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #f1f1f1;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            border: none;
        }
        button:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>Yeni Hizmet</title>
</head>
<body>
    <h1>Yeni Hizmet Ekle</h1>
    <form method="POST">
        <label>Hizmet Adı: <input type="text" name="hizmet_adi" required></label><br>
        <label>Fiyat: <input type="number" step="0.01" name="fiyat" required></label><br>
        <button type="submit">Ekle</button>
    </form>
</body>
</html>
