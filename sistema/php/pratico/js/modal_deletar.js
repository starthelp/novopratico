$(function()
{
    $('.confirm_exclusao_dependente').on('click', function(e) 
	{
        e.preventDefault();

		var nome = $(this).data('nome');
        var id = $(this).data('id');

		$('#modal_deletar').data('nome', nome);
		$('#modal_deletar').data('id', id);
		$('#modal_deletar').modal('show');

	});

	$('#modal_deletar').on('show.bs-example-modal-lg', function () {
      var nome = $(this).data('nome');
      $('#nome_exclusao').text(nome);
    });

	$('#btn_excluir').click(function(){
      var id = $('#modal_deletar').data('id');
      document.location.href = "Dependente/DependenteDeletar/"+id;
    });
});