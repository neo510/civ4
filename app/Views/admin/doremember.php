<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Espace d'administration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('public/assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=site_url()?>"><b>Récupération de votre mot de passe</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Saisissez votre nouveau mot de passe</p>
      <form action="<?=site_url("admin/login/remember/".$key) ?>" method="post" id="dorememberform">
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Nouveau mot de passe" name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-eye eye-show" style="cursor:pointer" data-state="0"></span>
                </div>
            </div>
        </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Redéfinir le mot de passe</button>
          </div>
          <div class="col-12" style="padding-top:15px">
          <?=session()->getFlashData("message")?>
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
<script src="<?= base_url('public/assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/assets/js/adminlte.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".eye-show").on("click",function(){
            if($(this).data('state')=="0"){
                $("input[name='password']").prop("type","text");
                $(this).data("state","1");
            }else{
                $("input[name='password']").prop("type","password");
                $(this).data("state","0");
            }
        });
    });
</script>
</body>
</html>
