<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $titulo; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('vendors/animate.css/animate.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
            $this->load->helper('form');
            $atributos = array('name' => 'formLogin', 'id' => 'formLogin', 'novalidate' => 'novalidade');
            echo form_open('Login/LoginAutenticar',$atributos);
             ?>
              <h1>Login Sistema Prático</h1>
              <div>
                <input type="text" class="form-control" name="emailLogin" id="emailLogin" placeholder="Formato: empregador@email.com" required="true" autofocus="true" />
              </div>
              <div>
                <input type="password" class="form-control" name="senhaLogin" id="senhaLogin" maxlength="10" placeholder="Digite a sua senha" required="true" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Entrar no Sistema" name="loginEntrar" id="loginEntrar" style="margin-left: 0 !important;" />
                <a class="reset_pass" href="#">Esqueceu a senha e o usuário?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1>Prático. Sistema de Gestão Online!</h1>
                  <p>©2017. Todos os direitos reservados. <br /> Desenvolvido por StartHelp</p>
                </div>
              </div>
          <?php
            form_close();
           ?>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
