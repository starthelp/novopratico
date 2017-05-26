// formulário de dependetes
$(function ()
{
	$( "#formDependente" ).validate( {
		rules: {
			colaboradorDependente: {
				rquired: true
			},
			nomeDependente: {
				required: true,
				minlength: 5
			},
			cpfDependente: {
				required: true,
				maxlength: 11
			},
			irrfDependente: {
				required: true,
				minlength: 2
			},
			dataNascDependente: {
				required: true
			},
			salfamiliaDependente: "required"
		},
		messages: {
			colaboradorDependente: {
				required: "Selecione um colaborador"
			},
			nomeDependente: {
				required: "Preencha o campo Nome do Dependente",
				minlength: "Preencha no mínimo 5 caracteres"
			},
			cpfDependente: {
				required: "Cpf é obrigatório",
				minlength: "Digite no máximo 11 caracteres"
			},
			dataNascDependente: {
				required: "O campo Data é obrigatório"
			},
			irrfDependente: {
				required: "Preencha o campo Imposto de Renda",
				minlength: "Digite no mínimo 2 caracteres",
			},
			salfamiliaDependente: "Salário Família é obrigatório",
		}
	});

	// formulário de colaboradores
/*	$( "#formColaborador" ).validate( {
		rules: {

			nomeColaborador: {
				required: true,
				minlength: 5
			},
			cpfColaborador: {
				required: true,
				maxlength: 11
			},
			datanascColaborador: {
				required: true,
				minlength: 2
			},
			generoColaborador: {
				required: true
			},
			emailColaborador: {
				required: true,
				email: true
			},
			telefoneColaborador: {
				required: true
			},
			logradouroColaborador: {
				required: true
			},
			cepColaborador: {
				required: true
			},
			complementoColaborador: {
				required: true
			},
			bairroColaborador: {
				required: true
			},
			estadoColaborador: {
				required: true
			}
			cidadeColaborador: {
				required: true
			},
			numeroCateira: {
				required: true
			},
			serieCarteira: {
				required: true
			},
			expedicaoCarteira: {
				required: true
			},
			numeroNis: {
				required: true
			}

		},
		messages: {
			nomeColaborador: {
				required: "Preencha o campo Nome do Colaborador",
				minlength: "Preencha no mínimo 5 caracteres"
			},
			cpfColaborador: {
				required: "Cpf é obrigatório",
				minlength: "Digite no máximo 11 caracteres"
			},
			datanascColaborador: {
				required: "Data de nascimento é obrigatório"
			},
			generoColaborador: {
				required: "Gênero é de preenchimento obrigatório"
			},
			emailColaborador: {
				required: "Email é de preenchimento obrigatório",
				email: "Digite um email válido"
			},
			telefoneColaborador: {
				required: "Telefone é de preenchimento obrigatório"
			},
			logradouroColaborador: {
				required: "O logradouro é de preenchimento obrigatório"
			},
			cepColaborador: {
				required: "O cep é de preenchimento obrigatório"
			},
			complementoColaborador: {
				required: "Complemento é de preenchimento obrigatório"
			},
			bairroColaborador: {
				required: "O bairro é de preenchimento obrigatório"
			},
			estadoColaborador: {
				required: "Estado é de preenchimento obrigatório"
			},
			cidadeColaborador: {
				required: "Cidade é de preenchimento obrigatório"
			},
			numeroCateira: {
				required: "Carteira CTPS é obrigatório"
			},
			serieCarteira: {
				required: "Série é de preenchimento obrigatório"
			},
			expedicaoCarteira: {
				required: "Expedição da CTPS é de preenchimento obrigatório"
			},
			numeroNis: {
				required: "Número NIS é de preenchimento obrigatório"
			}

		}*/

//});

});
