<?php 

include '../db/db.php' ; 

if(isset($_POST['submit'])) {
    $sac_tipi = $_POST['sac_tipi'];
    $sac_yag = $_POST['sac_yag'];
    $sac_yikama = $_POST['sac_yikama'];
    $sac_doku = $_POST['sac_doku'];
    $sac_kepek = $_POST['sac_kepek'];
    $note = $_POST['note'];
    $email = $_POST['email'];

    $query = $db->prepare("INSERT INTO imajiniz (sac_tipi, yaglanma_sikligi, yikama_sikligi, sac_dokusu,kepek_sikligi, note , email) VALUES ('$sac_tipi', '$sac_yag', '$sac_yikama', '$sac_doku', '$sac_kepek', '$note', '$email')");

    try {
        $query->execute();
        echo "<script>alert('İşleminiz Başarıyla Gerçekleşti.')</script>"; 
        echo "<script>window.location.href = '../index.html'</script>";
    } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
    }

}

?>