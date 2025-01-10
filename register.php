<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelişim Kuaför || Kayıt </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Mona+Sans:ital,wght@0,200..900;1,200..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
        body {
            font-family: 'Montserrat' , sans-serif;
            text-align: center;
            background: linear-gradient(to right,rgb(239, 244, 255),rgb(255, 247, 210)); 
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
            color: #333;
            margin-bottom: 20px;
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
            box-shadow: 0 0 5pxrgb(165, 137, 14);
        }

        .form-content input[type="submit"] {
            background-color: #a5890e;
            color: #fff;
            cursor: pointer;
            font-weight: 400;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <div class="form-head">
                <img src="img/logo.png" alt="">
                <p>Gelişim Kuaför'e Hoşgeldiniz ! </p>
            </div>
            <div class="form-content">
                <input type="text" name="username" placeholder="İsim ve Soyisminizi Giriniz" >
                <input type="email" name="email" placeholder="E-posta Adresinizi Giriniz" >
                <input type="password" name="password" placeholder="Şifrenizi Oluşturunuz" >
                <input type="phone" name="phone" placeholder="Telefon Numaranızı Giriniz" >
                <input type="submit" name="submit" value="Kayıt Ol">
            </div>
        </form>
        <p>Zaten üye misiniz? <a href="login.php">Giriş Yapın</a></p>
    </div>
</body>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector(".form");
    form.style.opacity = 0;
    form.style.transform = "translateY(20px)";
    
    setTimeout(() => {
        form.style.transition = "all 0.5s ease-in-out";
        form.style.opacity = 1;
        form.style.transform = "translateY(0)";
    }, 100);
});
</script>
</html>
<?php 

include 'db/db.php' ;

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $query = $db->prepare("INSERT INTO kullanicilar (ad_soyad, email, sifre, telefon) VALUES (:username, :email, :password, :phone)");

    try {
        $query->execute(array(
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':phone' => $phone
        ));
        echo "<script>alert('Kayıt başarıyla tamamlandı.')</script>";
        echo "<script>window.location.href = 'index.html'</script>";
    } catch(PDOException $e) {
        echo "Error ! : ".$e->getMessage() ;
    }
}

?>