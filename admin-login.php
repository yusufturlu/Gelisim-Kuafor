<!DOCTYPE html>
<html lang="en">
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
        input {
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            cursor: pointer;
        }
        button:hover {
            background-color: #f1f1f1;
        }
    </style>
    <title>Admin - Login</title>
</head>
<body>
    <h1>Admin Panel - Giriş</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <button type="submit">Giriş Yap</button>
</body>
</html>
<?php 

require 'db/db.php';

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare('SELECT kullanici_adi , sifre FROM adminler WHERE kullanici_adi = ? AND sifre = ?');
    $query->execute([$username, $password]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['admin'] = $_POST['username'];

    if ($result) {
        header('Location: admin.php');
    } else {
        echo 'Kullanıcı adı veya şifre hatalı!';
    }
}

?>