<?php
$this->load->view('header');
?>
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

            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
              <div class="x_panel">

                <div class="x_content">

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
                            Dados Trabalhistas<br />
                            <small>Informações da carteira de trabalho</small>
                          </span>
                        </a>
                      </li>
                    </ul>
                    <div id="step-1">
                      <div class="form-horizontal form-label-left">

                        <ul class="cadastro-indentado">
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome Completo <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o seu nome completo" id="nomeColaborador" name="nomeColaborador" required="required" class="form-control has-feedback-left" autofocus="true"/>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">CPF <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" id="cpfColaborador" name="cpfColaborador" required="required" placeholder="Formato: 000.000.000-00" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento <span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input id="nascimentoColaborador" name="nascimentoColaborador" class="form-control has-feedback-left" placeholder="Formato: dd/mm/YYYY" type="text" name="middle-name"/>
                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="generoColaborador" class="btn-group" data-toggle="buttons" style="margin-bottom: 4px;">
                                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="genMascColaborador" value="Masculino"> &nbsp; Masculino &nbsp;
                                  </label>
                                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="genFemColaborador" value="Feminino"> Feminino
                                  </label>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="emailColaborador" name="emailColaborador" class="form-control has-feedback-left" placeholder="Formato: seuemail@example.com" type="text" />
                                <span class="fa fa-at form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input id="telefoneColaborador" name="telefoneColaborador" class="form-control has-feedback-left" placeholder="Formato: (000) 0000-0000" type="text" />
                                <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- parte 2 !-->
                    <div id="step-2" class="content" style="display: none;">
                      <div class='form-horizontal form-label-left'>
                        <ul class="cadastro-indentado-i">
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Logradouro <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o endereço completo" id="logradouroColaborador" name="logradouroColaborador" required="required" class="form-control col-md-7 col-xs-12" autofocus="true"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cep <span class="required">*</span></label>
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o seu CEP" id="cepColaborador" name="cepColaborador" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Complemento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o complemento" id="complementoColaborador" name="complementoColaborador" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro <span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o seu bairro" id="bairroColaborador" name="bairroColaborador" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado da Federação <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="estadoColaborador" name="estadoColaborador" class="form-control" required="true">
                                  <option value="">Selecione..</option>
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
                        <ul class="cadastro-indentado-i">
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nacionalidade <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="paisNascColaborador" name="paisNascColaborador" class="form-control" required="true">
                                  <option value="">Selecione..</option>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nascimento <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="paisNascColaborador" name="paisNascColaborador" class="form-control" required="true">
                                  <option value="">Selecione..</option>
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
                        <ul class="cadastro-indentado-i">
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número da carteira de trabalho <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Digite o número da carteira" id="numeroCateira" name="numeroCarteira" required="required" class="form-control col-md-7 col-xs-12" autofocus="true"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número da carteira de trabalho <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Série da carteira de trabalho" id="serieCarteira" name="serieCarteira" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">UF Expedição da carteira <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="expedicaoCarteira" name="expedicaoCarteira" class="form-control" required="true">
                                  <option value="">Selecione o estado..</option>
                                </select>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número do NIS <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Número NIS da carteira" id="numeroNis" name="numeroNis" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número do PIS <span class="required">*</span>
                              </label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" placeholder="Número PIS da carteira" id="numeroPis" name="numeroPis" required="required" class="form-control col-md-7 col-xs-12"/>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                  <!-- End SmartWizard Content -->

                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">


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
