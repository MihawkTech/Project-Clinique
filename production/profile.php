<?php 
session_start();
include "dbh.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinique Confident </title>
    
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
 
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
            <?php include('navbar.php'); ?>
           
           
        <!-- page content -->

      <div class="right_col" role="main">
        <div class="container emp-profile">
           
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="images\user.png" alt=""/>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>Votre profil</h1>
                                 <br>
                                 
                                    <h6>

                                    </h6>
                                    <p ></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vos Information</a>
                                </li>
                           
                            </ul>
                        </div>
                    </div>
     
                </div>
                <div class="row" style="font-weight:bold;" >
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($_SESSION['nom']." ". $_SESSION['prenom'])  ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($_SESSION['date_n']);?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($_SESSION['email']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numero de telephone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($_SESSION['numero_tel']);?></p>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($_SESSION['sexe']);?></p>
                                            </div>
                                        </div>


                            </div>

                        </div>
                    </div>
                </div>
                  
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
                <div >
                     <strong> Adresse: Rue256 SSAD Projet confidentialité </strong></a>
                </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>