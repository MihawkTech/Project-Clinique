<?php 
session_start();
include "dbh.php";
$id = $_SESSION['id'];
$query1 = "SELECT * FROM medecin,rendez_vous WHERE rendez_vous.id_patient = $id and rendez_vous.id_medecin = medecin.id_medecin and confirmer = '2'";

$evaluation = $conn->query($query1);


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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
      $("#form2").submit(function(event){
        var id_medecin=$(this).attr("idm");
       // id_medecin = id_medecin.substr(1);
        var reclamation = $("textarea[name='reclamation']").val();

        
            $.ajax({
                url: 'check.php',
                type: 'post',
                data: {
                    'save' : 1,
                    'id_medecin' : id_medecin,
                    'reclamation' : reclamation,

                },
                success: function(response){
                    alert(response);
                    window.location.href = "Evaluation.php";    
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


    <?php 
                    while($row = $evaluation->fetch_assoc()) {
                      $id_medecin =$row["id_medecin"];
                      
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
                          <div class=" bottom text-left">
                          <form id="form2" action="check.php" method="post" idm="<?php echo $id_medecin;?>" novalidate>
                          <textarea required="required" id="evaluation" name='reclamation' placeholder="Votre avis sur ce medecin"></textarea>
                        
                            <button type="submit" class="btn btn-success" style="margin-top:3%;">
                           <i class="fa fa-user"> </i> Avis</button>
                            
                           
                           </form>
                         
                          
                          </div>
                        </div>
                      </div>
                    
           <?php } ?>    

         
           </div>  
        <!-- /page content -->

        <!-- footer content -->
        <footer>
                <div class="pull-left" style="padding-top:30px; padding-left:140px;">
                   <strong> Adresse: Rue256 SSAD Projet confidentialité </strong>
                </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
   
    </div>


    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
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