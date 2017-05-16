$(function()
{

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
	// exclusão colaborador
	$('.confirm_exclusao_colaborador').on('click', function(e)
	{
		e.preventDefault();

		var nome = $(this).data('nome');
		var cpf = $(this).data('cpf');

		$('#modal_deletar_colaborador').data('nome', nome);
		$('#modal_deletar_colaborador').data('cpf', cpf);
		$('#modal_deletar_colaborador').modal('show');

	});

	// abrir tela do dependente
	$('#modal_deletar_dependente').on('show.bs-example-modal-lg-dependente', function () {
		var nomeDependente = $(this).data('nome');
		$('#nome_exclusao').text(nomeDependente);
	});

	// abrir tela do colaborador
	$('#modal_deletar_colaborador').on('show.bs-example-modal-lg-colaborador', function () {
		var nomeColaborador = $(this).data('nome');
		$('#nome_exclusao').text(nomeColaborador);
	});

	// botão excluir dependente
	$('#btn_excluir_dependente').click(function(){
		var idDependente = $('#modal_deletar_dependente').data('id');
		document.location.href = "Dependente/DependenteDeletar/"+idDependente;
	});

	// botão excluir colaborador
	$('#btn_excluir_colaborador').click(function(){
		var cpfColaborador = $('#modal_deletar_colaborador').data('cpf');
		document.location.href = "Colaborador/ColaboradorDeletar/"+cpfColaborador;
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
			$('#divCheck').html('<span style="color: yellow;">Campo de senha vazio</span>');
			document.getElementById("btn_atualizar_senha_empregador").disabled = true;

		}
		else if (senha != confirmPassword)
		{
			$('#divCheck').html('<span style="color: red;">As duas senhas digitadas não são iguais</span>');
			document.getElementById("btn_atualizar_senha_empregador").disabled = true;

		}
		else
		{
			$('#divCheck').html('<span style="color: green;">As senha digitadas são iguais</span>');
			document.getElementById("btn_atualizar_senha_empregador").disabled = false;
		}
	}
});
// funçaõ em javascript para trazer as cidades e os estados
var base_url = document.URL.replace('/colaboradores','');
function busca_cidades(idEstados)
{
	$.post(base_url+"/index.php/Colaborador/buscaCidadesEstados", {
		idEstados : idEstados
	}, function(data){
		$('#cidadeColaborador').html(data);
	});
}

// função para buscar o pais da nacionalidade
function busca_cidades_nacionalidade(idEstados)
{
	$.post(base_url+"/index.php/Colaborador/buscaCidadesEstadosNacionalidade", {
		idEstados : idEstados
	}, function(data){
		$('#cidadeNascimentoColaborador').html(data);
	});
}

// variáveis para o foco nos campos dos cadastros. Colaborador

var x = document.getElementById("nomeColaborador").autofocus; 
