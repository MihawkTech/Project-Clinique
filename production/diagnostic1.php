<?php 
session_start();
include "dbh.php";
$id = $_SESSION['id'];
$date_rdv = $_SESSION['date_rdv'];
$id_rdv =$_SESSION['id_rdv'];
$query1 = "SELECT * FROM medecin,rendez_vous,diagnostic WHERE rendez_vous.id_rdv = $id_rdv and rendez_vous.id_medecin = medecin.id_medecin and rendez_vous.id_rdv = diagnostic.id_rdv";

$diagnostic = $conn->query($query1)->fetch_assoc();

$name=$diagnostic["nom"];
$prenom= $diagnostic["prenom"];
$maladie = $diagnostic ["maladie"];
$ids_tr = $diagnostic ["ids_tr"];
$id_trait = explode("|", $ids_tr);
$somme = 0
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinique Confident</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
            <?php include('navbar.php'); ?>
           
           

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="col-md-6">
                        <div class="profile-head">
                                    <h1>Diagnostic</h1>
                                 <br>
                                 
                      
                                  
 
                        </div>
                    </div>

            </div>
 

            <div class="clearfix"></div>

     
            <div class="row" style="font-weight:bold;">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
 
                          <h3 style="display:center;">Votre diagnostic </h3><br>

                      </div>

                
                     
                                <div class="row">
                                   <div class="col-md-2">
                                      <label>Patient</label>
                                    </div>
                                     <div class="col-md-6">
                                      <p><?php echo ($_SESSION['nom']." ". $_SESSION['prenom'])  ?></p>
                                      </div>
                                      <div class="col-md-2">
                                      <label>Medecin</label>
                                    </div>
                                     <div class="col-md-2">
                                        <p><?php echo "Dr." .$name. " " . $prenom ?> </p>
                                      </div>
                                 </div>
                                 
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ($_SESSION['date_n']);?></p>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Date rendez-vous</label>
                                            </div>
                                            <div class="col-md-2">
                                                 <p><?php echo ($date_rdv); ?></p>
                                            </div>
                                        </div>
                                  <br><br>
                                <div class="row">
                                  

                                    <div class="col-md-2">
                                      <h2>Maladie</h2>
                                    </div>

                                     <div class="col-md-6">
                                      <h2><?php echo ($maladie)  ?></h2>
                                     </div>
                                 </div>
                                 <br>


              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Traitements</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
  
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Traitement</th>
                          <th>Prix</th>
                          
                        </tr>
                      </thead>
                      
                    <?php 
                        foreach ($id_trait as $id_tr) {
                        $query2= "SELECT * FROM traitement WHERE id_tr= $id_tr";
                        $traitement = $conn->query($query2)->fetch_assoc();
                                        
                      ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?php echo $traitement["id_tr"];?></th>
                          <td><?php echo $traitement["nom_tr"];?></td>
                          <td><?php echo $traitement["prix"]; ?> DA</td>
                          <?php $somme = $somme +$traitement["prix"]  ?>  
                        </tr>

                   
                      <?php  } ?>
                     <tr> <td> </td></tr>
                      <br>
                      <tr>
                     
                        <td>TOTAL </td>
                        <td> </td>
                        <td> <?php echo $somme; ?> DA </td>
                      </tr>
                     
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
                    


                      <div class="clearfix"></div>
                       

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