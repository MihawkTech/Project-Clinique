<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>diagno</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <?php include "dbh.php";?>
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
      $("#form").submit(function(event){
        var idRdv=$(this).attr("rdv");
        idRdv = idRdv.substr(1);
        var Maladie = $("textarea[name='Maladie']").val();
        var idstTab=[];

        if($(".tr1").is(":checked")){
          idst=$(".tr1").attr("id");
          idstTab.push(idst);
        }
        if($(".tr2").is(":checked")){
          idst=$(".tr2").attr("id");
          idstTab.push(idst);
        }
        if($(".tr3").is(":checked")){
          idst=$(".tr3").attr("id");
          idstTab.push(idst);
        }
        if($(".tr4").is(":checked")){
          idst=$(".tr4").attr("id");
          idstTab.push(idst);
        }
        if($(".tr5").is(":checked")){
          idst=$(".tr5").attr("id");
          idstTab.push(idst);
        }
        idst=idstTab.join('|');
            $.ajax({
                url: 'UpdateRdv.php',
                type: 'post',
                data: {
                    'save' : 1,
                    'idRdv' : idRdv,
                    'idst' : idst,
                    'Maladie' : Maladie,

                },
                success: function(response){
                   //alert(response);
                    window.location.href = "contacts.php";    
                }
                
            });
        event.preventDefault();
    });
  });
    </script>

  </head>

  <body class="nav-md footer_fixed">
    <?php
      session_start();// onload="corriger_boutton()"
      $url_components = parse_url($_SERVER['REQUEST_URI']); 
      parse_str($url_components['query'], $params);
      $idRdv=$params['idRdv'];
      $query="select * from patient,rendez_vous where rendez_vous.id_patient=patient.id_patient and id_rdv=\"".$idRdv."\"";
                      $existP=$conn->query($query)->fetch_assoc();
                      $nomP=$existP["nom"];
                      $prenomP=$existP["prenom"];
                      $dateNP=$existP["date_n"];
                      $symptomes=$existP["symptomes"];
                      //calcul Age
                      $today = date('Y-m-d');
                      $d1 = new DateTime($dateNP);
                      $d2 = new DateTime($today);
                      $diff = $d2->diff($d1);
                      $ageP = $diff->y;

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
                <a href="#">
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
            <div class="page-title mt-5 ml-5">
              <h4 class="font-italic">Information de patient</h4>
              <div class="title_lefts mt-5 ml-5">
                <p class="font-weight-bold">Nom :    <?php echo $nomP;?></p>
                <p class="font-weight-bold">Prenom : <?php echo $prenomP;?></p>
                <p class="font-weight-bold">Age :    <?php echo $ageP;?></p>
                <p class="font-weight-bold">Symptomes :    <?php echo $symptomes;?></p>
              </div>
              <br>

              <form id="form" action="#" method="post" rdv="<?php echo "R".$idRdv;?>">
                <!-- Start to do list -->
                <div class="col-md-6 col-sm-6 mb-5">
                  <h4 class="font-italic"><label for="Maladie">Maladie</label></h4>
                  <textarea id="Maladie" required="required" class="form-control" name="Maladie"></textarea>
                  <br>
                  <div class="x_panel">
                    <div class="x_title">
                      <h2 class="font-italic">Traitement</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="">
                        <ul class="to_do">    
                          <?php 
                              $query="select * from traitement where 1";
                              $resultat=$conn->query($query);
                              $i=1;
                              while($row=$resultat->fetch_assoc()){
                                $id_tr=$row["id_tr"];
                                $nom_tr=$row["nom_tr"];
                                echo "<li>
                                        <p><input id='".$id_tr."' type='checkbox' class='flat tr".$i."'> ".$nom_tr." </p>
                                      </li>";
                                      $i++;
                              }
                          ?>                         
                        </ul>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
                  <!-- End to do list -->
              </form>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right"></div>
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
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>