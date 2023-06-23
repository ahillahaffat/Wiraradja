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
    <link href="css/detail-aduan.css" rel="stylesheet" />

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

<?php
// Include file koneksi
include 'koneksi.php';

// Memeriksa apakah ada data pengaduan yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $complaintId = $_GET['id'];

    // Mengambil data pengaduan berdasarkan ID dengan prepared statement
    $sql = "SELECT * FROM pengaduan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $complaintId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $email = $row['email'];
        $alamat = $row['alamat'];
        $nik = $row['nik'];
        $pekerjaan = $row['pekerjaan'];
        $keluhan = $row['keluhan'];
        $saksi = $row['saksi'];
        $nomorWhatsApp = $row['nomor_whatsapp'];
        $foto = $row['foto'];

        // Menampilkan detail pengaduan
        echo '
        <div class="detail-pengaduan">
            <h2>Detail Pengaduan</h2>
            <p><strong>Nama:</strong> ' . $nama . '</p>
            <p><strong>Email:</strong> ' . $email . '</p>
            <p><strong>Alamat:</strong> ' . $alamat . '</p>
            <p><strong>NIK:</strong> ' . $nik . '</p>
            <p><strong>Pekerjaan:</strong> ' . $pekerjaan . '</p>
            <p><strong>Keluhan:</strong> ' . $keluhan . '</p>
            <p><strong>Saksi:</strong> ' . $saksi . '</p>
            <p><strong>Nomor WhatsApp:</strong> ' . $nomorWhatsApp . '</p>
            <p><strong>Link GDrive :</strong> <a href="' . $foto . '" target="_blank">Link Google Drive</a></p>
            Terima kasih telah melapor, tunggu prosesnya dan nantikan email yang masuk dari kami!
        </div>';
    } else {
        echo 'Pengaduan not found.';
    }

    $stmt->close();
} else {
    echo 'Invalid complaint ID.';
}
?>


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
