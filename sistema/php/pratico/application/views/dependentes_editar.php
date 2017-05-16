<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
<div class="right_col" role="main" style="min-height: 3823px;">
  <?php
  if(isset($mensagens))
  {
    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>".$mensagens."</div>";
  }
  ?>
  <div style="text-align: right;">
    <a href="<?php echo base_url('dependentes');  ?>" title="Voltar para a tela de dependentes" class="btn btn-dark">Voltar para Dependentes</a>
  </div>
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar Dependente</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
              <ul class="cadastro-indentado">
                <form method="post" action="Dependente/DependenteAtualizar" name="formEditarDependente" id="formEditarDependente">
                <input type="hidden" name="idDependene" id="idDependente" value="<?= $dependentes[0]->id;   ?>">
                <span class="section">Nome do Dependente: <?= $dependentes[0]->nome; ?></span>
                <li>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomeDependente">Escolha o colaborador<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    
                      <select name="colaboradorDependente" id="colaboradorDependente" class="form-control" required="required" style="text-transform: uppercase;">
                        <option value="" selected>teste</option>
                        <?= $options_colaboradores; ?>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomeDependente">Nome do Dependete<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="nomeDependente" name="nomeDependente" placeholder="Digite o nome do dependente" class="form-control has-feedback-left" data-validate-length-range="6" data-validate-words="2" value="<?= $dependentes[0]->nome; ?>" type="text" readonly="true"/>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true" style="padding-top: 2px !important;"></span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpfDependente">CPF <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                      <input type="text" id="cpfDependente" name="cpfDependente" required="required" placeholder="Somente números" value="<?= $dependentes[0]->cpf; ?>" class="form-control col-md-7 col-xs-12"/>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nascimentoDependente">Data de Nascimento <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                      <input type="text" id="dataNascDependente" name="dataNascDependente" required="required" placeholder="Formato: dd/mm/YYYY" data-inputmask="'mask': '99/99/9999'" value="<?=  date('d/m/Y',strtotime($dependentes[0]->nascimento)); ?>" class="form-control has-feedback-left"/>
                      <span class="fa fa-calendar form-control-feedback left" aria-hidden="true" style="padding-top: 2px !important;"></span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iffrDependente">Recibo Imposto de Renda <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                      <input type="text" id="irrfDependente" name="irrfDependente" required="required" placeholder="Recibo de imposto de renda" value="<?= $dependentes[0]->deducaoirrf; ?>" class="form-control col-md-7 col-xs-12"/>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="salfamiliaDependente">Salário Família <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                      <input type="text" class="form-control has-feedback-left" id="salfamiliaDependente" name="salfamiliaDependente"  onkeydown="FormataValor(this,28,event,2,'.',',');" required="required" placeholder="Formato: R$ 0.00" value="<?= $dependentes[0]->salfamilia; ?>"/>
                      <span class="fa fa-tag form-control-feedback left" aria-hidden="true" style="padding-top: 2px !important;"></span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                      <input type="reset" class="btn btn-primary" value="Limpar Formulário"/>
                      <input id="send" type="submit" class="btn btn-success" value="Salvar Cadastro"/>
                    </div>
                  </div>
                </li>
              </form>
              </ul><!-- fima da ul !-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  $this->load->view('footer');
  ?>
