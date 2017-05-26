<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<!-- pega o modal para deletar !-->
<div class="modal fade bs-example-modal-lg-dependente" id="modal_deletar_dependente">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir o registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
        <button type="button" class="btn btn-danger" id="btn_excluir_dependente">Sim. Excluir</button>
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
                          <th style="width: 20%; text-transform: uppercase;">Nome do Dependente</th>
                          <th style="text-transform: uppercase;">Cpf do Dependente</th>
                          <th style="text-transform: uppercase;">Data de Nascimento</th>
                          <th style="text-transform: uppercase;">Dedução Imposto</th>
                          <th style="text-transform: uppercase;">Salário Família</th>
                          <th style="width: 20%; text-transform: uppercase;">Opções do Cadastro</th>
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
                              <?= $dependente->deducaoirrf; ?>
                            </td>
                            <td>
                              <?= $dependente->salfamilia; ?>
                            </td>
                            <td>
                              <a href="<?=base_url("Dependente/DependenteEditar/".$dependente->id); ?>" title="Editar Dependente" class="btn btn-info btn-xs confirm_editar_dependente"><i class="fa fa-pencil"></i> Editar </a>
                              <a href="#" title="Remover Dependente" data-id="<?= $dependente->id; ?>" data-nome="<?= $dependente->nome; ?>" class="btn btn-danger btn-xs confirm_exclusao_dependente"><i class="fa fa-trash-o"></i> Deletar </a>
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

                                        <?php
                                        $this->load->helper('form');
                                        $atributos = array('name' => 'formDependente', 'id' => 'formDependente', 'novalidate' => 'novalidade');
                                        echo form_open('Dependente/DependenteStore',$atributos);

                                        ?>

                                        <span class="section">Cadastro de Dependentes</span>
                                        <li>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomeDependente">Escolha o colaborador<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <select name="colaboradorDependente" id="colaboradorDependente" class="form-control" required="required">
                                                <?php echo $options_colaboradores; ?>
                                              </select>
                                            </div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomeDependente">Nome<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <span class="erro"><?php echo form_error('nomeDependente') ?  : ''; ?></span>
                                              <input id="nomeDependente" name="nomeDependente" class="form-control has-feedback-left" data-validate-length-range="6" data-validate-words="2" value="<?= set_value('nomeDependente') ? : (isset($nomeDependente) ? $nomeDependente : '') ?>" placeholder="Digite o nome do Dependente" required="required" type="text" autofocus="true"/>
                                              <span class="fa fa-user form-control-feedback left" style="line-height: 1.4em;" aria-hidden="true"></span>
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
                                              <span class="fa fa-calendar form-control-feedback left" style="line-height: 1.4em;" aria-hidden="true"></span>
                                            </div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="irrfDependente">Dedução Imposto de Renda <span class="required">*</span>
                                            </label>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                              <span class="erro"><?php echo form_error('iffrDependente') ?  : ''; ?></span>
                                              <input type="text" id="irrfDependente" name="irrfDependente" required="required" placeholder="Recibo de imposto de renda" value="<?= set_value('iffrDependente') ? : (isset($iffrDependente) ? $iffrDependente : '') ?>" class="form-control col-md-7 col-xs-12"/>
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
                                              <span class="fa fa-tag form-control-feedback left" style="line-height: 1.4em;" aria-hidden="true"></span>
                                            </div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                                          <div class="form-group">
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                              <button type="reset" class="btn btn-primary">Resetar</button>
                                              <input id="send" type="submit" class="btn btn-success" value="Salvar Cadastro"/>
                                              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>!-->
                                            </div>
                                          </div>
                                        </li>
                                        <?php
                                        form_close();
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
