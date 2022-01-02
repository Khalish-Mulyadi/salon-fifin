<?php 

include '../koneksi.php';
if(isset($_POST['submit']))

{
  $nama = mysqli_real_escape_string($conn, $_POST['nama']);
  $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
  $layanan = mysqli_real_escape_string($conn, $_POST['layanan']);
  $tanggalReservasi = mysqli_real_escape_string($conn, $_POST['tanggalReservasi']);
  $submitReservasi = mysqli_query($conn,"insert into reservasi values('','$nama','$layanan','$telepon', '$tanggalReservasi', 'Submitted')");
  if ($submitReservasi){
      echo " <script> 
              alert ('Berhasil melakukan reservasi');
              </script>";
              header("location: index.php");
  } else { 
          echo (
              "
              <script> 
                  alert ('Gagal melakukan reservasi');
              </script>");
          
          echo mysqli_error($conn);
      header("location: index.php");
  }
  
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/gaya.css">
        <link rel="icon" type="image/png" sizes="32x32" href="https://i.gyazo.com/a8f835ee1140dd95fe286f78ace2bd32.png">
</head>
<body>
        <section id="atas_navbar">
        <nav class="navbar navbar_atas py-0">
            <div class="container-fluid">
                <img src="https://img.icons8.com/small/16/000000/whatsapp.png" class="ms-auto">0812-xxxx-xxxx  &nbsp;&nbsp;</>
                <a href="https://www.instagram.com/salonfifin/"><img src="https://img.icons8.com/small/16/000000/instagram-new.png"/></a>salonfifin
            </div>
        </nav>
    </section>
    <section id="navbar">
      <nav class="navbar navbar_bawah navbar-expand-lg py-1">
  <div class="container-fluid">
    <a class="navbar-brand merek h1 ms-3 navi" href="../index.php">FIFIN &nbsp;&nbsp;</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="ms-5 me-4 nav-link navi fs-4" href="../index.php#promo">Promo</a>
            </li>
            <li class="nav-item">
              <a class="ms-5 me-4 nav-link navi fs-4" href="gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="ms-5 me-4 nav-link navi fs-4" href="pricelist">Price List</a>
            </li>
            <li class="nav-item">
              <a class="ms-5 me-4 nav-link navi fs-4" href="reservation">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="ms-5 me-4 nav-link navi fs-4" href="../index.php#about">About </a>
            </li>
            <li class="nav-item">
              <a class="ms-5 nav-link navi fs-4" href="#">Admin</a>
            </li>
          </ul>
        </div>
  </div>
</nav>
    </section>
<section id="online_reservation">
    <div class="container">
        <h1 class="p-5 navi">ONLINE RESERVATION</h1>
              <div class="rectangle_res mx-auto pt-5">
              <br>
                <div class="container my-auto">
                <form method="post"> 
                    <div class="row justify-content-start">
                        <div class="col-md-4">
                          <label for="reserveNama" class="form-label ps-5 font_form">Nama</label>
                            </div>
                                <div class="col-md-1">
                                     :
                                 </div>
                            <div class="col-md-6">
                                 <input type="text" name="nama" class="form-control rounded-pill" id="reserveNama" placeholder="">
                             </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-md-4">
                          <label for="reserveTelepon" class="form-label ps-5 mt-3 font_form">Telepon</label>
                            </div>
                                <div class="col-md-1">
                                     <p class="mt-3">:</p>
                                 </div>
                            <div class="col-md-6">
                                 <input type="text" name="telepon" class="form-control rounded-pill mt-3" id="reserveTelepon" placeholder="">
                             </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-md-4">
                          <label for="reserveLayanan" class="form-label ps-5 mt-3 font_form">Pilihan Layanan</label>
                            </div>
                                <div class="col-md-1">
                                     <p class="mt-3">:</p>
                                 </div>
                            <div class="col-md-5">
                                 <select class="form-select form-select mt-3 rounded-pill" name="layanan" aria-label=".form-select-lg example">
                                    <option hidden>Hairstyle</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                             </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-md-4">
                          <label for="reserveTanggal" name="tanggalReservasi" class="form-label ps-5 mt-3 font_form">Tanggal</label>
                            </div>
                                <div class="col-md-1">
                                     <p class="mt-3">:</p>
                                 </div>
                            <div class="col-md-5">
                                <input type="date" name="tanggalReservasi" class="form-select form-select mt-3 rounded-pill" aria-label=".form-select-lg example">
                             </div>
                    </div>
                    <div class="container">
                        <div class="text-end">
                            <button type="submit" name="submit" class="btn btn-res btn-dark mt-5 p_h_s">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
          </div>
          <div class="container p-4">
          </div>
    </div>
</section>
<section id="footer">
   <nav class="navbar ">
  <div class="container">
          <p class="mx-auto navi my-auto">Salon Fifin dan Beautycare & Spa © 2021</p>
  </div>
</nav>
</section>
</body>
</html>