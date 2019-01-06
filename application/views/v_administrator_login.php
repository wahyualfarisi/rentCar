<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log i</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url().'assets/admin/dist/css/adminlte.min.css' ?> ">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url().'assets/admin/plugins/iCheck/square/blue.css' ?> ">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?= base_url('assets/users/img/madera1.png') ?>" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="card" id="box-form">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="login_form" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <div class="checkbox icheck">
          <label>
            <input type="checkbox" id="showPassword"> Tampilkan password
          </label>
        </div>


        <div class="form-group has-feedback">
          <select class="form-control" name="akses" id="akses">
              <option value=""> -- Pilih akses --- </option>
              <option value="1">Administrator</option>
              <option value="2">Operational</option>
              <option value="3">Owner</option>
          </select>
        </div>
        <div class="row">
          <div class="col-4">
            <input type="button" id="login" class="btn btn-primary btn-block btn-flat" value="Sign in" >
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?= base_url().'assets/admin/plugins/jquery/jquery.min.js' ?> "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js' ?> "></script>
<!-- iCheck -->
<script src="<?= base_url().'assets/admin/plugins/iCheck/icheck.min.js' ?> "></script>
<script>
  $(document).ready(function() {


    $('#showPassword').on('click', function() {
      if($(this).is(':checked') )
      {
        $('#password').attr('type', 'text');
      }else {
        $('#password').attr('type', 'password');
      }
    });

    $('#login').click(function(){

      var email    = $('#email').val();
      var password = $('#password').val();
      var akses    = $('#akses').val();

      if($.trim(email).length > 0 && $.trim(password).length > 0 && $.trim(akses) !== '' ){

        $.ajax({
          url: "<?= base_url('LoginAdmin/actionLogin') ?>",
          method: "POST",
          data: {email: email, password: password, akses: akses},
          cache: false,
          beforeSend: function(){
            $('#login').val('loading ...');
          },
          success: function(data){
            if(data){
              window.location = "<?= base_url('admin/Dashboard')  ?> ";
            }else{
              var options = {
                distance: '40',
                direction: 'left',
                times: 3
              }
              $('#box-form').effect("shake", options, 800);
              $('#login').val("login");
            }
          }
        });

      }else{
        return false;
      }

    })
  });
</script>
</body>
</html>
