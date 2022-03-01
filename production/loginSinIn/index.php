<?php 
include "dbh.php";
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Projet Sécurité</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="script.js"></script>

<!------ Include the above in your HEAD tag ---------->
<!-- recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Clinique Confident</a></h1>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">Sign in</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Bienvenus dans votre clinique</h1>

      <div class="wrapper fadeInDown">
        <div id="formContent" class="formContent">
          <!-- Tabs Titles -->
      
          <!-- Login Form -->
          <form id="form1" action="#" method="post">
            <h2 class="my-3">Log In</h2>
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login" required=""><span id="user1"></span>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required=""><br><span id="pswerr"></span><br>
            <div class="fadeIn third d-flex justify-content-center">
              <div class="g-recaptcha" data-sitekey="6Ldje4kaAAAAAKp0Fm_vsbGYGVct5yNmTbZ5Mruf"></div>
            </div>
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter" class="formFooter">
            <a class="underlineHover" href="#about">Sign In?</a>
          </div>
      
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Sin in Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="wrapper">
          <div id="formContent" class="formContent">
            <!-- Tabs Titles -->
        
            <!-- Sin Form -->
            <form id="form2" action="#" method="post">
              <h2 class="my-3">Identification</h2>
              <input type="text" id="singin" class="fadeIn second" name="username" placeholder="e_mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address" required=""><span id="user2"></span>
              <input type="password" id="pass" class="fadeIn fourth" name="pass" placeholder="mot de passe" title="entrez votre mot de passe"  required="">
              <input type="password" id="passcheck" class="fadeIn fourth" name="passcheck" placeholder="repetez le mot de passe" title="entrez votre mot de passe" required=""><br><span id="ps"></span>
              <input type="text" id="nom" class="fadeIn second" name="nom" placeholder="nom" title="nom" required="">
              <input type="text" id="prenom" class="fadeIn second" name="prenom" placeholder="prenom" title="prenom" required="">
              <input type="text" id="numtel" class="fadeIn second" name="numtel" placeholder="numéro de teléphone" pattern="[0-9]{10}" title="Invalid phone number" required="">
              <input type="text" id="adresse" class="fadeIn second" name="adresse" placeholder="votre adresse" title="adresse" required="">


              <p>Sélectionez votre date de naissance</p> 
              <input type="date" id="anniv" class="fadeIn second" name="anniv" title="anniv" value="2000-01-01" min="1900-01-01" max="2030-01-01" required=""><br><br>
              <p>Sélectionez votre sexe</p>
              <input type="radio" id="male" class="fadeIn second" name="gender" value="homme">
              <label for="male">homme</label><br>
              <input type="radio" id="femelle" class="fadeIn second" name="gender" value="femme">
              <label for="femelle">femme</label><br><br>
              <input type="submit" class="fadeIn fifth" value="identifier" >
            </form>
        
            <!-- Remind Passowrd -->
            <div id="formFooter" class="formFooter">
              <a class="underlineHover" href="#hero">Log In?</a>
            </div>
        
          </div>
        </div>
  

      </div>
    </section><!-- End Sing in Section -->
  </main><!-- End #main -->



  <?php 
  /*$captcha = $_POST["g-recaptcha-response"];
        $secretkey = "6LfddYkaAAAAADW6YZa-iDrI-cq_8dOkwZ1T9SHq";
        $url = "https://www.google.com/recaptcha/api/siteverify=" . urlencode($secretkey) . "&response=" . urlencode($captcha) . " ";
        $response = file_get_contents($url);
        $responsekey =  json_decode($response, TRUE);
        if ($responsekey["success"]) {
        //traitment login
        }
        else {
                    exit;
                }
*/
                ?>






  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>