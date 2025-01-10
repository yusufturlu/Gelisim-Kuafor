<?php

include 'db/db.php' ;

$sql = "SELECT bakim_adi , fiyat FROM kuafor";

$result = $db->query($sql) ;

$sql2 = "SELECT hizmet_adi, fiyat FROM hizmetler";

$result2 = $db->query($sql2) ;


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Gelişim Kuaför - İmajınızı Güzelleştirir</title>
</head>
<body onload="isletmeDurumu()">

   <style>
      .slider img.sliderBg {
         max-height: 300px;
      }
   </style>

   <header>
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.html">
               <img class="normalLogo" style="height: 55px" src="img/logo.png" alt="Gelişim Kuaför">
               <img class="whiteLogo" style="height: 55px" src="img/beyaz-logo.png" alt="Gelişim Kuaför">
            </a>
            <span id="durum"></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
               <div class="navbar-nav">
                  <a class="nav-link" href="index.html">Ana Sayfa</a>
                  <a class="nav-link" href="hakkimizda.html">Hakkımızda</a>
                  <a class="nav-link" href="imajiniz.html">İmajınız</a>
                  <a class="nav-link active" href="fiyat-listesi.php">Fiyat Listesi</a>
                  <a class="nav-link" href="urunlerimiz.html">Ürünlerimiz</a>
                  <a class="nav-link" href="iletisim.html">İletişim</a>
                  <a class="nav-link" id="toggleButton"><strong>Gece Modu</strong></a>
               </div>
            </div>
         </nav>
      </div>
   </header>

   <div class="mainContent">
      <div class="slider">
         <img class="sliderBg" src="img/slider-1.jpg" alt="Slider">
         <div class="sliderDetail">
            <h1>Fiyat Listelerimiz</h1>
         </div>
      </div>
      <div class="container">
         <div class="priceList">
            <div class="row">
               <div class="col-md-6">
                  <h2>Kuaför Hizmetlerimiz</h2>
                  <table>
                     <tbody>
                        <?php
                        if ($result->rowCount() > 0) {
                           while($row = $result->fetch()) {
                        ?>
                        <tr>
                           <td>
                              <h3><?php echo $row["bakim_adi"] ?></h3>
                           </td>
                           <td>
                              <h3><?php echo $row["fiyat"] ?> ₺</h3>
                           </td>
                        </tr>
                        <?php
                           }
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
               <div class="col-md-6">
                  <h2>Bakım Hizmetlerimiz</h2>
                  <table>
                     <tbody>
                        <?php
                        if ($result2->rowCount() > 0) {
                           while($row = $result2->fetch()) {
                        ?>
                        <tr>
                           <td>
                              <h3><?php echo $row["hizmet_adi"] ?></h3>
                           </td>
                           <td>
                              <h3><?php echo $row["fiyat"] ?> ₺</h3>
                           </td>
                        </tr>
                        <?php
                           }
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <footer>
      <div class="googleMap">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <img src="img/map-small.png">
                  </div>
              </div>
          </div>
      </div>
      
      <div class="footerContent">
            <div class="container">
               <div class="footerMenu">
                     <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                           <div class="menuItem">
                                 <div class="mainLogo">
                                    <a href="index.html">
                                       <img class="normalLogo" style="height: 55px" src="img/logo.png" alt="Gelişim Kuaför">
                                        <img class="whiteLogo" style="height: 55px" src="img/beyaz-logo.png" alt="Gelişim Kuaför">
                                    </a>
                                 </div>
                                 <div class="siteDesc">
                                    <p>2023 yılından bu güne profesyonel kuaför ekibimizle Avcılar'da hizmet vermekteyiz. Gelişim Kuaför olarak önceliğimiz müşteri memnuniyeti ve rahatıdır.</p>
                                 </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                           <div class="menuItem">
                              <h4 class="dropdown">Yasal Bilgilendirme <img src="img/arrow.png"></h4>
                              <ul class="noList subMenu">
                                 <li><a href="gizlilik-politikasi.html">Gizlilik Politikası</a></li>
                                 <li><a href="cerez-politikasi.html">Çerez Politikası</a></li>
                                 <li><a href="kullanim-kosullari.html">Kullanım Koşulları</a></li>
                              </ul>
                           </div>
                     </div>
                     <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                           <div class="menuItem">
                              <h4 class="dropdown">Sözleşmeler <img src="img/arrow.png"></h4>
                              <ul class="noList subMenu">
                                 <li><a href="iptal-ve-iade-kosullari.html">İptal ve İade Koşulları</a></li>
                              </ul>
                           </div>
                     </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                           <div class="menuItem">
                                 <h4>Bana Ulaşın</h4>
                                 <ul class="noList">
                                    <li><a target="_blank" href="https://wa.me/902123456790">Whatsapp <span class="badge">0212 345 67 90</span></a></li>
                                    <li><a target="_blank" href="mailto:info@gelisimkuafor.com">E-Posta Adresi <span class="badge">info@gelisimkuafor.com</span></a></li>
                                 </ul>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
      </div>
      <div class="footerBottom">
            <div class="container">
               <div class="row align-items-center pt-3 pb-3">
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <span><strong>Gelişim Kuaför</strong> © 2023 - 2024 Tüm Hakları Saklıdır.</span>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="footerSocial">
                           <ul class="noList d-flex align-items-center justify-content-end">
                                 <li><a target="_blank" href="https://www.facebook.com/gelisimedu"><i class="ri-facebook-circle-line"></i></a></li>
                                 <li><a target="_blank" href="https://www.instagram.com/igugelisim/"><i class="ri ri-instagram-line"></i></a></li>
                           </ul>
                        </div>
                     </div>
               </div>
            </div>
      </div>
  </footer>

  <button id="scrollToTopBtn" onclick="scrollToTop()"><img src="img/up-icon.png"></button>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  
</body>
</html>