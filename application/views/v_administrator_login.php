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
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url('admin/Dashboard') ?> " method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group has-feedback">
          <select class="form-control" name="akses">
              <option value=""> -- Pilih akses --- </option>
              <option value="1">Administrator</option>
              <option value="2">Operational</option>
              <option value="3">Owner</option>
          </select>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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
<!-- Bootstrap 4 -->
<script src="<?= base_url().'assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js' ?> "></script>
<!-- iCheck -->
<script src="<?= base_url().'assets/admin/plugins/iCheck/icheck.min.js' ?> "></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
