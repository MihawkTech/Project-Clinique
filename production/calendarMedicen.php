<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>calendar/Medicen </title>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">


    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <?php include "dbh.php";?>
    <style>
      a:not([href]):not([tabindex]),a:not([href]):not([tabindex]):focus,a:not([href]):not([tabindex]):hover{
          color:black;
      }
    </style>
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>

        <script>
      $(document).ready(function(){
      $("#form").submit(function(event){
        var idRdv=$(this).attr("rdv");
        var idM=$(this).attr("idM");
        var idf=$(this).attr("idf");

        idRdv = idRdv.substr(1);
        idM = idM.substr(1);
        idf = idf.substr(1);


        var time = $("input[name='dateRdv']").val();
        /*
        var hours = Number(time.match(/^(\d+)/)[1]);
        var minutes = Number(time.match(/:(\d+)/)[1]);
        var AMPM = time.match(/\s(.*)$/)[1];
        if(AMPM == "PM" && hours<12) hours = hours+12;
        if(AMPM == "AM" && hours==12) hours = hours-12;
        var sHours = hours.toString();
        var sMinutes = minutes.toString();
        if(hours<10) sHours = "0" + sHours;
        if(minutes<10) sMinutes = "0" + sMinutes;
        alert(sHours + ":" + sMinutes);*/
        

        function convertDateTo24Hour(date){
          var elem = date.split(' ');
          var stSplit = elem[1].split(":");// alert(stSplit);
          var dat=elem[0].split("/");
          var stHour = stSplit[0];
          var stMin = stSplit[1];
          var stAmPm = elem[2];
          var newhr = 0;
          var ampm = '';
          var newtime = '';
          //alert("hour:"+stHour+"\nmin:"+stMin+"\nampm:"+stAmPm); //see current values
          
          if (stAmPm=='PM')
          { 
              if (stHour!=12)
              {
                  stHour=stHour*1+12;
              }
            
          }else if(stAmPm=='AM' && stHour=='12'){
            stHour = stHour -12;
          }else{
              stHour=stHour;
          }
          return dat[2]+'-'+dat[0]+'-'+dat[1]+" "+stHour+':'+stMin;
      }
      dateRdv=convertDateTo24Hour(time)

            $.ajax({
                url: 'UpdateRdv.php',
                type: 'post',
                data: {
                    'saveRdv' : 1,
                    'idRdv' : idRdv,
                    'idM' : idM,
                    'idf' : idf,
                    'dateRdv' : dateRdv,

                },
                success: function(response){
                   alert("le rendez-vous été affecté");
                    //window.location.href = "contacts.php";    
                }
                
            });
        event.preventDefault();
    });
  });
    </script>

  </head>

  <body class="nav-md">
  <?php
    //session_start();// onload="corriger_boutton()"
    $url_components = parse_url($_SERVER['REQUEST_URI']); 
    parse_str($url_components['query'], $params);
    $idRdv=$params['idRdv'];
    $idM=$params['idM'];
    $idUser=$_SESSION['id'];
    $query="select * from infermie where id_inf=\"".$idUser."\"";
                    $existUser=$conn->query($query)->fetch_assoc();
                    $name=$existUser["nom"];
                    $email=$existUser["email"];
                    $prenom=$existUser["prenom"];
                    $service=$existUser["service"];
    $queryM="select * from medecin where id_medecin=\"".$idM."\"";
    $existUserM=$conn->query($queryM)->fetch_assoc();
    $nameM=$existUserM["nom"];
    $emailM=$existUserM["email"];
    $prenomM=$existUserM["prenom"];
    $specialiteM=$existUserM["specialite"];    


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
                <h2><?php echo $prenom." ".$name;?><span><br> Service: </span><?php echo " ".$service;?></h2>
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
                      <li><a href="infirmier.php"><i class="fa fa-calendar"></i>File d'attente</a></li>
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
                <h3>Calendar</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo $prenomM." ".$nameM;?></h3>
                      <br>
                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-envelope user-profile-icon"></i><?php echo " ".$emailM;?>
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo " ".$specialiteM;?>
                        </li>
                      </ul><br>
                      <h4>selectionner une date de rdv:</h4>
                      <form id="form" action="#" method="post" rdv="<?php echo "R".$idRdv;?>" idM="<?php echo "M".$idM;?>" idf="<?php echo "f".$idUser;?>">
                        <div class="container">
                          <div class="row">
                              <div class='col-sm-12'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                      <input type='text' class="form-control" name="dateRdv" />
                                      <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                    </div>
                                </div>
                              </div>
                              <script type="text/javascript">
                              $(document).ready(function(){
                                $(function () {
                                    $('#datetimepicker1').datetimepicker();
                                });
                              });
                              </script>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </form>
                    </div>
                    <div class="col-md-9 col-sm-9">
                    <div id='calendar'></div>
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
          
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- calendar modal -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
          </div>
          <div class="modal-body">

            <div id="testmodal2" style="padding: 5px 20px;">
              <form id="antoform2" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title2" name="title2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                  </div>
                </div>

              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    
    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
        


    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <script>//to add in calender
      {console.log("init_calendar");
        var o,e=new Date,a=e.getDate(),
        t=e.getMonth(),n=e.getFullYear(),
        i=$("#calendar").fullCalendar({header:{left:"prev,next today",
          center:"title",
          right:"month,agendaWeek,agendaDay,listMonth"},
          selectable:!0,
          selectHelper:!0,
          select:function(e,a,t){$("#fc_create").click(),
            o=e,ended=a,$(".antosubmit").on("click",
            function(){var e=$("#title").val();
              return a&&(ended=a),$("#event_type").val(),
              e&&i.fullCalendar("renderEvent",{title:e,start:o,end:a,allDay:t},!0),
              $("#title").val(""),i.fullCalendar("unselect"),
              $(".antoclose").click(),!1})},
              eventClick:function(e,a,t){$("#fc_edit").click(),
                $("#title2").val(e.title),$("#event_type").val(),
                $(".antosubmit2").on("click",function(){e.title=$("#title2").val(),i.fullCalendar("updateEvent",e),$(".antoclose2").click()}),
                i.fullCalendar("unselect")},
                editable:!0,
                //updateViewDate: false,//3lajal had commande drabt 5h wana n7awas
                events:[<?php

                    $query="SELECT patient.prenom,patient.nom,rendez_vous.date_rdv FROM patient,rendez_vous WHERE patient.id_patient=rendez_vous.id_patient and rendez_vous.id_medecin=".$idUser;
                    $resultat=$conn->query($query);
                    while($row=$resultat->fetch_assoc()){    
                      $date=$row["date_rdv"];
                      $split=date_parse_from_format('Y-m-d h:i:s', $date);
                    ?>
                  {title:"<?php echo "".$row["prenom"]." ".$row["nom"];?>",start:new Date(<?php echo $split['year'];?>,<?php echo $split['month']-1;?>,<?php echo $split['day'];?>,<?php echo $split['hour'];?>,<?php echo $split['minute'];?>)},<?php }?>
                ]})};    
    </script>
  </body>
</html>