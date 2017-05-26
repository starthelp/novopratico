<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
<div class="right_col" role="main" style="min-height: 3823px;">
  <div style="text-align: right;">
    <a href="<?php echo base_url('colaboradores');  ?>" title="Voltar para a tela de colaboradores" class="btn btn-dark">Voltar para Colaboradores</a>
  </div>
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar Colaborador</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height: 472px;">
          <div class="x_content" style="height: 300px;">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Imformações do Perfil</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Informações do Endereço</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">País</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Dados trabalhistas</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                  <!-- tab das informações básicas do perfil !-->
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <!-- id do colaborador para informações básicas do perfil O id sempre será o CPF !-->
                    <form action="<?php echo base_url('/Colaborador/ColaboradorAtualizar'); ?>" name="formColaboradorEditar" id="formColaboradorEditar" method="post">
                      <input type="hidden" name="operacao" id="operacao" value="operacao1" />
                    <input type="hidden" name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
                    <ul class="cadastro-indentado">
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome Completo <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Digite o seu nome completo" id="nomeColaborador" value="<?= $colaboradores[0]->nome; ?>" name="nomeColaborador" required="required" class="form-control has-feedback-left" autofocus="true"/>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">CPF <span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" id="cpfColaborador" name="cpfColaborador" required="required" value="<?=  $colaboradores[0]->cpf;  ?>" placeholder="Formato: 000.000.000-00" class="form-control col-md-7 col-xs-12"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento <span class="required">*</span></label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input id="datanascColaborador" name="datanascColaborador" class="form-control has-feedback-left"  value="<?= $colaboradores[0]->nascimento;  ?>" placeholder="Formato: dd/mm/YYYY" type="text" name="middle-name"/>
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="generoColaborador" class="btn-group" data-toggle="buttons" style="margin-bottom: 4px;">
                              <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="generoColaborador[]" value="Masculino"> &nbsp; Masculino &nbsp;
                              </label>
                              <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="generoColaborador[]" value="Feminino"> Feminino
                              </label>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input id="telefoneColaborador" name="telefoneColaborador" class="form-control has-feedback-left" value="<?= $colaboradores[0]->telefone; ?>" placeholder="Formato: (000) 0000-0000" type="text" />
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="celularColaborador" name="celularColaborador" class="form-control has-feedback-left" value="<?= $colaboradores[0]->celular;  ?>" placeholder="Formato: (000) 0000-0000" type="text" />
                            <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                          </div>
                        </div>
                      </li>
                      <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <input type="reset" class="btn btn-primary" value="Limpar Formulário"/>
                            <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </form>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <form action="<?php echo base_url('/Colaborador/ColaboradorAtualizar'); ?>" method="post">
                    <input type="hidden" name="operacao" id="operacao" value="operacao2" />
                  <input type='hidden' name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
                  <ul class="cadastro-indentado">
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" placeholder="Digite o endereço completo" id="logradouroColaborador" name="logradouroColaborador" value="<?= $colaboradores[0]->logradouro; ?>" required="required" class="form-control col-md-7 col-xs-12" autofocus="true"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cep <span class="required">*</span></label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="text" placeholder="Digite o seu CEP" id="cepColaborador" name="cepColaborador" required="required" value="<?= $colaboradores[0]->cep; ?>" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Complemento <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" placeholder="Digite o complemento" id="complementoColaborador" name="complementoColaborador" required="required" value="<?= $colaboradores[0]->complemento;  ?>" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" placeholder="Digite o seu bairro" id="bairroColaborador" name="bairroColaborador" required="required" value="<?= $colaboradores[0]->bairro; ?>" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado da Federação <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estadoColaborador" name="estadoColaborador" class="form-control" required="true">
                            <option value="">Selecione..</option>
                            <option value="1" selected>Teste</option>
                          </select>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="cidadeColaborador" name="cidadeColaborador" class="form-control" required="true">
                            <option value="">Selecione..</option>
                            <option value="1" selected>Teste</option>
                          </select>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <input type="reset" class="btn btn-primary" value="Limpar Formulário"/>
                            <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                          </div>
                        </div>
                    </li>
                  </ul>
                </form>

              </div>
              <!-- tab das informações do país !-->
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <form action="<?php echo base_url('/Colaborador/ColaboradorAtualizar'); ?>" method="post">
                  <input type="hidden" name="operacao" id="operacao" value="operacao3" />
                <input type='hidden' name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
                <ul class="cadastro-indentado">
                  <li>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nacionalidade <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="paisNascColaborador" name="paisNascColaborador" class="form-control" required="true">
                          <option value="">Selecione..</option>
                          <option value="1" selected>Teste</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nascimento <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="paisNasColaborador" name="paisNasColaborador" class="form-control" required="true">
                          <option value="">Selecione..</option>
                          <option value="1" selected>Teste</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nascimento <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="paisNasColaborador" name="paisNasColaborador" class="form-control" required="true">
                          <option value="">Selecione..</option>
                          <option value="1" selected>Teste</option>
                        </select>
                      </div>
                    </div>
                  </li>
                  <li>
                  <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                        <input type="reset" class="btn btn-primary" value="Limpar Formulário"/>
                        <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                      </div>
                    </div>
                  </li>
                </ul>
              </form>

            </div>
            <!-- tab das informações dos dados trabalhistas !-->
            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
              <form action="<?php echo base_url('/Colaborador/ColaboradorAtualizar'); ?>" method="post">
                <input type="hidden" name="operacao" id="operacao" value="operacao4" />
              <input type='hidden' name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
              <ul class="cadastro-indentado">
                <li>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número da CTPS<span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <input type="text" placeholder="Digite o número da CTPS" id="numeroCateira" name="numeroCarteira" value="<?= $colaboradores[0]->ctps; ?>" required="required" class="form-control" autofocus="true"/>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número de sérire CTPS <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <input type="text" placeholder="Série da CTPS" id="serieCarteira" name="serieCarteira" value="<?= $colaboradores[0]->seriectps;   ?>" required="required" class="form-control"/>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">UF Expedição da CTPS <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="expedicaoCarteira" name="expedicaoCarteira" class="form-control" required="true">
                        <option value="">Selecione o estado..</option>
                        <option value="1" selected>Teste</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número do NIS <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <input type="text" placeholder="Número NIS da carteira" id="numeroNis" value="<?= $colaboradores[0]->nis; ?>" name="numeroNis" required="required" class="form-control"/>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número do PIS <span class="required">*</span>
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <input type="text" placeholder="Número PIS da carteira" id="numeroPis" value="<?= $colaboradores[0]->pis; ?>" name="numeroPis" required="required" class="form-control"/>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nascimento <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="paisNasColaborador" name="paisNasColaborador" class="form-control" required="true">
                        <option value="">Selecione..</option>
                        <option value="1" selected>Teste</option>
                      </select>
                    </div>
                  </div>
                </li>
                <li>
                <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                      <input type="reset" class="btn btn-primary" value="Limpar Formulário"/>
                      <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                    </div>
                  </div>
                </li>
              </ul>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php
$this->load->view('footer');
?>
