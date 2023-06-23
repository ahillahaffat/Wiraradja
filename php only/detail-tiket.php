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
    <link href="css/detail-tiket.css" rel="stylesheet" />
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

    <div class="container px-4 px-lg-5 text-center">
          <div class="vector-container-dua">
            <img src="assets/img/silaturahmi.png" alt="Vector Illustration" class="vector-image" />
          </div>

          <div class="container px-4 px-lg-5 text-center">
            <h1>Kami ingin hebat dengan karya!</h1>
            <div class="narrative-container2">
              <p>Wiraradja Expanding Awareness merupakan acara seni rupa yang bertujuan untuk memajukan daerah dan mendorong kemajuan melalui karya seni. Seperti kota-kota seni terkenal di Eropa, salah satunya Venice, keberadaan seni memiliki peran yang sangat penting dalam mendorong perkembangan suatu daerah.</p>
              <p>Venice menjadi contoh sukses karena seni telah menjadi tulang punggung kemajuan kota tersebut. Seni dan budaya menjadi daya tarik utama bagi wisatawan dari seluruh dunia. Kota ini menjadi pusat kreativitas, inspirasi, dan kolaborasi antara seniman, budayawan, dan penggiat seni lainnya. Melalui festival seni yang terkenal, seperti Venice Biennale, kota ini mampu menarik minat pengunjung dan memberikan kontribusi signifikan pada sektor pariwisata dan ekonomi kreatif.</p>
              <p>Dalam konteks Wiraradja Expanding Awareness, kami ingin menerapkan pendekatan serupa untuk memajukan daerah kami. Melalui acara ini, kami berharap dapat menciptakan gelombang baru kesadaran dan apresiasi terhadap seni di daerah kami. Kami ingin menciptakan lingkungan yang mendukung pertumbuhan seniman lokal, kolaborasi, dan inovasi. Selain itu, acara ini juga menjadi sarana untuk mengedukasi masyarakat tentang peran penting seni dalam kehidupan sehari-hari dan sebagai alat untuk menyampaikan pesan-pesan sosial dan lingkungan yang relevan.</p>
              <p>Dengan semangat ini, Wiraradja Expanding Awareness berkomitmen untuk memajukan daerah kami melalui kekuatan seni. Kami berharap dapat menciptakan perubahan yang nyata dan positif, meningkatkan ekonomi kreatif, menciptakan lapangan kerja baru, serta memperkuat identitas budaya setempat. Dengan adanya dukungan dan partisipasi dari masyarakat dan para penggiat seni, kami yakin bahwa acara ini akan memberikan dampak yang signifikan dan berkelanjutan bagi kemajuan daerah kami secara keseluruhan.</p>
            </div>
          </div>
          </div>
<?php
    // Include file koneksi
    include 'koneksi.php';

    // Memeriksa apakah ada data tiket yang dikirimkan melalui URL
    if (isset($_GET['id'])) {
        $ticketId = $_GET['id'];

        // Mengambil data tiket berdasarkan ID
        $sql = "SELECT * FROM tiket WHERE id = $ticketId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            $origin = $row['origin'];
            $occupation = $row['occupation'];
            $quantity = $row['quantity'];

            // Menampilkan detail tiket
            echo '
            <style>
                .ticket {
                    background-image: url("assets/img/red.png");
                    background-size: cover;
                    background-position: center;
                }
            </style>
            <div class="ticket">
                <div class="left">
                <p style="color: #ffffff;">
                        <strong>Name:</strong> ' . $name . '<br>
                        <strong>Email:</strong> ' . $email . '<br>
                        <strong>Origin:</strong> ' . $origin . '<br>
                        <strong>Occupation:</strong> ' . $occupation . '<br>
                        <strong>Quantity:</strong> ' . $quantity . '
                    </p>
                </div>
                <div class="right">
                    <p class="admit-one">
                        <span>ADMIT ONE</span>
                        <span>ADMIT ONE</span>
                        <span>ADMIT ONE</span>
                    </p>
                    <div class="right-info-container">
                        <div class="show-name">
                            <h1>SOUR Prom</h1>
                        </div>
                        <div class="time">
                            <p>8:00 PM <span>TO</span> 11:00 PM</p>
                            <p>DOORS <span>@</span> 7:00 PM</p>
                        </div>
                        <div class="barcode">
                            <img src="assets/img/barcode.png" alt="Barcode">
                        </div>
                        <p class="ticket-number">Ticket Number: ' . $ticketId . '</p>
                    </div>
                </div>
                <div class="tear-off">
                    <p>Tear off this section</p>
                </div>
            </div>
            ';
        } else {
            echo 'Ticket not found.';
        }
    } else {
        echo 'Invalid ticket ID.';
    }
?>

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
