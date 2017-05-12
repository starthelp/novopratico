<?php
$this->load->view('header');
 ?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">E</div>
                <h3>Meus Dados</h3>
                <p>
                  <a href="<?php  echo base_url('empregadores'); ?>" title="Visualizar os dados do Empregador">
                    Visualizar Dados do Empregador
                </a>
                </p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">C</div>
                <h3>Colaboradores</h3>
                <p>
                  <a href="<?php echo base_url('colaboradores');  ?>" title="Cadastrar um novo Colaborador">
                    Cadastrar Informações do Colaborador
                  </a>
                  </p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">D</div>
                <h3>Dependentes</h3>
                <p>
                  <a href="<?php echo base_url('dependentes');  ?>" title="Cadastrar informações do Dependente">
                  Cadastrar Informações do Dependente</p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
<?php
$this->load->view('footer');
 ?>
