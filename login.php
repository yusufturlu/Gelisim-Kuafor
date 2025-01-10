<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelişim Kuaför || Giriş Yap</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            background: linear-gradient(to right, rgb(239, 244, 255), rgb(255, 247, 210));
        }

        img {
            width: 100%;
            height: auto;
            max-width: 550px;
            margin-top: 50px;
        }

        .form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 290px;
            background-color: #f8f9fa;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .form-head p {
            letter-spacing: 1px;
            font-size: 24px;
        }

        .form-head img {
            width: 100%;
            height: auto;
            max-width: 150px;
            margin-bottom: 20px;
        }

        .form-content input {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .form-content input:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 0 5px rgb(0, 0, 0.1);
        }

        .form-content input:focus {
            outline: none;
            box-shadow: 0 0 5px rgb(165, 137, 14);
        }

        .form-content input[type="submit"] {
            background-color: #a5890e;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-content input[type="submit"]:hover {
            background-color: #a5890e;
            color: #fff;
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 0 5px rgb(0, 0, 0.1);
        }
    </style>
</head>
<body>
<img src="img/logo.png" alt="">
    <div class="form">
        <form action="" method="post">
            <div class="form-head">
                <p>Gelişim Kuaför'e Hoşgeldiniz!</p>
                <div class="form-content">
                    <input type="email" name="email" placeholder="E-posta Adresiniz" required>
                    <input type="password" name="password" placeholder="Şifreniz" required>
                    <input type="submit" name="submit" value="Giriş Yap">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

include 'db/db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $query = $db->prepare("SELECT id, email, sifre FROM kullanicilar WHERE email = :email");
        $query->execute([':email' => $email]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['sifre'])) {
            session_start();
            $_SESSION['user_id'] = $result['id'];
            echo "<script>alert('Giriş başarılı!')</script>";
            header("Location: index.html");
            exit;
        } else {
            // Giriş başarısız
            echo "<script>alert('E-posta veya şifre hatalı!')</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Bir hata oluştu: " . $e->getMessage() . "')</script>";
    }
}
?>
