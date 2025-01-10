<?php 

include '../db/db.php' ;

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $service = $_POST['service'];
    $extra = $_POST['extra'];
    $date = $_POST['date'];
    $clock = $_POST['clock'];

    $query = $db->prepare("INSERT INTO randevular (ad_soyad,hizmet,extra,date,time) VALUES ('$name','$service','$extra','$date','$clock')");
    
    try {
        $query->execute();
        echo "<script>alert('Randevu başarıyla alındı.')</script>";
        echo "<script>window.location.href = '../index.html'</script>";
    } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
    }
}
?>