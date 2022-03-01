<?php 
session_start();
include "dbh.php";
$id = $_SESSION['id'];
$query1 = "SELECT * FROM medecin,rendez_vous,diagnostic WHERE rendez_vous.id_patient = $id and rendez_vous.id_rdv = diagnostic.id_rdv and medecin.id_medecin=rendez_vous.id_medecin ";

$diagnostic = $conn->query($query1);

$query2 = "SELECT * FROM patient WHERE id_patient = $id";
$patient = $conn->query($query2);

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
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script>
   $(document).ready(function(){
      $("#diagnostic").submit(function(event){
        var id_rdv=$(this).attr("id_rdv");
        var date_rdv=$(this).attr("date_rdv");
       // id_medecin = id_medecin.substr(1);
        

        
            $.ajax({
                url: 'check.php',
                type: 'post',
                data: {
                    'save' : 1,
                    'id_rdv' : id_rdv,
                    'date_rdv':date_rdv,
                 

                },
                success: function(response){
                    
                    window.location.href = "diagnostic1.php";    
                }
                
            });
        event.preventDefault();
    });
  });
    </script>
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
                                    <h1>Vos Diagnostic</h1>
                                 <br>
                                 
                      
                                  
 
                        </div>
                    </div>

            </div>
            

            <div class="clearfix"></div>

     
            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
 
                          <!--<h3 style="display:center;">Vos diagnostic</h3><br>-->

                      </div>

                      <div class="clearfix"></div>
                      <?php 
                    while($row = $diagnostic->fetch_assoc()) {
                       ?>

                      <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i><strong >Medecin</strong></i></h4>
                            <div class="left col-md-7 col-sm-7">
                            <h2><?php echo "Dr." .$row["nom"]. " " . $row["prenom"] ?></h2>
                          
                              <ul class="list-unstyled">
                                <li style="padding-bottom:10px;"><i class="fa fa-envelope"></i><strong > E-mail: <?php echo $row["email"] ?> </strong> </li>
                               
                              <form id="diagnostic" action="check.php" id_rdv="<?php echo $row["id_rdv"];?>" date_rdv="<?php echo $row["date_rdv"];?>" >
                                <li style="padding-bottom:10px;"><i class="fa fa-calendar"></i><strong > Date rendez-vous: <?php echo $row["date_rdv"] ?> </strong> </li>
                              </ul>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="images/medecin.png" alt="" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                            <div class=" col-sm-6 emphasis">
                            <button type="submit" id="diagno" class="btn btn-success btn-sm" style="margin-top:3%;">
                           <i class="fa fa-user"> </i> Voir Diagnostic</button>
                            </div>
                            </form>
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
