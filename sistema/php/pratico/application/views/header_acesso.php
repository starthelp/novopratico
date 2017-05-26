<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= $titulo;  ?></title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('build/css/custom.min.css');  ?>" rel="stylesheet">

  <!-- tema do css externo com possíveis alterações !-->
  <link href="<?php echo base_url('css/style.css');  ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
  <!-- modal deletar !-->
  <script src="<?php echo base_url('js/funcoes.js'); ?>"></script>
  <!-- validação do cpf !-->
  <script src="<?php echo base_url('js/js_cpf.js'); ?>"></script>
  <!-- script validate!-->
  <script src="<?php echo base_url('js/jquery_validate.js'); ?>"></script>
  <!-- script validação de formulário !-->
  <script src="<?php echo base_url('js/js_validator.js'); ?>"></script>
  <!-- script de validação de moeda !-->
  <script src="<?php echo base_url('js/js_moeda.js'); ?>"></script>

</head>
<body class="nav-md">
<!-- modal para sair do sistema !-->
<div class="modal fade bs-example-modal-lg-dependente" id="modal_sair_sistema">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação para sair</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente sair do sistema?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Não. Desejo continuar</button>
        <button type="button" class="btn btn-danger" id="btn_sair">Sim. Desejo sair</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a class="site_title"><span>Prático!</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Administrativo</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('Index'); ?>" title="Voltar para Dashboard">Tela Inicial</a></li>
                    <li><a href="<?php echo base_url('empregadores'); ?>" title="Meus Dados do Cadastro">Meus Dados</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url('colaboradores'); ?>" title="Colaboradores">Colaboradores</a></li>
                    <li><a href="<?php echo base_url('dependentes'); ?>" title="Dependentes">Dependentes</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html" title="Sair do Sistema Prático">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <!--<img src="images/img.jpg" alt="">!-->Empregador
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo base_url('empregadores'); ?>" title="Visualizar Perfil"> Perfil</a></li>
                  <!--<li><a href="http://www.praticoonline.com.br/contato/" target="_blank" title="Ajuda do Sistema">Ajuda do Sistema</a></li>!-->
                  <li><a href="#" class="confirm_sair_sistema" title="Sair do Sistema"><i class="fa fa-sign-out pull-right" title="Sair do Sistema"></i> Sair</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">

                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
