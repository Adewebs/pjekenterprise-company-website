<?php
session_start(); // Start the session to store messages

// Initialize messages
$successMessage = "";
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $type = "Career Application";

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errorMessage = "All fields are required!";
        $_SESSION['errorMessage'] = $errorMessage; // Save error message in session
        $_SESSION['messageTimestamp'] = time(); // Save timestamp for message expiration
    } else {
        // Database connection
        $conn = new mysqli('localhost', 'pjekente_forming', ';s&&PMY2J7Vo', 'pjekente_forming');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message,type) VALUES (?,?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $subject, $message,$type);

        if ($stmt->execute()) {
            $successMessage = "Your application has been sent. Thank you!";
            $_SESSION['successMessage'] = $successMessage; // Save success message in session
            $_SESSION['messageTimestamp'] = time(); // Save timestamp for message expiration
        } else {
            $errorMessage = "Error: " . $stmt->error;
            $_SESSION['errorMessage'] = $errorMessage; // Save error message in session
            $_SESSION['messageTimestamp'] = time(); // Save timestamp for message expiration
        }

        $stmt->close();
        // $conn->close();
    }

    // Reload the page to display the message
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Check if there is a message in the session and display it
if (isset($_SESSION['successMessage']) && (time() - $_SESSION['messageTimestamp']) < 60) {
    $message = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']); // Clear the message after display
    $messageType = 'success';
} elseif (isset($_SESSION['errorMessage']) && (time() - $_SESSION['messageTimestamp']) < 60) {
    $message = $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']); // Clear the message after display
    $messageType = 'error';
} else {
    $message = '';
    $messageType = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home | PjekEnterprise | Career</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/Artboard.png" rel="icon">
  <link href="assets/img/Artboard.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

<style>
    
    .success {
    color: green;
    background-color: #e0ffdb;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid green;
}

.error {
    color: red;
    background-color: #ffe0e0;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid red;
}

</style>
</head>

<body class="starter-page-page">

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/Artboard.png" alt="">
        <h1 class="sitename">Pjek Enterprise</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#hero" class="active">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#features">Features</a></li>
          <li><a href="index.php#services">Services</a></li>
          <li><a href="career.php">Career</a></li>
        
          <li><a href="index.php#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!--<a class="btn-getstarted" href="index.html#about">Get Started</a>-->

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <h1>Career</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Career</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Career</h2>
         <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <h3>Contact Info</h3>
              <p>Whether you’re interested in our call center solutions, talent outsourcing postion, or have a general inquiry, we’d love to hear from you. At Pjek Enterprise, we are committed to providing responsive and personalized service to meet your business needs.</p>

              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Our Location</h4>
                  
                  <p></p>Plot 9, 11 Kudirat Abiola Way, Oregun,</p>
                  <p>Ikeja 101233,Lagos</p>
                </div>
              </div>


              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Email Address</h4>
                  <p> front_desk@pjekenterprise.com
</p>

                </div>
              </div>
            </div>
          </div>
     <div class="col-lg-7">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
              <h3>Submit An Application</h3>
              <p>Reach out to us by filling this form.</p>
                  <?php if ($message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

              <form action="career.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                  </div>

                  <div class="col-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                  </div>

                  <div class="col-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your application has been sent. Thank you!</div>

                    <button type="submit" class="btn">Send Message</button>
                  </div>

                </div>
              </form>

            </div>
          </div>

        </div>

      </div>
      </div><!-- End Section Title -->

    

    </section><!-- /Starter Section Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Pjek Enterprise</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Plot 9, 11 Kudirat Abiola Way, Oregun, </p>
            <p>Ikeja 101233,Lagos</p>

            <p><strong>Email:</strong> <span> front_desk@pjekenterprise.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>



      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Pjekenterprise.</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
    
        Designed by <a href="https://adewebstech.ng/">Adewebs Technologies</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!--<script src="assets/vendor/php-email-form/validate.js"></script>-->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>