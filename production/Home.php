<?php 
session_start();
include "dbh.php";

  $query1 = "SELECT * FROM medecin";
  $medecin = $conn->query($query1);

  $query2 = "SELECT * FROM directeur";
  $directeur = $conn->query($query2);

  $query3 = "SELECT * FROM infermie";
  $infermiere = $conn->query($query3);
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

            <!-- navbar menu -->
           <?php include('navbar.php');?>
            <!-- /navbar menu -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clinique Confident </h3>
                <h2> Bienvenue a notre clinique </h2>

              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>


            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
 
                          <h3 style="display:center;">Notre Personnel</h3><br>

                      </div>

                      <div class="clearfix"></div>
<?php    while($row = $directeur->fetch_assoc()) { ?>

                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><strong >Directeur</strong></i></h4>
                            <div class="left col-md-7 col-sm-7">
                              <h2><?php echo "Dr." .$row["nom"]. " " . $row["prenom"] ?></h2>
                            
                              <ul class="list-unstyled" >
                              
                                <li ><i class="fa fa-envelope"></i> <strong> E-mail: <?php echo $row["email"] ?> </strong> </li>
                              
                              </ul>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="images/directeur.jpg" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
  

                          </div>
                        </div>
                      </div>

                      <?php } ?> 

    <?php 
                    while($row = $medecin->fetch_assoc()) {
    ?>

                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><strong >Medecin</strong></i></h4>
                            <div class="left col-md-7 col-sm-7">
                            <h2><?php echo "Dr." .$row["nom"]. " " . $row["prenom"] ?></h2>
                          
                              <ul class="list-unstyled">
                                <li style="padding-bottom:10px;"><i class="fa fa-envelope"></i><strong > E-mail: <?php echo $row["email"] ?> </strong> </li>
                                <li><i class="fa fa-user-md"></i><strong > Specialité: <?php echo $row["specialite"] ?> </strong> </li>
                                
                              </ul>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="images/medecin.png" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis">

                            </div>
                            <div class=" col-sm-6 emphasis">
                              <!-- <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-user"> </i> View Profile
                              </button> -->
                            </div>
                          </div>
                        </div>
                      </div>

           <?php } ?>    


            <?php 

                     while($row = $infermiere->fetch_assoc()) {
             ?>

                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><strong >Infermiere</strong></i></h4>
                            <div class="left col-md-7 col-sm-7">
                            <h2><?php echo $row["nom"]. " " . $row["prenom"] ?></h2>
                          
                              <ul class="list-unstyled">
                                <li style="padding-bottom:10px;"><i class="fa fa-envelope"></i><strong > E-mail: <?php echo $row["email"] ?> </strong> </li>
                                <li><i class="fa fa-user-md"></i><strong > Service: <?php echo $row["service"] ?> </strong> </li>
                                
                              </ul>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="images/infermiere.png" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis">

                            </div>
                            <div class=" col-sm-6 emphasis">
                              <!-- <button type="button" class="btn btn-success btn-sm"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-user"> </i> View Profile
                              </button> -->
                            </div>
                          </div>
                        </div>
                      </div>

           <?php } ?>    
        <!-- /page content -->

        <!-- footer content -->
        <footer>
               <div>
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