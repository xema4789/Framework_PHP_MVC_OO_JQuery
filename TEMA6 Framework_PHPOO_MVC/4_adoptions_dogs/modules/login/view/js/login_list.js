var ppassw = /[a-zA-z0-9@-_.,~ñ]{6,50}/;
var pmail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
var userProfile;

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

$(document).ready(function(){
  $('#content_revoery_passw').hide();

  var webAuth = new auth0.WebAuth({
    domain: 'yomogan.auth0.com',
    clientID: 'Gr1i37rPqCL7KlLYfDng79rosupaefgK',
    redirectUri: 'http://localhost/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs/login/list_login/',
    audience: 'https://' + 'yomogan.auth0.com' + '/userinfo',
    responseType: 'token id_token',
    scope: 'openid profile',
    leeway: 60
  });

  $(document).on('click','#send_login',function(){
    validate_login();
  });
  
  $(document).on('click','#send_register',function(){
    validate_register();
  });
  
  $(document).on('click','#login_auth0',function(e){
    e.preventDefault();
    webAuth.authorize();
  });
  
  $(document).on('click','#show_recoverypass',function(){
      $('#show_recoverypass').hide();
      $('#content_revoery_passw').show();
  });
  
  $(document).on('click','#recovery_passw',function(){
          result = true;
          $(".errorr").remove();
          $(".error1").remove();
          if ($("#rpuser").val() === "" || $("#rpuser").val() === "Introduce tu usuario" ) {
            $("#rpuser").focus().after("<span class='errorl'>Introduce tu usuario</span>");
            return false;
          }
          if (result) {
            $.post(amigable("?module=login&function=send_mail_rec"),{'rpuser':$("#rpuser").val()},function(data){
              if (data = 'true') {
                Command: toastr["success"]("Hemos enviado un correo electronico", "Revisa tu correo");
                setTimeout(function(){ window.location.href = amigable("?module=home&function=list_home"); }, 3000);
              }
            },"json").fail(function(data, textStatus, errorThrown){
                if (data.responseJSON == 'undefined' && data.responseJSON === null )
                    data.responseJSON = JSON.parse(data.responseText);
                if(data.responseJSON.error.rpuser)
                    $("#rpuser").focus().after("<span  class='error1'>" + data.responseJSON.error.rpuser + "</span>");
            });
          }
  });

  handleAuthentication();
  setTimeout(function(){ getProfile(); }, 1000);

  function handleAuthentication() {
    webAuth.parseHash(function(err, authResult) {
      if (authResult && authResult.accessToken && authResult.idToken) {
        setSession(authResult);
      } else if (err) {
      }
    });
  }

  function getProfile() {
    if (!userProfile) {
      var accessToken = localStorage.getItem('access_token');
      if (!accessToken) {
      }else{
        webAuth.client.userInfo(accessToken, function(err, profile) {
          console.log(profile);
          if (profile) {
            id_profile = profile.sub.split('|');
            //console.log(id_profile);
            $.post(amigable("?module=login&function=log_social"),
            {'data_social_net':JSON.stringify({'id_user':id_profile[1],'user':profile.nickname,'email':profile.nickname + "@gmail.com",'avatar':profile.picture})},
            function(data){
                localStorage.removeItem('id_token');
                localStorage.setItem('id_token',JSON.parse(data));
                localStorage.removeItem('access_token');
                localStorage.removeItem('expires_at');

                Command: toastr["success"]("Inicio de sesión correcto", "Iniciando sesion");
                setTimeout(function(){ window.location.href = amigable("?module=home&function=list_home"); }, 3000);
            });
          }
        });
      }
    }
  }
});

function setSession(authResult) {
  // Set the time that the access token will expire at
  var expiresAt = JSON.stringify(
    authResult.expiresIn * 1000 + new Date().getTime()
  );
  localStorage.setItem('access_token', authResult.accessToken);
  localStorage.setItem('id_token', authResult.idToken);
  localStorage.setItem('expires_at', expiresAt);
}

function validate_login(){
  result = true;
  $(".errorl").remove();
  $(".errorl1").remove();

  if ($("#luser").val() === "" || $("#luser").val() === "Introduce tu usuario" ) {
    $("#luser").focus().after("<span class='errorl'>Introduce tu usuario</span>");
    return false;
  }
  if ($("#lpasswd").val() === "" || $("#lpasswd").val() === "Introduce una contraseña" ) {
    $("#lpasswd").focus().after("<span class='errorl'>Introduce una contraseña</span>");
    return false;
  }else if (!ppassw.test($("#lpasswd").val())) {
    $("#lpasswd").focus().after("<span class='errorl'>El formato dela contraseña es incorrecto</span>");
    return false;
  }

  if (result) {
    $.post(amigable("?module=login&function=validate_login"),{'total_data':JSON.stringify({'luser':$("#luser").val(),'lpasswd':$("#lpasswd").val()})},function(data){
        localStorage.setItem('id_token', data);
        Command: toastr["success"]("Inicio de sesión correcto", "Iniciando sesion");
        setTimeout(function(){ window.location.href = amigable("?module=home&function=list_home"); }, 3000);
    },"json").fail(function(data){
        if (data.responseJSON == 'undefined' && data.responseJSON === null )
          data.responseJSON = JSON.parse(data.responseText);
        if(data.responseJSON.error.luser)
            $("#error_luser").focus().after("<span  class='errorl1'>" + data.responseJSON.error.luser + "</span>");
        if(data.responseJSON.error.lpasswd)
            $("#error_lpasswd").focus().after("<span  class='errorl1'>" + data.responseJSON.error.lpasswd + "</span>");
    });
  }
}

function validate_register(){
  result = true;
  $(".errorr").remove();
  $(".error1").remove();

  if ($("#ruser").val() === "" || $("#ruser").val() === "Introduce tu usuario" ) {
    $("#ruser").focus().after("<span class='errorr'>Introduce tu usuario</span>");
    return false;
  }
  if ($("#remail").val() === "" || $("#remail").val() === "Introduce tu email" ) {
    $("#remail").focus().after("<span class='errorr'>Introduce tu email</span>");
    return false;
  }else if (!pmail.test($("#remail").val())) {
    $("#remail").focus().after("<span class='errorr'>El formato del mail es incorrecto</span>");
    return false;
  }
  if ($("#rpasswd").val() === "" || $("#rpasswd").val() === "Introduce una contraseña" ) {
    $("#rpasswd").focus().after("<span class='errorr'>Introduce una contraseña</span>");
    return false;
  }else if (!ppassw.test($("#rpasswd").val())) {
    $("#rpasswd").focus().after("<span class='errorr'>El formato dela contraseña es incorrecto</span>");
    return false;
  }
  if ($("#rpasswdr").val() === "" || $("#rpasswdr").val() === "Introduce una contraseña" ) {
    $("#rpasswdr").focus().after("<span class='errorr'>Introduce una contraseña</span>");
    return false;
  }else if (!ppassw.test($("#rpasswdr").val())) {
    $("#rpasswdr").focus().after("<span class='errorr'>El formato dela contraseña es incorrecto</span>");
    return false;
  }

  if (result) {
    data = {'rname':$("#rname").val(),'ruser':$("#ruser").val(),'remail':$("#remail").val(),'rpasswd':$("#rpasswd").val(),'rpasswdr':$("#rpasswdr").val()};
    $.post(amigable("?module=login&function=validate_register"),{'total_data':JSON.stringify(data)},function(data){
        console.log(data);
        Command: toastr["success"]("Revisa tu correo electrónico para activar la cuenta.", "Registrado correctamente");
        setTimeout(function(){ window.location.href = amigable("?module=home&function=list_home"); }, 3000);
    },"json").fail(function(data, textStatus, errorThrown){
        if (data.responseJSON == 'undefined' && data.responseJSON === null )
            data.responseJSON = JSON.parse(data.responseText);
        if(data.responseJSON.error.ruser)
            $("#error_ruser").focus().after("<span  class='error1'>" + data.responseJSON.error.ruser + "</span>");
        if(data.responseJSON.error.remail)
            $("#error_remail").focus().after("<span  class='error1'>" + data.responseJSON.error.remail + "</span>");
        if(data.responseJSON.error.rpasswd)
            $("#error_rpasswd").focus().after("<span  class='error1'>" + data.responseJSON.error.rpasswd + "</span>");
        if(data.responseJSON.error.rpasswdr)
            $("#error_rpasswdr").focus().after("<span  class='error1'>" + data.responseJSON.error.rpasswdr + "</span>");
    });
  }
}
