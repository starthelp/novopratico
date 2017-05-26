<?php
$this->load->view('header');
?>
<!-- pega o modal para deletar !-->
<div class="modal fade bs-example-modal-lg-empregador" id="modal_deletar_dependente">
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

<!-- pega o modal para atualizar a senha !-->
<div class="modal fade bs-example-modal-lg-empregador" id="modal_atualizar_senha">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Atualizar senha do perfil</h4>
      </div>
      <form action="<?php echo base_url('Empregador/EmpregadorAtualizarSenha'); ?>" method="post" id="formAlteraSenha" name="formAlteraSenha">
        <div class="modal-body" style="overflow: hidden;">
          <input type="hidden" name="idsenhaAtualizar"  value="<?= $empregadores[0]->id; ?>" />
          <p>Formulário de Atualização de senha</p>
          <ul class="cadastro-indentado">
            <li>
              <div class="item form-group">
                <label style="line-height: 2.3em !important;" class="control-label col-md-3 col-sm-3 col-xs-12">Nova Senha<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="senhaAtualizarEmpregador" name="senhaAtualizarEmpregador" onkeyup="checarSenha();" class="form-control has-feedback-left" required="required" type="password"  maxlength="10" placeholder="Digite a sua nova senha" style="text-transform: none !important;"/>
                  <span class="fa fa-key form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                </div>
              </div>
            </li>
            <li>
              <div class="item form-group">
                <label style="line-height: 2.3em !important;" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="confirmSenhaAtualizarEmpregador" name="confirmSenhaAtualizarEmpregador" onkeyup="checarSenha();" class="form-control has-feedback-left" required="required" type="password" maxlength="10" placeholder="Confirme a sua senha" style="text-transform: none !important;"/>
                  <span class="fa fa-key form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div id="divCheck"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
          <input type="submit" disabled="true" class="btn btn-success" id="btn_atualizar_senha_empregador" value="Atualizar Senha" />
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- modal para desativar o colaborador !-->
<div class="modal fade bs-example-modal-lg-empregador" id="modal_desativar_registro_colaborador">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação para Desativar</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente desativar o registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
        <button type="button" class="btn btn-danger" id="btn_desativar_colaborador">Sim. Desativá-lo</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- modal para ativar o colaborador !-->
<div class="modal fade bs-example-modal-lg-empregador" id="modal_ativar_registro_colaborador">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação para Ativar</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente ativar o registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
        <button type="button" class="btn btn-success" id="btn_ativar_colaborador">Sim. Ativar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- fim da modal para ativar o colaborador !-->

<!-- page content -->
<div class="right_col" role="main">
  <?php
  if(isset($mensagens))
  {
    echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>".$mensagens."</div>";
  }
  ?>
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar Informações do Perfil</h3>
      </div>
    </div>
    <?php
    if ($empregadores[0]->tituloeleitor == '' && $empregadores[0]->irrfrecibo == '')
    {
      ?>
      <div class="alert alert-danger alert-dismissible fade in" role="alert" style="color: #fff !important;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Informação não preenchidas!</strong> Preencha o seu <span style="text-transform: uppercase; color: #fff;">Título de Eleitor</span> e o seu <span style="text-transform: uppercase; color: #fff;">Recibo de Imposto de Renda</span> para ter acesso aos outros cadastros.
      </div>
      <?php
    }
    ?>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Dados do Perfil</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Dados Básicos do Perfil</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Dados do Endereço</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Dados de Acesso</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Colaboradores</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formEmpregador', 'id' => 'formEmpregador', 'novalidate' => 'novalidade');
                  echo form_open('Empregador/EmpregadorAtualizar',$atributos);
                  ?>

                  <input type="hidden" name="idEmpregador" id="idEmpregador" value="<?= $empregadores[0]->id; ?>"/>
                  <input type="hidden" name="opcao" id="opcao" value="opcao1" />
                  <ul class="cadastro-indentado" style="margin-top: 30px;">
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nomeEmpregador" autofocus="true" class="form-control has-feedback-left" placeholder="Digite o nome do empregador" name="nomeEmpregador" value="<?= $empregadores[0]->nomeempregador; ?>" class="form-control col-md-7 col-xs-12"/>
                          <span class="fa fa-user form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6" for="last-name">CPF<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                          <input type="text" id="cpfEmpregador" name="cpfEmpregador" required="required" placeholder="Somente números" class="form-control col-md-7 col-xs-6" value="<?= $empregadores[0]->cpf; ?>"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Data de Nascimento<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                          <input id="nascimentoEmpregador" class="form-control col-md-7 col-xs-6" type="text" maxlength="10" data-inputmask="'mask': '99/99/9999'" placeholder="Digite a sua data de nascimento" name="nascimentoEmpregador" value="<?= date('d/m/Y',strtotime($empregadores[0]->nascimentoemp)); ?>"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Telefone<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                          <input id="telefoneEmpregador" class="form-control has-feedback-left"  type="text" name="telefoneEmpregador" placeholder="Formato: (00) 0000-0000" value="<?= $empregadores[0]->telefone;  ?>"/>
                          <span class="fa fa-phone form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Celular</label>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                          <input id="celularEmpregador" class="form-control has-feedback-left" type="text" name="celularEmpregador" placeholder="Formato: (00) 0000-0000" value="<?= $empregadores[0]->celular;  ?>"/>
                          <span class="fa fa-phone form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo do Empregador<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="generoEmpregador" name="generoEmpregador" class="btn-group" data-toggle="buttons">
                            <?php
                            if ($empregadores[0]->sexo == 'M')
                            {

                              ?>
                              <label>
                                <input type="radio" name="generoEmpregador" value="M" checked/> &nbsp; Masculino &nbsp;
                              </label>
                              <label>
                                <input type="radio" name="generoEmpregador" value="F"/> Feminino
                              </label>

                              <?php
                            }
                            else {

                              ?>
                              <label>
                                <input type="radio" name="generoEmpregador" value="M"/> &nbsp; Masculino &nbsp;
                              </label>
                              <label>
                                <input type="radio" name="generoEmpregador" value="F" checked/> Feminino
                              </label>
                              <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Título de Eleitor<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                          <input id="tituloEmpregador" class="form-control col-md-7 col-xs-6" type="text" onkeyup="somenteNumeros(this);"  name="tituloEmpregador" placeholder="Número do Título de Eleitor" value="<?= $empregadores[0]->tituloeleitor; ?>"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Recibo Imposto / Renda<span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-6">
                          <input id="irrfEmpregador" class="form-control col-md-7 col-xs-6" type="text" onkeyup="somenteNumeros(this);" name="irrfEmpregador" placeholder="Número de Imposto / Renda" value="<?= $empregadores[0]->irrfreciboemp; ?>"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <input id="atualizarInfoBasico" name="atualizarInfoBasico" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <?php
                  echo form_close();
                  ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formEmpregadorEndereco', 'id' => 'formEmpregadorEndereco', 'novalidate' => 'novalidade');
                  echo form_open('Empregador/EmpregadorAtualizar',$atributos);
                  ?>
                  <input type="hidden" name="idEmpregador" id="idEmpregador" value="<?= $empregadores[0]->id; ?>"/>
                  <input type="hidden" name="opcao" id="opcao" value="opcao2" />
                  <ul class="cadastro-indentado" style="margin-top: 30px;">
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="cepEmpregador" name="cepEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?= $empregadores[0]->cep;  ?>" type="text" placeholder="Somente números"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="logradouroEmpregador" name="logradouroEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?= $empregadores[0]->logradouro;   ?>" type="text" placeholder="Digite o logradouro"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Logradouro<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="tipoLogradouro" name="tipoLogradouro" class="form-control">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($retornatipoLogradouro as $linha)
                            {

                              if ($empregadores[0]->tipologradouro == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $empregadores[0]->tipologradouro; ?>" selected>  <?= $empregadores[0]->nomelogradouro; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->nomelogradouro; ?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Número do Logradouro<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="numeroLogradouro" name="numeroLogradouro" onkeyup="somenteNumeros(this);" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?= $empregadores[0]->numlogradouro;  ?>" type="text"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Complemento<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="complementoEmpregador" name="complementoEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?= $empregadores[0]->complemento;  ?>" type="text" placeholder="Digite o complemento"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="bairroEmpregador" name="bairroEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?= $empregadores[0]->bairro; ?>" type="text" placeholder="Digite o seu bairro"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="ufEmpregador" name="ufEmpregador" class="form-control" onchange="busca_cidades_empregadores($(this).val());">
                            <option value="">Selecione....</option>
                            <?php
                            foreach ($empregadorUF as $linha)
                            {

                              if ($empregadores[0]->iduf == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $empregadores[0]->iduf; ?>" selected>  <?= $empregadores[0]->nomeestado; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->nomeestado; ?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <a class="btn btn-app" id="btn-editar-cidade-empregador" title="Editar informações da cidade do Empregador">
                          <i class="fa fa-edit"></i> Editar Informações
                        </a>
                      </div>
                    </li>

                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="cidadeEmpregador" name="cidadeEmpregador" class="form-control" style="display: none;">
                          </select>
                          <input type="text" value="<?= $empregadores[0]->nomecidade; ?>" name="mostraCidade" id="mostraCidade" class="form-control" readOnly="true"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <input id="atualizarInfoEndereco" name="atualizarInfoEndereco" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <?php
                  echo form_close();
                  ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <ul class="cadastro-indentado" style="margin-top: 30px;">
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control has-feedback-left" name="emailEmpregador" id="emailEmpregador" value="<?= $empregadores[0]->email; ?>" required="required" readOnly="true" type="text" disabled="true" />
                          <span class="fa fa-at form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input class="form-control has-feedback-left" name="senhaEmpregador" id="senhaEmpregador" value="<?= md5($empregadores[0]->senha);  ?>" required="required" readOnly="true" type="password" disabled="true" />
                          <span class="fa fa-key form-control-feedback left" style="line-height: 1.3em;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <a id="atualizarAcesso" href="#" data-id="<?=  $empregadores[0]->id; ?>" data-nome="<?= $empregadores[0]->nomeempregador; ?>" name="atualizarAcesso" class="btn btn-success confirm_atualizar_senha">Atualizar Senha</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
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
                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th style="text-transform: uppercase;">Nome do Colaborador</th>
                              <th style="text-transform: uppercase;">Cpf</th>
                              <th style="text-transform: uppercase;">Data de Nascimento</th>
                              <th style="text-transform: uppercase;">Sexo</th>
                              <th style="text-transform: uppercase;">Cidade</th>
                              <th style="text-transform: uppercase;">Estado</th>
                              <th style="text-transform: uppercase;">Telefone</th>
                              <th style="text-transform: uppercase;">CTPS</th>
                              <th style="text-transform: uppercase; text-align: center;">Status</th>
                              <th style="text-transform: uppercase; text-align: center;">Opção</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($mostraColaborador as $colaborador):
                              ?>
                              <tr>
                                <td style="text-transform: uppercase;">
                                  <?= $colaborador->nomecolaborador; ?>
                                </td>
                                <td>
                                  <?= $colaborador->cpf; ?>
                                </td>
                                <td>
                                  <?= date('d/m/Y',strtotime($colaborador->nascimentocol)); ?>
                                </td>
                                <td>
                                  <?php
                                  if ($colaborador->sexo == 'M')
                                  {
                                    echo "MASCULINO";
                                  }
                                  else {
                                    echo "FEMININO";
                                  }
                                  ?>
                                </td>

                                <td>
                                  <?= $colaborador->nomecidade; ?>
                                </td>
                                <td>
                                  <?= $colaborador->sigla; ?>
                                </td>
                                <td>
                                  <?= $colaborador->telefone; ?>
                                </td>
                                <td>
                                  <?= $colaborador->ctps; ?>
                                </td>
                                <td style="text-align: center;">
                                  <?php
                                  if ($colaborador ->ativo == 1)
                                  {
                                    ?>
                                    <div class="btn btn-dark btn-xs"><i class="fa fa-circle-o-notch"></i> Ativo </div>
                                    <?php
                                  } else {
                                    ?>
                                    <div class="btn btn-info btn-xs confirm_atualizar_colaborador"><i class="fa fa-exclamation-circle"></i> Não Ativo </div>

                                    <?php
                                  }
                                  ?>
                                </td>
                                <td style="text-align: center;">
                                  <?php
                                  if ($colaborador ->ativo == 1)
                                  {
                                    ?>
                                    <a href="#" data-id="<?= $colaborador->cpf; ?>" title="Desativar Colaborador" class="btn btn-danger btn-xs confirm_desativar_colaborador"><i class="fa fa-ban"></i> Desativar </a>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <a href="#" data-id="<?= $colaborador->cpf; ?>" title="Ativar Colaborador" class="btn btn-success btn-xs confirm_ativar_colaborador"><i class="fa fa-refresh"></i> Ativar </a>

                                    <?php
                                  }
                                  ?>
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
              </div><!-- div class x-content !-->
            </div>
          </div>
        </div><!-- div class row !-->
      </div>
    </div>
  </div>
</div>

<?php
$this->load->view('footer');
?>
