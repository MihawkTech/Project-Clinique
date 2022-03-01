<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AffichPatients</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <?php include "dbh.php";?>
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script>
  $(document).ready(function(){
   $(".diagno").click(function(){
      
      var idRdv = $(this).attr('idRdv').trim();
      if(idRdv){
        window.location = 'diagno.php?idRdv=' + idRdv;
      }   
    });
    $(".affichDia").click(function(){
      
      var idRdv = $(this).attr('idRdv').trim();
      if(idRdv){
        window.location = 'AffichDiagno.php?idRdv=' + idRdv+'&confirm=2';
      }   
    });
    $(".chiffree").click(function(){
      
      var idRdv = $(this).attr('idRdv').trim();
      if(idRdv){
        window.location = 'AffichDiagno.php?idRdv=' + idRdv+'&confirm=0';
      }   
    });
  });
</script>
  </head>

  <body class="nav-md">
  <?php
    session_start();// onload="corriger_boutton()"
    $idUser=$_SESSION['id'];
    $query="select * from medecin where id_medecin=\"".$idUser."\"";
                    $existUser=$conn->query($query)->fetch_assoc();
                    $name=$existUser["nom"];
                    $email=$existUser["email"];
                    $prenom=$existUser["prenom"];
                    $specialite=$existUser["specialite"];

  ?>
    <div class="container body">
      <div class="main_container">
      <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-plus-circle"></i> <span>Clinique confident</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="calendar.php">
                  <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                </a>              
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $prenom." ".$name;?><span><?php echo " ".$specialite;?></span></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-calendar"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="calendar.php"><i class="fa fa-calendar"></i>Calendar</a></li>
                      <li><a href="tables_dynamic.php"><i class="fa fa-tags"></i>confirm rdv</a></li>
                      <li><a href="contacts.php"><i class="fa fa-group"></i>Patiens</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt=""><?php echo $prenom." ".$name;?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Contacts Design</h3>
              </div>

              <div class="title_right">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">
                      </div>

                      <div class="clearfix"></div>
                      <?php
                              $query="SELECT rendez_vous.id_patient,rendez_vous.id_rdv,patient.email,patient.date_n,patient.adresse,patient.numero_tel,patient.sexe,patient.prenom,patient.nom,rendez_vous.date_rdv,rendez_vous.symptomes,rendez_vous.confirmer FROM patient,rendez_vous WHERE patient.id_patient=rendez_vous.id_patient and rendez_vous.id_medecin=".$idUser." and (rendez_vous.confirmer='1' or rendez_vous.confirmer='2')";
                              $resultat=$conn->query($query);
                              while($row=$resultat->fetch_assoc()){
                                $IdRdv=$row["id_rdv"];
                                $NameP=$row["prenom"]." ".$row["nom"];
                                $EmailP=$row["email"];
                                $NumTelP=$row["numero_tel"];
                                $SexeP=$row["sexe"];
                                $Symptomes=$row["symptomes"];
                                $DateRdv=$row["date_rdv"];
                                $dateNP=$row["date_n"];
                                $id_patient=$row["id_patient"];
                                $confirmer=$row["confirmer"];
                                //$split=date_parse_from_format('Y-m-d h:i:s', $date);
                                                      //calcul Age
                                $today = date('Y-m-d');
                                $d1 = new DateTime($dateNP);
                                $d2 = new DateTime($today);
                                $diff = $d2->diff($d1);
                                $ageP = $diff->y;
                                echo "                      <div class='col-md-4 col-sm-4  profile_details'>
                                <div class='well profile_view'>
                                  <div class='col-sm-12'>
                                    <h4 class='brief'><i></i></h4>
                                    <div class='left col-md-7 col-sm-7'>
                                      <h2>".$NameP."</h2>
                                      <ul class='list-unstyled'>
                                        <li><i class='fa fa-building'></i> Email: ".$EmailP."</li>
                                        <li><i class='fa fa-phone'></i> Phone #: ".$NumTelP."</li>
                                        <li><i class='fa fa-square'></i> Age : ".$ageP."</li>
                                        <li><i class='fa fa-male'></i> <i class='fa fa-female'></i> Sexe : ".$SexeP."</li>
                                        <li><i class='fa fa-calendar'></i> Date RDV : ".$DateRdv."</li>

                                      </ul>
                                      <p><strong>Symptomes: </strong> ".$Symptomes."</p>

                                    </div>
                                    <div class='right col-md-5 col-sm-5 text-center'>
                                      <img src='images/img.jpg' alt='' class='img-circle img-fluid'>
                                    </div>
                                  </div>
                                  <div class=' profile-bottom text-center'>
                                    <div class=' col-sm-6 emphasis'>";
                                    if($confirmer==1){
                                    echo"
                                      <button type='button' class='btn btn-primary btn-sm diagno' idRdv='".$IdRdv."'>
                                        <i class='fa fa-user'> </i>Diagnostic";
                                      }
                                    if($confirmer==2){
                                        echo "                                      <a  href='diagnostic1.php'><button type='button' class='btn btn-primary btn-sm affichDia' idRdv='".$IdRdv."' disabled>
                                        <i class='fa fa-user'> </i> Affich Diagnostic";}
                                        echo"
                                      </button></a>
                                    </div>
                                  </div>
                                </div>
                              </div> ";
                              }
                              //2cas
                              $query="SELECT rendez_vous.id_patient,rendez_vous.id_rdv,patient.date_n,patient.sexe,rendez_vous.symptomes FROM patient,rendez_vous WHERE patient.id_patient=rendez_vous.id_patient and  rendez_vous.confirmer='2' and rendez_vous.id_medecin!=".$idUser;
                              $resultat=$conn->query($query);
                              while($row=$resultat->fetch_assoc()){
                                $IdRdv=$row["id_rdv"];
                                $SexeP=$row["sexe"];
                                $Symptomes=$row["symptomes"];
                                $dateNP=$row["date_n"];
                                $id_patient=$row["id_patient"];
                                //$split=date_parse_from_format('Y-m-d h:i:s', $date);
                                                      //calcul Age
                                $today = date('Y-m-d');
                                $d1 = new DateTime($dateNP);
                                $d2 = new DateTime($today);
                                $diff = $d2->diff($d1);
                                $ageP = $diff->y;
                                echo "                      <div class='col-md-4 col-sm-4  profile_details'>
                                <div class='well profile_view'>
                                  <div class='col-sm-12'>
                                    <h4 class='brief'><i></i></h4>
                                    <div class='left col-md-7 col-sm-7'>
                                      <h2>******</h2>
                                      <ul class='list-unstyled'>
                                        <li><i class='fa fa-building'></i> Email: ******</li>
                                        <li><i class='fa fa-phone'></i> Phone #: ******</li>
                                        <li><i class='fa fa-square'></i> Age : ".$ageP."</li>
                                        <li><i class='fa fa-male'></i> <i class='fa fa-female'></i> Sexe : ".$SexeP."</li>
                                        <li><i class='fa fa-calendar'></i> Date RDV : ******</li>

                                      </ul>
                                      <p><strong>Symptomes: </strong> ".$Symptomes."</p>

                                    </div>
                                    <div class='right col-md-5 col-sm-5 text-center'>
                                      <img src='images/img.jpg' alt='' class='img-circle img-fluid'>
                                    </div>
                                  </div>
                                  <div class=' profile-bottom text-center'>
                                    <div class=' col-sm-6 emphasis'>
                                      <button type='button' class='btn btn-primary btn-sm chiffree' idRdv='".$IdRdv."' disabled>
                                        <i class='fa fa-user'> </i> Affich Diagnostic
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div> ";
                              }
                              ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


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