$(document).ready(function(){

    var user_state1 = false;
    var user_state2 = false;
    var pss_state2 = false;
    var ps1=null;
    var ps2=null;
    var clientL;
    $("div .dropdown-item").click(function() {
        user=$(this).attr("val");
    });

    $("input[name='login']").blur(function() {
        var email = $("input[name='login']").val();
        $.post("check.php",{userCheck : email
        },function(data, status) {
            //alert(data);
            if (data == 'not_taken' ) {
                user_state1 = false;
                $("#user1").html("<b><font size='3' color='red'> Account does not exist </font></b>");
            }else{
                $("#user1").html("");
                user_state1 = true;
                if (data == 'takenP') {
                    clientL="patient";
                }else if (data == 'takenM') {
                    clientL="medecin";
                }else if (data == 'takenI') {
                    clientL="inf";
                }
            }
        });
    });

    $("#form1").submit(function(event){
        var user = $("input[name='login']").val();
        var passwordL = $("input[name='password']").val();
        
        if ( user_state1 == true ) {
        // proceed with form submission
            $.ajax({
                url: 'check.php',
                type: 'post',
                data: {
                    'login' : 1,
                    'clientL' : clientL,
                    'email' : user,
                    'password' : passwordL,
                },
                success: function(response){
                    //alert(response);
                    if ((response == "loginP!" || response == "loginM!" || response == "loginI!")) {
                        $("#pswerr").html("");
                        $("input[name='login']").val('');
                        $("input[name='password']").val('');
                        //send tooooooo
                        if(response == "loginM!")
                            window.location.href = "../calendar.php";
                        if(response == "loginI!")
                            window.location.href = "../infirmier.php";
                        if(response == "loginP!")
                            window.location.href = "../Home.php";                         
                    }else{ if ( response == "errpsw!" ) {
                        $("#pswerr").html("<b><font size='3' color='red'> The password is incorrect </font></b>");
                    }
                    else if (response == "ban!"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'wait 30 seconds !',
                          })
                    }
                }
                }
            });
        }else{} //alert("user!!!!!");

        event.preventDefault();
    });


    $("#form2").submit(function(event){
        var user = $("input[name='username']").val();
        var passwordL = $("input[name='pass']").val();
        var passcheck = $("input[name='passcheck']").val();
        var nom = $("input[name='nom']").val();
        var prenom = $("input[name='prenom']").val();
        var numtel = $("input[name='numtel']").val();
        var adresse = $("input[name='adresse']").val();
        var anniv = $("input[name='anniv']").val();
        var sexe =$('input[name=gender]:checked').val();

        //alert("user="+user+" passwordL="+passwordL+" passcheck="+passcheck+" nom="+nom+" prenom="+prenom+" numtel="+numtel+" adresse="+adresse+" anniv="+anniv+" sexe="+sexe);
        if ( (user_state2 == true) && (pss_state2== true )) {
        // proceed with form submission
            $.ajax({
                url: 'check.php',
                type: 'post',
                data: {
                    'save' : 1,
                    'email' : user,
                    'password' : passwordL,
                    'nom' : nom,
                    'prenom' : prenom,
                    'numtel' : numtel,
                    'adresse' : adresse,
                    'anniv' : anniv,
                    'sexe' : sexe,

                },
                success: function(response){
                    //alert(response);
                    $("input[name='userName']").val('');
                    $("input[name='pass']").val('');
                    $("input[name='passcheck']").val('');
                    $("input[name='nom']").val('');
                    $("input[name='prenom']").val('');
                    $("input[name='numtel']").val('');
                    $("input[name='adresse']").val('');
                    $("input[name='anniv']").val('');
                    $("input[name='gender']").val('');

                    window.location.href = "../Home.php";
                     
                }
            });
        }else{

        }
        event.preventDefault();
    });

    $("#singin").blur(function() {
        var User = $(this).val();
        $.post("check.php",{userCheck : User
        },function(data, status) {
            if (data == 'not_taken') {
                $("#user2").html("");
                user_state2 = true;

            }else if ((data == "takenP" || data == "takenM" || data == "takenI")) {  
                $("#user2").html("<b><font size='3' color='red'> account already exists </font></b>");
                user_state2 = false;
            }
        });
    });


    $("#pass").blur(function() {
        ps1 = $(this).val();
        if(ps2!=ps1){
            pss_state2=false;
            }else{
                pss_state2=true;
                $("#ps").html("");
            }

    });
    $("#passcheck").blur(function() {
        var ps2 = $(this).val();
        if(ps2!=ps1){
        pss_state2=false;
        $("#ps").html("<b><font size='3' color='red'> err check </font></b>");
        }else{
            pss_state2=true;
            $("#ps").html("");
        }
    });

});
