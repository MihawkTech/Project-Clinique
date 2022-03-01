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

    <title>Projet Ssad </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
    <!--<script src="script.js"></script> -->   
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
      $("#form1").submit(function(event){
        
       // id_medecin = id_medecin.substr(1);
        var symptome = $("textarea[name='symptome']").val();


        
            $.ajax({
                url: 'check.php',
                type: 'post',
                data: {
                    'save' : 1,
                    'symptome' : symptome,

                },
                success: function(response){
                    alert(response);
                    window.location.href = "rdv.php";    
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

                    <!-- navbar menu -->
              
                    <?php include('navbar.php'); ?>

                    <!-- /navbar menu -->

                   
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">

                                <div class="x_content">
                                    <form id="form1" action="check.php" method="post" novalidate>
                                         <div class="x_title">
                                    <h2 style="float:center;">  <span class="section">Prendre un Rendez-vous</span> </h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                                      
                                        <p style="font-size:14px;"> <strong> Veuillez remplir cette fiche avec vos Symptome pour prendre un rendez-vous </strong></p>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1  label-align">Nom<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control"  name="nom" value="<?php echo($_SESSION["nom"])?>" required="required" disabled/>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1 label-align">Prenom<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="prenom" data-validate-length-range="5,15" type="text" value="<?php echo($_SESSION["prenom"])?>"  disabled/></div>
                                        </div>
 
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="date" value="<?php echo($_SESSION["date_n"])?>"  required='required' disabled></div>
                                        </div>


                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1  label-align">Sexe<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="sexe" class='tel' name="sexe" required='required' data-validate-length-range="8,20" value="<?php echo($_SESSION["sexe"])?>" disabled/></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1  label-align">Telephone<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" value="<?php echo($_SESSION["numero_tel"])?>" disabled/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-1 col-sm-1 label-align">Symptome<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <textarea required="required" id="symptome" name='symptome'></textarea></div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>

		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- Sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
