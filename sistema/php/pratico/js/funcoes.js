$(function()
{
  // modal para sair do sistema
  $('.confirm_sair_sistema').on('click', function(e)
  {
    e.preventDefault();

    $('#modal_sair_sistema').modal('show');

  });

  // verificar cidade de nascimento
  $("#btn-editar-cidade-nascimento").click(function()
  {
    $("#mostraCidadeNascimento").css("display","none");
    $("#cidadeNascimentoColaborador").css("display","block");
    $("#btn-editar-cidade-nascimento").css("display","none");
  });

  // verificar cidades cadastradas
  $("#btn-editar-cidade").click(function()
  {
    $("#mostraCidade").css("display","none");
    $("#cidadeColaborador").css("display","block");
    $("#btn-editar-cidade").css("display","none");
  });

  // confirmação para desativar o colaborador selecionado
  $('.confirm_desativar_colaborador').on('click', function(e)
  {
    e.preventDefault();
    var idColaborador = $(this).data('id');
    var ativo = 0;

    $('#modal_desativar_registro_colaborador').data('ativo', ativo);
    $('#modal_desativar_registro_colaborador').data('id', idColaborador);
    $('#modal_desativar_registro_colaborador').modal('show');

  });

  //modal para ativar o colaborador no cadastro de empregadores
  $('.confirm_ativar_colaborador').on('click', function(e)
  {
    e.preventDefault();
    var idColaborador = $(this).data('id');
    var ativo = 1;

    $('#modal_ativar_registro_colaborador').data('ativo', ativo);
    $('#modal_ativar_registro_colaborador').data('id', idColaborador);
    $('#modal_ativar_registro_colaborador').modal('show');

  });

  // exclusão dependente
  $('.confirm_exclusao_dependente').on('click', function(e)
  {
    e.preventDefault();

    var nomeDependente = $(this).data('nome');
    var idDependente = $(this).data('id');

    $('#modal_deletar_dependente').data('nome', nomeDependente);
    $('#modal_deletar_dependente').data('id', idDependente);
    $('#modal_deletar_dependente').modal('show');

  });
  // ativar e desativar colaborador
  $('.confirm_atualizar_colaborador').on('click', function(e)
  {
    e.preventDefault();

    var nome = $(this).data('nome');
    var cpf = $(this).data('cpf');
    var ativar = $(this).data('ativo');

    $('#modal_ativar_colaborador').data('nome', nome);
    $('#modal_ativar_colaborador').data('cpf', cpf);
    $('#modal_ativar_colaborador').data('ativo', ativar);
    $('#modal_ativar_colaborador').modal('show');

  });

  // abrir tela do dependente
  $('#modal_deletar_dependente').on('show.bs-example-modal-lg-dependente', function ()
  {
    var nomeDependente = $(this).data('nome');
    $('#nome_exclusao').text(nomeDependente);
  });

  // abrir tela do colaborador
  $('#modal_ativar_colaborador').on('show.bs-example-modal-lg-colaborador', function ()
  {
    var nomeColaborador = $(this).data('nome');
    $('#nome_exclusao').text(nomeColaborador);
  });

  // botão excluir dependente
  $('#btn_excluir_dependente').click(function()
  {
    var idDependente = $('#modal_deletar_dependente').data('id');
    document.location.href = "Dependente/DependenteDeletar/"+idDependente;
  });

  // botão para sair do sistema
  $('#btn_sair').click(function()
  {
    document.location.href = "Login/Logout/";
  });

  // botão ativar, desativar colaboradores empregadores
  $('#btn_desativar_colaborador').click(function()
  {
    var cpfColaborador = $('#modal_desativar_registro_colaborador').data('id');
    document.location.href = "Colaborador/colaboradorDesativar/"+cpfColaborador;
  });

  // botão ativar, desativar colaborador
  $('#btn_ativar_colaborador').click(function()
  {
    var cpfColaborador = $('#modal_ativar_registro_colaborador').data('id');
    document.location.href = "Colaborador/ColaboradorAtivar/"+cpfColaborador;
  });

  // formulário para atualizar a senha do perfil (empregador)
  $('.confirm_atualizar_senha').on('click', function(e)
  {
    e.preventDefault();

    var nomeEmpregador = $(this).data('nome');
    var idEmpregador = $(this).data('id');

    $('#modal_atualizar_senha').data('nome', nomeEmpregador);
    $('#modal_atualizar_senha').data('id', idEmpregador);
    $('#modal_atualizar_senha').modal('show');

  });

  //verifica se as duas senhas são iguais
  $('#senhaAtualizarEmpregador').keyup(checkPasswordMatch);
  $('#confirmSenhaAtualizarEmpregador').keyup(checkPasswordMatch);

  function checkPasswordMatch()
  {
    var senha = $('#senhaAtualizarEmpregador').val();
    var confirmPassword = $('#confirmSenhaAtualizarEmpregador').val();

    if (senha == '' || '' == confirmPassword)
    {
      $('#divCheck').html('<div class="alert alert-warning alert-dismissible fade in">Campo de senha vazio</div>');
      document.getElementById("btn_atualizar_senha_empregador").disabled = true;

    }
    else if (senha != confirmPassword)
    {
      $('#divCheck').html('<div class="alert alert-danger alert-dismissible fade in">As duas senhas digitadas não são iguais</div>');
      document.getElementById("btn_atualizar_senha_empregador").disabled = true;

    }
    else
    {
      $('#divCheck').html('<div class="alert alert-success alert-dismissible fade in">As senha digitadas são iguais</div>');
      document.getElementById("btn_atualizar_senha_empregador").disabled = false;
    }
  }
});
// funçaõ em javascript para trazer as cidades e os estados
var base_url = document.URL.replace('/colaboradores','');
var base_url_empregadores = document.URL.replace('/empregadores','');
var base_url_edita_colaborador = "http://localhost/pratico/sistema/php/pratico"; // ver na hora de instalar o aplicativo online
function busca_cidades_colaboradores(idEstados)
{
  $.post(base_url_edita_colaborador+"/index.php/Colaborador/buscaCidadesEstados", {
    idEstados : idEstados
  }, function(data){
    $('#cidadeColaborador').html(data);
  });
}

function busca_cidades(idEstados)
{
  $.post(base_url+"/index.php/Colaborador/buscaCidadesEstados", {
    idEstados : idEstados
  }, function(data){
    $('#cidadeColaborador').html(data);
  });
}

//função para buscar o pais da nacionliade para editar
function busca_cidades_nacionalidade_editar (idEstados)
{
  $.post(base_url_edita_colaborador+"/index.php/Colaborador/buscaCidadesEstadosNacionalidade", {
    idEstados : idEstados
  }, function(data){
    $('#cidadeNascimentoColaborador').html(data);
  });
}

// função para buscar o pais da nacionalidade
function busca_cidades_nacionalidade (idEstados)
{
  $.post(base_url+"/index.php/Colaborador/buscaCidadesEstadosNacionalidade", {
    idEstados : idEstados
  }, function(data){
    $('#cidadeNascimentoColaborador').html(data);
  });
}


// busca cidades estados dos empregadores
function busca_cidades_empregadores (idEstados)
{
  $.post(base_url_empregadores+"/index.php/Empregador/buscacidadeEmpregador", {
    idEstados : idEstados
  }, function(data){
    $('#cidadeEmpregador').html(data);
  });
}
