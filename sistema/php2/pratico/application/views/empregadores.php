<?php
$this->load->view('header');
?>
<?php
// pegar a session do usuário Logado no sistema !-->
$userLogado = $this->session->userdata("usuario_logado");
$queryEmpregadores = $this->db->query("SELECT * from empregadores WHERE id = '$userLogado[id]'");
$rowEmpregadores = $queryEmpregadores->row();
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
          <input type="hidden" name="idsenhaAtualizar" name="idsenhaAtualizar" value="<?php echo $rowEmpregadores->id; ?>" />
          <p>Formulário de Atualização de senha</p>
          <ul class="cadastro-indentado">
            <li>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha Antiga<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="senhaAntigaEmpregador" name="senhaAntigaEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" autofocus="true" maxlength="10" placeholder="Digite a sua senha antiga"/>
                </div>
              </div>
            </li>
            <li>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nova Senha<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="senhaAtualizarEmpregador" name="senhaAtualizarEmpregador" onkeyup="checarSenha();" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password" autofocus="true" maxlength="10" placeholder="Digite a sua nova senha"/>
                </div>
              </div>
            </li>
            <li>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar Nova Senha<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="confirmSenhaAtualizarEmpregador" name="confirmSenhaAtualizarEmpregador" onkeyup="checarSenha();" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password" maxlength="10" placeholder="Confirme a sua senha"/>
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

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar Informações do Perfil</h3>
      </div>
    </div>
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
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <form id="formEmpregador" name="formEmpregador" method="post" action="<?php echo base_url('Empregador/EmpregadorAtualizar'); ?>">

                    <input type="hidden" name="idEmpregador" id="idEmpregador" value="<?php echo $rowEmpregadores->id; ?>"/>
                    <input type="hidden" name="opcao" id="opcao" value="opcao1" />
                    <ul class="cadastro-indentado">
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nomeEmpregador" name="nomeEmpregador" value="<?php echo $rowEmpregadores->nome; ?>" class="form-control col-md-7 col-xs-12" readonly="true"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-6" for="last-name">CPF
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-6">
                            <input type="text" id="cpfEmpregador" name="cpfEmpregador" required="required" readOnly="true" class="form-control col-md-7 col-xs-6" value="<?php  echo $rowEmpregadores->cpf; ?>"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Data de Nascimento</label>
                          <div class="col-md-4 col-sm-6 col-xs-6">
                            <input id="nascimentoEmpregador" class="form-control col-md-7 col-xs-6" type="text" readOnly="true" name="nascimentoEmpregador" value="<?php echo $rowEmpregadores->nascimento; ?>"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo do Empregador</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="sexoEmpregador" name="sexoEmpregador" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="generoEmpregador" value="male"> &nbsp; Masculino &nbsp;
                              </label>
                              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="generoEmpregador" value="female"> Feminino
                              </label>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Título de Eleitor<span class="required">*</span></label>
                          <div class="col-md-4 col-sm-6 col-xs-6">
                            <input id="tituloEmpregador" class="form-control col-md-7 col-xs-6" type="text" name="tituloEmpregador" placeholder="Número do Título de Eleitor" value="<?php echo $rowEmpregadores->tituloeleitor; ?>"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-6">Recibo Imposto / Renda<span class="required">*</span></label>
                          <div class="col-md-4 col-sm-6 col-xs-6">
                            <input id="irrfEmpregador" class="form-control col-md-7 col-xs-6" type="text" name="irrfEmpregador" placeholder="Número de declaração de Imposto de Renda" value="<?php echo $rowEmpregadores->irrfrecibo;  ?>"/>
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
                  </form>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <form id="formEmpregador" method="post" name="formEmpregador" action="<?php echo base_url('Empregador/EmpregadorAtualizar'); ?>">
                    <input type="hidden" name="idEmpregador" id="idEmpregador" value="<?php echo $rowEmpregadores->id; ?>"/>
                    <input type="hidden" name="opcao" id="opcao" value="opcao2" />
                    <ul class="cadastro-indentado">
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP<span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input id="cepEmpregador" name="cepEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php $rowEmpregadores->cep;  ?>" type="text" placeholder="Digite o CEP"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro<span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input id="logradouroEmpregador" name="logradouroEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php echo $rowEmpregadores->logradouro;   ?>" type="text" placeholder="Digite o logradouro"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Complemento<span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input id="complementoEmpregador" name="complementoEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php echo $rowEmpregadores->complemento;  ?>" type="text" placeholder="Digite o complemento"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro<span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input id="bairroEmpregador" name="bairroEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required" value="<?php $rowEmpregadores->bairro; ?>" type="text" placeholder="Digite o seu bairro"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Município<span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <select id="municipioEmpregador" name="municipioEmpregador" class="form-control">
                              <option>Selecione...</option>
                              <option value="1">Teste</option>
                              <select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado da Federação<span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input id="ufEmpregador" name="ufEmpregador" class="date-picker form-control col-md-7 col-xs-12" required="required"  value="<?php $rowEmpregadores->uf; ?>" type="text" placeholder="Digite Unidade da Federação"/>
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
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                      <ul class="cadastro-indentado">
                        <li>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="date-picker form-control col-md-7 col-xs-12" name="emailEmpregador" id="emailEmpregador" value="<?php echo $rowEmpregadores->email; ?>" required="required" readOnly="true" type="text" disabled="true" />
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                              <input class="date-picker form-control col-md-7 col-xs-12" name="senhaEmpregador" id="senhaEmpregador" value="<?php echo $rowEmpregadores->senha;  ?>" required="required" readOnly="true" type="password" disabled="true" />
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                          <div class="form-group">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                              <a id="atualizarAcesso" href="#" data-id="<?=  $rowEmpregadores->id; ?>" data-nome="<?= $rowEmpregadores->nome; ?>" name="atualizarAcesso" class="btn btn-success confirm_atualizar_senha">Atualizar Senha</a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div><!-- div class x-content !-->
            </div>
          </div>
        </div><!-- div class row !-->
      </div>
    </div>

    <?php
    $this->load->view('footer');
    ?>
