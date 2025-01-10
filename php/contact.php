<?php 

include '../db/db.php' ;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];

    $query = $db->prepare("INSERT INTO iletisim (ad_soyad, email, konu, mesaj) VALUES (:ad_soyad, :email, :konu, :mesaj)");

    try {
        $query->execute(array(
            ':ad_soyad' => $name,
            ':email' => $email,
            ':konu' => $topic,
            ':mesaj' => $message
        ));
        if ($query) {
            echo "<script>alert('Mesajınız başarıyla gönderildi.')</script>";
            echo "<script>window.location.href = '../index.html'</script>";
        } else {
            echo "<script>alert('Mesajınız gönderilirken bir hata oluştu.')</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
