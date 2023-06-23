<?php
// Include file koneksi
include 'koneksi.php';

// Fungsi untuk menyimpan data tiket
function saveTicketData($name, $email, $origin, $occupation, $quantity) {
    global $conn;

    // Mengambil data dari formulir tiket
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $origin = $conn->real_escape_string($origin);
    $occupation = $conn->real_escape_string($occupation);
    $quantity = intval($quantity);

    // Menyimpan data tiket ke dalam tabel tiket
    $sql = "INSERT INTO tiket (name, email, origin, occupation, quantity) VALUES ('$name', '$email', '$origin', '$occupation', $quantity)";

    if ($conn->query($sql) === TRUE) {
        $ticketId = $conn->insert_id;
        header("Location: detail-tiket.php?id=$ticketId");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memeriksa apakah ada data yang dikirimkan melalui formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $origin = $_POST['origin'];
    $occupation = $_POST['occupation'];
    $quantity = $_POST['quantity'];

    // Memanggil fungsi untuk menyimpan data tiket
    saveTicketData($name, $email, $origin, $occupation, $quantity);
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
    <link href="css/events.css" rel="stylesheet" />
    <link href="css/tiket.css" rel="stylesheet" />
    <link href="css/event-details.css" rel="stylesheet" />

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
        <h1 class="mb-1">Welcome To Our Fest</h1>
        <h3 class="mb-5">Wiraradja Expanding Awardness</h3>
        <a class="btn btn-primary btn-xl" href="index.php">Back To Home</a>
      </div>
    </header>

<!-- Vector -->
<div class="container px-4 px-lg-5 text-center">
<h1 class="custom-font-blog">Wiraradja Expanding Awardness : Rindu Lukisan Merasuk Di Badan</h1>
  <div class="container text-center mt-4">
    <div class="vector-container-dua">
      <img src="assets/img/tiketingvect.png" alt="Vector Illustration" class="vector-image2" />
    </div>
  </div>
  <a href=" "> </a>
            <a class="btn btn-dark btn-xl" href="#ticket">Beli Tiket</a>
</div>

    <!-- tiket-->
  <section class="content-section bg-light" id="ticket">
  <div class="container px-4 px-lg-5 text-center">
    <h1 class="mb-4">Beli Tiket</h1>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <form action="tiket-input.php" method="POST">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email Anda" required>
          </div>
          <div class="form-group">
            <label for="origin">Alamat Asal</label>
            <input type="text" class="form-control" id="origin" name="origin" placeholder="Masukkan alamat asal Anda" required>
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
            <label for="quantity">Jumlah Tiket</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukkan jumlah tiket yang ingin dibeli" required>
          </div>
          <button type="submit" class="btn btn-primary">Beli</button>
        </form>
      </div>
    </div>
  </div>
</section>


<!-- Vector -->
<div class="container px-4 px-lg-5 text-center">
  <h1 class="custom-font-blog">Datang dan jadilah agen perubahan di masa mendatang!</h1>
  <div class="container text-center mt-4">
    <div class="vector-container-dua">
      <img src="assets/img/abstract.png" alt="Vector Illustration" class="vector-image2" />
    </div>
    <h1 class="custom-font-blog">Wiraradja Art Fest 2K23</h1>
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
