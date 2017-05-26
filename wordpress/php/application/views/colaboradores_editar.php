<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header_acesso');
?>
<div class="right_col" role="main" style="min-height: 3823px;">
  <div style="text-align: right;">
    <a href="<?php echo base_url('colaboradores');  ?>" title="Voltar para a tela de colaboradores" class="btn btn-dark">Voltar para Colaboradores</a>
  </div>
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Editar Colaborador: <br />
          <strong><span style="text-transform: capitalize;"><?=  $colaboradores[0]->nomecolaborador; ?></span></strong>
        </h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height: 710px;">
          <div class="x_content" style="height: 300px;">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Informações do Perfil</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Informações do Endereço</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">País</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Dados trabalhistas</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Dados do contrato</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <!-- tab das informações básicas do perfil !-->
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <!-- id do colaborador para informações básicas do perfil O id sempre será o CPF !-->
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formColaboradorEditar', 'id' => 'formColaboradorEditarPerfil', 'novalidate' => 'novalidade');
                  echo form_open('Colaborador/ColaboradorAtualizar',$atributos);
                  ?>
                  <input type="hidden" name="operacao" id="operacao" value="operacao1" />
                  <input type="hidden" name="idColaborador" id="idColaborador" value="<?=$colaboradores[0]->cpf;?>"/>
                  <ul class="cadastro-indentado" style="margin-top: 40px;">
                    <li>
                      <div class="form-group" style="margin: 0;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome Completo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" placeholder="Digite o seu nome completo" id="nomeColaborador" value="<?= $colaboradores[0]->nomecolaborador; ?>" name="nomeColaborador" required="required" class="form-control has-feedback-left" autofocus="true"/>
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
                          <input id="datanascColaborador" name="datanascColaborador" class="form-control has-feedback-left"  data-inputmask="'mask': '99/99/9999'" value="<?=  date('d/m/Y',strtotime($colaboradores[0]->nascimentocol)); ?>" placeholder="Formato: dd/mm/YYYY" type="text" name="middle-name"/>
                          <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group" style="margin: 0;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="generoColaborador" class="btn-group" data-toggle="buttons" style="margin-bottom: 4px;">
                            <?php
                            if ($colaboradores[0]->sexo == 'M')
                            {

                              ?>
                              <label>
                                <input type="radio" name="generoColaborador" value="M" checked="true"/> &nbsp; Masculino &nbsp;
                              </label>
                              <label>
                                <input type="radio" name="generoColaborador" value="F"/> Feminino
                              </label>

                              <?php
                            }
                            else if ($colaboradores[0]->sexo == 'F')
                            {

                              ?>
                              <label>
                                <input type="radio" name="generoColaborador" value="M"/> &nbsp; Masculino &nbsp;
                              </label>
                              <label>
                                <input type="radio" name="generoColaborador" value="F" checked/> Feminino
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estadoCivilColaborador" name="estadoCivilColaborador" class="form-control" required="true">
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($colaboradorEstadoCivil as $linha)
                            {

                              if ($colaboradores[0]->idestadocivil == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idestadocivil; ?>" selected>  <?= $colaboradores[0]->descricaoestcivil; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->descricaoestcivil; ?></option>
                                <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group" style="margin: 0;">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="emailColaborador" name="emailColaborador" value="<?= $colaboradores[0]->email;  ?>" maxlength="100" class="form-control has-feedback-left" placeholder="Formato: seuemail@example.com" type="text" />
                          <span class="fa fa-at form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group" style="margin: 0;">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone <span class="required">*</span></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="telefoneColaborador" name="telefoneColaborador" class="form-control has-feedback-left" value="<?= $colaboradores[0]->telefone; ?>" placeholder="Formato: (000) 0000-0000" type="text" />
                          <span class="fa fa-phone form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group" style="margin: 0;">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Celular <small>+ Dígito 9</small></label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="celularColaborador" name="celularColaborador" class="form-control has-feedback-left" value="<?= $colaboradores[0]->celular;  ?>" placeholder="Formato: (000) 0000-0000" type="text" />
                          <span class="fa fa-phone form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Raça <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="racaColaborador" name="racaColaborador" class="form-control" required="true">
                            <?php
                            foreach ($colaboradorRaca as $linha)
                            {

                              if ($colaboradores[0]->idraca == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idraca; ?>" selected>  <?= $colaboradores[0]->descricaoracacor; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->descricaoracacor; ?></option>
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Escolaridade / Grau Instrução <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="escolaridadeColaborador" name="escolaridadeColaborador" class="form-control" required="true">
                            <?php
                            foreach ($colaboradorEscolaridade as $linha)
                            {

                              if ($colaboradores[0]->idgrauinstrucao == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idgrauinstrucao; ?>" selected>  <?= $colaboradores[0]->descricaograu; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->descricaograu; ?></option>
                                <?php

                              }

                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <?php
                  echo form_close();
                  ?>

                </div><!-- fima da  div tab-panel !-->

                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formColaboradorEditar', 'id' => 'formColaboradorEditarEndereco', 'novalidate' => 'novalidade');
                  echo form_open('Colaborador/ColaboradorAtualizar',$atributos);
                  ?>
                  <input type="hidden" name="operacao" id="operacao" value="operacao2" />
                  <input type='hidden' name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
                  <ul class="cadastro-indentado" style="margin-top: 40px;">
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Logradouro <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="tipoLogradouro" name="tipoLogradouro" class="form-control" required="true">
                            <?php
                            foreach ($colaboradorTipoLogradouro as $linha)
                            {

                              if ($colaboradores[0]->tipologradouro == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->tipologradouro; ?>" selected>  <?= $colaboradores[0]->nomelogradouro; ?> </option>
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Número da Residência <span class="required">*</span></label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="numeroLogradouro" name="numeroLogradouro" maxlength="10" onkeyup="somenteNumeros(this);" value="<?= $colaboradores[0]->numlogradouro; ?>" required="required" class="form-control col-md-7 col-xs-12" />
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">UF de Residência <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estadoColaborador" name="estadoColaborador" class="form-control" required="true" onchange="busca_cidades_colaboradores($(this).val());">
                            <?php
                            foreach ($colaboradorUfResidencia as $linha)
                            {

                              if ($colaboradores[0]->idestado == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idestado; ?>" selected>  <?= $colaboradores[0]->nomestadores; ?> </option>
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
                        <div class="col-md-2">
                          <a class="btn btn-app" id="btn-editar-cidade" title="Editar informações da cidade cadastrada">
                            <i class="fa fa-edit"></i> Editar Informações
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="cidadeColaborador" name="cidadeColaborador" class="form-control" required="true" style="display: none;">
                          </select>
                          <input type="text" readonly="true" name="mostraCidade" id="mostraCidade" class="form-control" value="<?= $colaboradores[0]->nomecidaderes; ?>" />
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <?php
                  echo form_close();
                  ?>
                </div>
                <!-- tab das informações do país !-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formColaboradorEditar', 'id' => 'formColaboradorEditarPais', 'novalidate' => 'novalidade');
                  echo form_open('Colaborador/ColaboradorAtualizar',$atributos);
                  ?>
                  <input type="hidden" name="operacao" id="operacao" value="operacao3" />
                  <input type='hidden' name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
                  <ul class="cadastro-indentado" style="margin-top: 40px;">
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nacionalidade <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="paisNascColaborador" name="paisNascColaborador" class="form-control" required="true">
                            <?php
                            foreach ($colaboradorNacionalidade as $linha)
                            {

                              if ($colaboradores[0]->idpaisnacionalidade == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idpaisnacionalidade; ?>" selected>  <?= $colaboradores[0]->nomepais; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->nomepais; ?></option>
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">País de Nascimento <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="paisNasColaborador" name="paisNasColaborador" class="form-control" required="true">
                            <?php
                            foreach ($colaboradorNascimento as $linha)
                            {

                              if ($colaboradores[0]->idpaisnascimento == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idpaisnascimento; ?>" selected>  <?= $colaboradores[0]->nomepais; ?> </option>
                                <?php
                              }
                              else
                              {
                                ?>
                                <option value="<?= $linha->id; ?>"><?= $linha->nomepais; ?></option>
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
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">UF de Nascimento <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="estadoNascimentoColaborador" name="estadoNascimentoColaborador" class="form-control" required="true" onchange="busca_cidades_nacionalidade_editar($(this).val());">
                            <?php
                            foreach ($colaboradorUfNascimento as $linha)
                            {

                              if ($colaboradores[0]->idufnascimento == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->idufnascimento; ?>" selected>  <?= $colaboradores[0]->nomestadonasc; ?> </option>
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
                        <div class="col-md-2">
                          <a class="btn btn-app" id="btn-editar-cidade-nascimento" title="Editar informações da cidade cadastrada">
                            <i class="fa fa-edit"></i> Editar Informações
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cidade de Nascimento <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="cidadeNascimentoColaborador" name="cidadeNascimentoColaborador" class="form-control" required="true" style="display: none;">
                          </select>
                          <input type="text" value="<?= $colaboradores[0]->nomecidadenasc; ?>" readonly="true" class="form-control" id="mostraCidadeNascimento" name="mostraCidadeNascimento"/>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <?php
                  echo form_close();
                  ?>
                </div>
                <!-- fim da div opções de nacionalidade !-->
                <!-- tab das informações dos dados trabalhistas !-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                  <?php
                  $this->load->helper('form');
                  $atributos = array('name' => 'formColaboradorEditar', 'id' => 'formColaboradorEditarTrabalhista', 'novalidate' => 'novalidade');
                  echo form_open('Colaborador/ColaboradorAtualizar',$atributos);
                  ?>
                  <input type="hidden" name="operacao" id="operacao" value="operacao4" />
                  <input type='hidden' name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf;  ?>">
                  <ul class="cadastro-indentado" style="margin-top: 40px;">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número de série CTPS <span class="required">*</span>
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
                            <?php
                            foreach ($colaboradorUfExpedicaoCTPS as $linha)
                            {

                              if ($colaboradores[0]->ufctps == $linha->id)
                              {
                                ?> <!-- verificar o inner join !-->
                                <option value="<?= $colaboradores[0]->ufctps; ?>" selected>  <?= $colaboradores[0]->nomestadoctps; ?> </option>
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
                      <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <?php
                  echo form_close();
                  ?>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                  <div class='form-horizontal form-label-left'>
                    <?php
                    $this->load->helper('form');
                    $atributos = array('name' => 'formColaboradorEditar', 'id' => 'formColaboradorEditarContrato', 'novalidate' => 'novalidade');
                    echo form_open('Colaborador/ColaboradorAtualizar',$atributos);
                    ?>
                    <input type="hidden" name="operacao" id="operacao" value="operacao5"/>
                    <input type="hidden" name="idColaborador" id="idColaborador" value="<?= $colaboradores[0]->cpf; ?>" />
                    <ul class="cadastro-indentado" style="margin-top: 40px;">
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo de contrato de trabalho <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="tipoContrato" name="tipoContrato" class="form-control" required="true">
                              <?php
                              foreach ($colaboradorTipoContrato as $linha)
                              {

                                if ($colaboradores[0]->idtipocontrato == $linha->id)
                                {
                                  ?> <!-- verificar o inner join !-->
                                  <option value="<?= $colaboradores[0]->idtipocontrato; ?>" selected>  <?= $colaboradores[0]->descricaotipocont; ?> </option>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                  <option value="<?= $linha->id; ?>"><?= $linha->descricaotipocont; ?></option>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Selecione o cargo pretendido <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="cargoPretendido" name="cargoPretendido" class="form-control" required="true">
                              <?php
                              foreach ($colaboradorCargo as $linha)
                              {

                                if ($colaboradores[0]->idtipocargo == $linha->id)
                                {
                                  ?> <!-- verificar o inner join !-->
                                  <option value="<?= $colaboradores[0]->idtipocargo; ?>" selected>  <?= $colaboradores[0]->descricaocattrab; ?> </option>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                  <option value="<?= $linha->id; ?>"><?= $linha->descricaocattrab; ?></option>
                                  <?php
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group" style="margin: 0;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Primeiro Emprego? <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn-group" data-toggle="buttons" style="margin-bottom: 4px;">
                              <?php
                              if ($colaboradores[0]->primeiroemprego == 'S')
                              {
                                ?>
                                <label>
                                  <input type="radio" id="primeiroEmprego" name="primeiroEmprego" value="S" checked/> &nbsp; Sim &nbsp;
                                </label>
                                <label>
                                  <input type="radio" id="primeiroEmprego" checked="false" name="primeiroEmprego" value="N"/> Não
                                </label>
                                <?php
                              }
                              else
                              {
                                ?>
                                <label>
                                  <input type="radio" id="primeiroEmprego" name="primeiroEmprego" value="S"/> &nbsp; Sim &nbsp;
                                </label>
                                <label>
                                  <input type="radio" id="primeiroemprego" checked="true" name="primeiroEmprego" value="N" checked/> Não
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Salário Base <span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Exemplo: R$ 0.00" onkeydown="FormataValor(this,28,event,2,'.',',');" id="salarioBase" value="<?= $colaboradores[0]->salariobase; ?>" name="salarioBase" required="required" class="form-control has-feedback-left"/>
                            <span class="fa fa-money form-control-feedback left" style="line-height: 1.4em;" aria-hidden="true"></span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Peridiocidade de Salário <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="peridiocidadeColaborador" name="peridiocidadeColaborador" class="form-control" required="true">
                              <?php
                              foreach ($colaboradorPeridiocidade as $linha)
                              {

                                if ($colaboradores[0]->idperidiocidade == $linha->id)
                                {
                                  ?> <!-- verificar o inner join !-->
                                  <option value="<?= $colaboradores[0]->idperidiocidade; ?>" selected>  <?= $colaboradores[0]->descricaoper; ?> </option>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                  <option value="<?= $linha->id; ?>"><?= $linha->descricaoper; ?></option>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Local de Trabalho <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Digite a rua e a Empresa" id="localtrabalho" value="<?= $colaboradores[0]->localtrabalho; ?>" name="localtrabalho" required="required" class="form-control"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Número da Rua <span class="required">*</span>
                          </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                            <input type="text" id="numerolocaltrabalho" name="numerolocaltrabalho" value="<?= $colaboradores[0]->numerolocaltrabalho; ?>" onkeyup="somenteNumeros(this);" required="required" class="form-control"/>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Data de Admissão <span class="required">*</span>
                          </label>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Formato: dd/mm/YYYY" value="<?= date('d/m/Y',strtotime($colaboradores[0]->dataadmissao)); ?>" data-inputmask="'mask': '99/99/9999'" id="dataAdmissao" name="dataAdmissao" required="required" class="form-control has-feedback-left"/>
                            <span class="fa fa-calendar form-control-feedback left" tyle="line-height: 1.3em; padding-top: 2px;" aria-hidden="true"></span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="ln_solid" style="margin-top: 8px !important; margin-bottom: 14px !important;"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <input id="atualizarCadastro" type="submit" class="btn btn-success" value="Atualizar Cadastro"/>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <?php
                    echo form_close();
                    ?>
                  </div>

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
