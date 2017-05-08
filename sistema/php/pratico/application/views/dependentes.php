<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
<!-- page modal para salvar !-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal_editar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Cadastro Realizado</h4>
      </div>
      <div class="modal-body">
        <h4>Cadastro efetuado com sucesso</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>
<!-- pega o modal para deletar !-->
<div class="modal fade bs-example-modal-lg" id="modal_deletar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
        <button type="button" class="btn btn-danger" id="btn_excluir">Sim. Excluir</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12">

      <div class="x_content">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Cadastros</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Novo Cadastro</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Editar Cadastro</a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">

            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
              <?php
              // ver depois como jogar os dados lá no Controller
                  $queryDependentes = $this->db->query("SELECT * from dependentes");
               ?>
              <div class="x_panel">
                  <h4> Foram encontrados:
                <?php
                    echo $queryDependentes->num_rows();
                 ?>
                 registro(s)
               </h4>
                <div class="x_content">
                  <?php
                  if ($queryDependentes->num_rows() > 0):
                  ?>
                  <!-- lista todos os registros -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 20%">Nome do Dependente</th>
                        <th>Cpf do Dependente</th>
                        <th>Data de Nascimento</th>
                        <th>Iffr Imposto de Renda</th>
                        <th>Salário Família</th>
                        <th style="width: 20%">Opções do Cadastro</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($cadastroDependente as $dependente):
                       ?>
                        <tr>
                          <td>
                            <?= $dependente->nome; ?>
                          </td>
                          <td>
                            <?= $dependente->cpf; ?>
                          </td>
                          <td>
                            <?= $dependente->nascimento; ?>
                          </td>
                          <td>
                            <?= $dependente->iffr; ?>
                          </td>
                          <td>
                            <?= $dependente->salfamilia; ?>
                          </td>
                          <td>
                            <a href="#" title="Editar Dependente" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                            <a href="#" title="Remover Dependente" data-id="<?= $dependente->id ?>" data-nome="<?= $dependente->nome ?>" class="btn btn-danger btn-xs confirm_exclusao_dependente"><i class="fa fa-trash-o"></i> Deletar </a>
                          </td>
                        </tr>
                        <?php
                      endforeach;
                         ?>
                      </tbody>

                  </table>
                  <?php
              else:
                  echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>Nenhum registro encontrado</div>";
              endif;
                     ?>
                  </div>

                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                <!-- page content -->
                <div class="" role="main">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">

                          <div id="myTabContent" class="tab-content">

                            <!-- page content -->
                            <div class="" role="main">
                              <div class="">
                                <div class="clearfix"></div>

                                <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">

                                      <div class="x_content">
                                        <ul class="cadastro-indentado">
                                          <?= form_open('Dependente/DependenteStore')  ?>

                                          <span class="section">Cadastro de Dependentes</span>
                                          <li>
                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomeDependente">Nome<span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span class="erro"><?php echo form_error('nomeDependente') ?  : ''; ?></span>
                                                <input id="nomeDependente" name="nomeDependente" class="form-control has-feedback-left" data-validate-length-range="6" data-validate-words="2" value="<?= set_value('nomeDependente') ? : (isset($nomeDependente) ? $nomeDependente : '') ?>" placeholder="Digite o nome do Dependente" required="required" type="text" autofocus="true"/>
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpfDependente">CPF <span class="required">*</span>
                                              </label>
                                              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <span class="erro"><?php echo form_error('cpfDependente') ?  : ''; ?></span>
                                                <input type="text" id="cpfDependente" name="cpfDependente" required="required" placeholder="Formato: 000.000.000-00" value="<?= set_value('cpfDependente') ? : (isset($cpfDependente) ? $cpfDependente : '') ?>" class="form-control col-md-7 col-xs-12"/>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpfDependente">Data de Nascimento <span class="required">*</span>
                                              </label>
                                              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <span class="erro"><?php echo form_error('dataNascDependente') ?  : ''; ?></span>
                                                <input type="text" id="dataNascDependente" name="dataNascDependente" required="required" placeholder="Formato: dd/mm/YYYY" value="<?= set_value('dataNascDependente') ? : (isset($dataNascDependente) ? $dataNascDependente : '') ?>" class="form-control has-feedback-left"/>
                                                  <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iffrDependente">Recibo Imposto de Renda <span class="required">*</span>
                                              </label>
                                              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <span class="erro"><?php echo form_error('iffrDependente') ?  : ''; ?></span>
                                                <input type="text" id="iffrDependente" name="iffrDependente" required="required" placeholder="Recibo de imposto de renda" value="<?= set_value('iffrDependente') ? : (isset($iffrDependente) ? $iffrDependente : '') ?>" class="form-control col-md-7 col-xs-12"/>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salfamiliaDependente">Salário Família <span class="required">*</span>
                                              </label>
                                              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <span class="erro"><?php echo form_error('salfamiliaDependente') ?  : ''; ?></span>
                                                <input type="text" class="form-control has-feedback-left" id="salfamiliaDependente" name="salfamiliaDependente" required="required" placeholder="Formato: R$ 0.00" value="<?= set_value('salfamiliaDependente') ? : (isset($salfamiliaDependente) ? $salfamiliaDependente : '') ?>"/>
                                                <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                              </div>
                                            </div>
                                          </li>
                                          <li>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <input type="reset" class="btn btn-primary" value-"Limpar Formulário"/>
                                                <input id="send" type="submit" class="btn btn-success" value="Salvar Cadastro"/>
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>!-->
                                              </div>
                                            </div>
                                          </li>
                                          <?php
                                          form_close();
                                          // fecha a validação do formulário
                                          ?>
                                        </ul><!-- fima da ul !-->
                                      </div><!-- fim da classe x-content!-->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /page content -->
                          </div>
                        </div>
                      </div> <!-- dinal da classe X-Content !-->

                    </div>
                  </div>
                </div>
                <!-- /page content -->

                <!-- /page content -->
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Cadastro <small>Selecione os cadastros abaixo para editar:</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <select class="form-control">
                        <option>Selecione uma opção...</option>
                        <option>Opção 1</option>
                        <option>Opção 2</option>
                        <option>Opção 3</option>
                        <option>Opção 4</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- dinal da classe X-Content !-->
      </div>
    </div>
  </div>
  <!-- /page content -->
  <?php
  $this->load->view('footer');
  ?>
