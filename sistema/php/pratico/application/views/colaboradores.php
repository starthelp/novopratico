<?php
$this->load->view('header');
?>

<!-- janela modal para o cadastro de dependentes !-->
<div class="modal fade bs-example-modal-lg-dependente" id="modal_deletar_colaborador">
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
        <button type="button" class="btn btn-danger" id="btn_excluir_colaborador">Sim. Excluir</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- page content -->
<div class="right_col" role="main">
  <?php
  if(isset($mensagens)) {
    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>".$mensagens."</div>";
  }
  ?>
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
              $queryColaboradores = $this->db->query("SELECT * from colaboradores");
              ?>
              <div class="x_panel">
                <h4> Foram encontrados:
                  <?php
                  echo $queryColaboradores->num_rows();
                  ?>
                  registro(s)
                </h4>
                <div class="x_content">
                  <?php
                  if ($queryColaboradores->num_rows() > 0):
                    ?>
                    <!-- lista todos os registros -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%; text-transform: uppercase;">Nome do Colaborador</th>
                          <th style="text-transform: uppercase;">Cpf</th>
                          <th style="width: 20%; text-transform: uppercase;">Data de Nascimento</th>
                          <th style="text-transform: uppercase;">Sexo</th>
                          <th style="text-transform: uppercase;">País</th>
                          <th style="width: 20%; text-transform: uppercase;">Cidade</th>
                          <th style="text-transform: uppercase;">Estado</th>
                          <th style="text-transform: uppercase; ">CTPS</th>
                          <th style="width: 20%; text-transform: uppercase;">Opções do Cadastro</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($cadastroColaborador as $colaborador):
                          ?>
                          <tr>
                            <td>
                              <?= $colaborador->nome; ?>
                            </td>
                            <td>
                              <?= $colaborador->cpf; ?>
                            </td>
                            <td>
                              <?= $colaborador->nascimento; ?>
                            </td>
                            <td>
                              <?= $colaborador->sexo; ?>
                            </td>
                            <td>
                              <?= $colaborador->idpaisnascimento; ?>
                            </td>
                            <td>
                              <?= $colaborador->cidade; ?>
                            </td>
                            <td>
                              <?= $colaborador->idestado; ?>
                            </td>
                            <td>
                              <?= $colaborador->ctps; ?>
                            </td>
                            <td>
                              <a href="<?=base_url("Colaborador/ColaboradorEditar/".$colaborador->cpf); ?>" title="Editar Colaborador" class="btn btn-info btn-xs confirm_editar_colaborador"><i class="fa fa-pencil"></i> Editar </a>
                              <a href="#" title="Remover Colaborador" data-cpf="<?= $colaborador->cpf; ?>" data-nome="<?= $colaborador->nome; ?>" class="btn btn-danger btn-xs confirm_exclusao_colaborador"><i class="fa fa-trash-o"></i> Deletar </a>
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
              <div class="x_panel">

                <div class="x_content">
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formColaborador', 'id' => 'formColaborador', 'novalidate' => 'novalidade');
                  echo form_open('Colaborador/ColaboradorStore',$atributos);
                  ?>
                  <!-- Smart Wizard -->
                  <div id="wizard" class="form_wizard wizard_horizontal">
                    <span class="section">Cadastro de Colaboradores</span>
                    <ul class="wizard_steps anchor">
                      <li>
                        <a href="#step-1" class="selected" isdone="1" rel="1">
                          <span class="step_no">1</span>
                          <span class="step_descr">
                            Perfil<br />
                            <small>Informações básicas do perfil</small>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-2" class="disabled" isdone="0" rel="2">
                          <span class="step_no">2</span>
                          <span class="step_descr">
                            Endereço<br />
                            <small>Informações básicas do endereço</small>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-3" class="disabled" isdone="0" rel="3">
                          <span class="step_no">3</span>
                          <span class="step_descr">
                            País<br />
                            <small>Informações básicas do país</small>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-4" class="disabled" isdone="0" rel="4">
                          <span class="step_no">4</span>
                          <span class="step_descr">
                            Dados Trabalhistas <br />
                            <small>Informações da carteira de trabalho</small>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#step-5" class="disabled" isdone="0" rel="5">
                          <span class="step_no">5</span>
                          <span class="step_descr">
                            Dados do Contrato <br />
                            <small>Informações do contrato de trabalho</small>
                          </span>
                        </a>
                      </li>
                    </ul>

                    <div id="step-1">
                      <div class="form-horizontal form-label-left">

                        <ul class="cadastro-indentado">
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome Completo <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o seu nome completo" maxlength="60" id="nomeColaborador" name="nomeColaborador" required="required" class="form-control has-feedback-left" autofocus="true"/>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true" style="line-height: 1.3em;"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">CPF <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" id="cpfColaborador" name="cpfColaborador" maxlength="11" required="required" placeholder="Digite somente números" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento <span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input id="datanascColaborador" name="datanascColaborador" class="form-control has-feedback-left" placeholder="Formato: dd/mm/YYYY" type="text" name="middle-name"/>
                                <span class="fa fa-calendar form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="btn-group" data-toggle="buttons" style="margin-bottom: 4px;">
                                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="generoColaborador" value="M"> &nbsp; Masculino &nbsp;
                                  </label>
                                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="generoColaborador" value="F"> Feminino
                                  </label>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="estadoCivilColaborador" name="estadoCivilColaborador" class="form-control" required="true">
                                  <?= $options_estado_civil;  ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="emailColaborador" name="emailColaborador" maxlength="100" class="form-control has-feedback-left" placeholder="Formato: seuemail@example.com" type="text" />
                                <span class="fa fa-at form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input id="telefoneColaborador" name="telefoneColaborador" maxlength="12" class="form-control has-feedback-left" placeholder="Formato: (000) 0000-0000" type="text" />
                                <span class="fa fa-building-o form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Celular <span class="required"></span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input id="celularColaborador" name="celularColaborador" maxlength="13" class="form-control has-feedback-left" placeholder="Formato: (000) 0000-0000" type="text" />
                                <span class="fa fa-building-o form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Raça <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="racaColaborador" name="racaColaborador" class="form-control" required="true">
                                  <?=
                                  $options_racacor;
                                  ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Escolaridade / Grau Instrução <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="escolaridadeColaborador" name="escolaridadeColaborador" class="form-control" required="true">
                                  <?= $options_escolaridade; ?>
                                </select>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- parte 2 !-->
                    <div id="step-2" class="content" style="display: none;">
                      <div class='form-horizontal form-label-left'>
                        <ul class="cadastro-indentado" style="margin-top: 40px;">
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o endereço completo" id="logradouroColaborador" maxlength="10" name="logradouroColaborador" required="required" class="form-control col-md-7 col-xs-12" autofocus="true"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Logradouro <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="tipoLogradouro" name="tipoLogradouro" class="form-control" required="true">
                                  <?= $options_tipo_logradouro;  ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Número da Residência <span class="required">*</span></label>
                              <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text"  id="numeroLogradouro" name="numeroLogradouro" maxlength="10" required="required" class="form-control col-md-7 col-xs-12" />
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cep <span class="required">*</span></label>
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite Somente Números" id="cepColaborador" name="cepColaborador" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Complemento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o complemento" maxlength="60" id="complementoColaborador" name="complementoColaborador" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro <span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o seu bairro" id="bairroColaborador" maxlength="60" name="bairroColaborador" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">UF de Residência <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="estadoColaborador" name="estadoColaborador" class="form-control" required="true" onchange="busca_cidades($(this).val());">
                                  <?= $options_estados;  ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cidadeColaborador" name="cidadeColaborador" class="form-control" required="true">
                                </select>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div id="step-3">
                      <!--  <h2 class="StepTitle">Step 3 Content</h2>!-->
                      <div class="form-horizontal form-label-left">
                        <ul class="cadastro-indentado" style="margin-top: 139px;">
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nacionalidade <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="paisNascColaborador" name="paisNascColaborador" class="form-control" required="true">
                                  <?= $options_nacionalidade; ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nascimento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="paisNasColaborador" name="paisNasColaborador" class="form-control" required="true">
                                  <?=  $options_pais_nascimento; ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">UF de Nascimento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="estadoNascimentoColaborador" name="estadoNascimentoColaborador" class="form-control" required="true" onchange="busca_cidades_nacionalidade($(this).val());">
                                  <?= $options_estados; ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade de Nascimento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cidadeNascimentoColaborador" name="cidadeNascimentoColaborador" class="form-control" required="true">
                                </select>
                              </div>
                            </div>
                          </li>

                        </ul>
                      </div>
                    </div>
                    <div id="step-4">
                      <!--<h2 class="StepTitle">Step 4 Content</h2>!-->
                      <div class='form-horizontal form-label-left'>
                        <ul class="cadastro-indentado" style="margin-top: 130px;">
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número da carteira de trabalho <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o número da CTPS: 7 números" maxlength="7" id="numeroCarteira" name="numeroCarteira" required="required" class="form-control" autofocus="true"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número de série CTPS <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Série da CTPS: 6 números " maxlength="6" id="serieCarteira" name="serieCarteira" required="required" class="form-control"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">UF Expedição da CTPS <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="expedicaoCarteira" name="expedicaoCarteira" class="form-control" required="true">
                                  <?=  $options_estados; ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número do NIS <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Número NIS da CTPS: 11 números" id="numeroNis" maxlength="11" name="numeroNis" required="required" class="form-control"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número do PIS <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Número PIS da CTPS: 14 números" maxlength="14" id="numeroPis" name="numeroPis" required="required" class="form-control"/>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div id="step-5">
                      <div class='form-horizontal form-label-left'>
                        <ul class="cadastro-indentado" style="margin-top: 40px;">
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de contrato de trabalho <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="tipoContrato" name="tipoContrato" class="form-control" required="true">
                                  <?= $options_tipo_contrato;   ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Selecione o cargo pretendido <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cargoPretendido" name="cargoPretendido" class="form-control" required="true">
                                  <?=  $options_categoria_trabalhador; ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group" style="margin: 0;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Primeiro Emprego? <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="btn-group" data-toggle="buttons" style="margin-bottom: 4px;">
                                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" id="primeiroEmprego" name="primeiroEmprego" value="S"> &nbsp; Sim &nbsp;
                                  </label>
                                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" id="primeiroemprego" name="primeiroEmprego" value="N"> Não
                                  </label>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Salário Base <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Exemplo: R$ 0.00" id="salarioBase" name="salarioBase" required="required" class="form-control"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Peridiocidade de Salário <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="peridiocidadeColaborador" name="peridiocidadeColaborador" class="form-control" required="true">
                                  <?= $options_peridiocidade;   ?>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Local de Trabalho <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite a rua e a Empresa" id="localtrabalho" name="localtrabalho" required="required" class="form-control"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número da Rua <span class="required">*</span>
                              </label>
                              <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="numerolocaltrabalho" name="numerolocaltrabalho" required="required" class="form-control"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data de Admissão <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Formato: dd/mm/YYYY" id="dataAdmissao" name="dataAdmissao" required="required" class="form-control has-feedback-left"/>
                                <span class="fa fa-calendar form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div><!-- fim da ul do form !-->
                    </div><!-- fima da step 5 !-->

                    <!-- End SmartWizard Content -->
                  </div>
                </div><!-- end wizard !-->
                <?php
                // form close
                form_close();
                ?>
              </div>
            </div>
          </div>
        </div>
      </div><!-- dinal da classe X-Content !-->
    </div>
  </div>
</div>
<!-- /page content -->
<?php
$this->load->view('footer');
?>
