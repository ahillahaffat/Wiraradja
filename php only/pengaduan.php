<?php
// Include file koneksi
include 'koneksi.php';

// Fungsi untuk menyimpan data pengaduan
function saveComplaintData($name, $email, $alamat, $nik, $pekerjaan, $keluhan, $saksi, $nomorWhatsApp, $linkGDrive) {
    global $conn;

    // Mengambil data dari formulir pengaduan
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $alamat = $conn->real_escape_string($alamat);
    $nik = $conn->real_escape_string($nik);
    $pekerjaan = $conn->real_escape_string($pekerjaan);
    $keluhan = $conn->real_escape_string($keluhan);
    $saksi = $conn->real_escape_string($saksi);
    $nomorWhatsApp = $conn->real_escape_string($nomorWhatsApp);

    // Mengambil link Google Drive foto
    $linkGDrive = $conn->real_escape_string($linkGDrive);

    // Menyimpan data pengaduan ke dalam tabel pengaduan
    $sql = "INSERT INTO pengaduan (nama, email, alamat, nik, pekerjaan, keluhan, saksi, nomor_whatsapp, foto)
            VALUES ('$name', '$email', '$alamat', '$nik', '$pekerjaan', '$keluhan', '$saksi', '$nomorWhatsApp', '$linkGDrive')";

    if ($conn->query($sql) === TRUE) {
        // Mengambil ID pengaduan yang baru saja disimpan
        $complaintId = $conn->insert_id;
        // Redirect ke halaman pengaduan-detail.php dengan mengirimkan ID pengaduan
        header("Location: pengaduan-detail.php?id=$complaintId");
        exit(); // Menghentikan eksekusi script setelah melakukan redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memeriksa apakah ada data yang dikirimkan melalui formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $alamat = $_POST['address']; // Mengganti "origin" dengan "address"
    $nik = $_POST['nik'];
    $pekerjaan = $_POST['occupation'];
    $keluhan = $_POST['complaint'];
    $saksi = $_POST['witness'];
    $nomorWhatsApp = $_POST['whatsapp'];
    $linkGDrive = $_POST['photo']; // Mengambil data link Google Drive dari input "photo"

    // Memanggil fungsi untuk menyimpan data pengaduan
    saveComplaintData($name, $email, $alamat, $nik, $pekerjaan, $keluhan, $saksi, $nomorWhatsApp, $linkGDrive);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wiraradja | Era Cemerlang</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="icon-wr.png" />
    <!-- js owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- CSS Owl Carousel -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
    <!-- Font Awesome-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v6.3.0/css/all.css"
      crossorigin="anonymous"
    />
    <!-- Simple line icons-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css"
      rel="stylesheet"
    />
    <!-- Fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
      rel="stylesheet"
      type="text/css"
    />
    
    <!-- CSS-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/lbh.css" rel="stylesheet" />
    <link href="css/animasi-event.css" rel="stylesheet" />

    <style>
    .content-section {
        background-color: #f0f5ff;
        padding: 60px 0;
    }

    .content-section h1 {
        font-size: 36px;
        color: #000;
        margin-bottom: 30px;
    }

    .content-section .form-control {
        background-color: #ffffff;
        border: none;
        border-radius: 0;
        padding: 16px 20px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .content-section .form-control:focus {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .content-section .btn-primary {
        background-color: #004aad;
        border-color: #004aad;
        transition: background-color 0.3s ease-in-out;
        margin-top: 30px;
    }

    .content-section .btn-primary:hover {
        background-color: #003376;
        border-color: #003376;
    }

    .content-section .form-group label {
        color: #000;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .content-section .select-icon select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: url('https://cdn.jsdelivr.net/gh/remarkablemark/select-css/assets/icon.svg') no-repeat 95% / 15px;
    }

    .content-section .form-group textarea {
        resize: none;
    }

    .content-section .form-group input[type="text"],
    .content-section .form-group input[type="email"],
    .content-section .form-group input[type="tel"],
    .content-section .form-group textarea,
    .content-section .form-group select {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>


  </head>
  <body id="page-top">
    <!-- Navigation-->
    <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="#page-top">Pages Menu</a></li>
        <li class="sidebar-nav-item">
          <a href="#page-top"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a href="#about"><i class="fas fa-info-circle"></i> About</a>
        </li>
        <li class="sidebar-nav-item">
          <a href="#services"><i class="fas fa-cogs"></i> Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a href="#portfolio"><i class="fas fa-images"></i> Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          <a href="#contact"><i class="fas fa-envelope"></i> Contact</a>
        </li>
        <li class="sidebar-nav-item">
          <a href="login.php"
            ><i class="fas fa-sign-in-alt"></i> Login/Sign Up</a
          >
        </li>
      </ul>
    </nav>
    
     <!-- Header-->
     <header class="masthead d-flex align-items-center">
      <div class="container px-4 px-lg-5 text-center">
        <a class="btn btn-primary btn-xl" href="index.php">Back To Home</a>
      </div>
    </header>


    <!-- konklusi -->
 <div class="container px-4 px-lg-5 text-center">
  <div class="vector-container-dua">
    <img src="assets/img/antifa.png" alt="Vector Illustration" class="vector-image" />
  </div>

  <div class="container px-4 px-lg-5 text-center">
    <h1>No Justice No Peace!</h1>
    <div class="narrative-container">
      <p>Lembaga Bantuan Hukum Anti Fasis dan Oligarki bertujuan untuk memberikan bantuan hukum kepada mereka yang terpinggirkan dan tertindas oleh kekuatan fasis dan oligarki. Mereka bekerja dengan para aktivis hak asasi manusia, pengacara progresif, dan kelompok-kelompok masyarakat sipil untuk memperjuangkan keadilan sosial dan melindungi hak-hak individu.</p>
      <p>Gerakan ini melakukan berbagai kegiatan seperti penyuluhan hukum kepada masyarakat, pendampingan hukum untuk korban penindasan, dan advokasi kebijakan untuk reformasi sistem hukum yang adil dan transparan. Mereka juga aktif dalam mengungkap dan melaporkan pelanggaran hak asasi manusia yang dilakukan oleh kelompok-kelompok fasis dan oligarki kepada lembaga penegak hukum dan organisasi internasional yang relevan.</p>
      <p>Lembaga Bantuan Hukum Anti Fasis dan Oligarki bekerja tanpa pandang bulu, menerima kasus-kasus yang melibatkan penindasan politik, pelanggaran hak asasi manusia, dan ketidakadilan sosial yang disebabkan oleh kekuatan fasis dan oligarki. Mereka berusaha untuk membangun kesadaran dan solidaritas di antara masyarakat agar dapat bersama-sama melawan ketidakadilan dan memperjuangkan kebebasan yang lebih besar.</p>
      <p>Dalam narasi ini, gerakan yang digaungkan oleh Wiraradja merupakan upaya berani untuk melawan kekuatan fasis dan oligarki yang merusak kehidupan masyarakat. Gerakan ini memperjuangkan keadilan, demokrasi, dan kebebasan sebagai landasan yang mendasari masyarakat yang lebih adil dan setara.</p>
    </div>
  </div>
  </div>
</div>

<!-- form input -->
<section class="content-section bg-light" id="ticket">
  <div class="container px-4 px-lg-5 text-center">
    <h1 class="mb-4">Pengaduan Layanan Bantuan Hukum</h1>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form action="pengaduan.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email Anda" required>
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Masukkan alamat Anda" required>
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK Anda" required>
          </div>
          <div class="form-group">
            <label for="occupation">Pekerjaan</label>
            <div class="select-icon">
              <select class="form-control" id="occupation" name="occupation" required>
                <option value="" disabled selected>Pilih pekerjaan</option>
                <option value="pelajar">Pelajar</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="umum">Umum</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="complaint">Keluhan</label>
            <textarea class="form-control" id="complaint" name="complaint" rows="4" placeholder="Tuliskan keluhan Anda" required></textarea>
          </div>
          <div class="form-group">
            <label for="witness">Saksi</label>
            <input type="text" class="form-control" id="witness" name="witness" placeholder="Masukkan nama saksi" required>
          </div>
          <div class="form-group">
  <label for="photo">Link Google Drive Foto</label>
  <input type="text" class="form-control" id="photo" name="photo" placeholder="Masukkan link Google Drive foto" required>
</div>

          <div class="form-group">
            <label for="whatsapp">Nomor WhatsApp</label>
            <input type="tel" class="form-control" id="whatsapp" name="whatsapp" placeholder="Masukkan nomor WhatsApp Anda" required>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</section>



<!-- Vector -->
<div class="container px-4 px-lg-5 text-center">
  <h1>Datang dan jadilah agen perubahan di masa mendatang!</h1>
  <div class="container text-center mt-4">
    <div class="vector-container-dua">
      <img src="assets/img/revolution.png" alt="Vector Illustration" class="vector-image" />
    </div>
    <h1>Irama Afdol Wiraradja</h1>
  </div>



 
    <!-- Footer-->
    <footer class="footer text-center">
      <div class="container px-4 px-lg-5">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#!"
              ><i class="icon-social-facebook"></i
            ></a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#!"
              ><i class="icon-social-twitter"></i
            ></a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="#!"
              ><i class="icon-social-github"></i
            ></a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; Kelompok 8 Pemrograman Web 2023</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top"
      ><i class="fas fa-angle-up"></i
    ></a>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- script servis -->
    <script src="js/portfolio.js"></script>

  </body>
</html>
