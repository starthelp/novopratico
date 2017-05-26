// formulário de dependetes
$(function ()
{

	// editar configurações do colaboradores
	$("#formColaboradorEditarPerfil").validate({
		rules: {
			nomeColaborador: {
				required: true,
				minlength: 5
			},
			cpfColaborador: {
				required: true,
				maxlength: 14,
				cpf: true
			},
			datanascColaborador: {
				required: true,
				data: true
			},
			estadoCivilColaborador: {
				required: true
			},
			generoColaborador: {
				required: true
			},
			emailColaborador: {
				required: true,
				email: true
			},
			telefoneColaborador: {
				required: true,
				telefone: true
			},
			celularColaborador: {
				celular: true
			},
			racaColaborador: {
				required: true
			},
			escolaridadeColaborador: {
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
				required: "Data de nascimento é obrigatório",
				data: "Digite uma data válida"
			},
			generoColaborador: {
				required: "Gênero é de preenchimento obrigatório"
			},
			estadoCivilColaborador: {
				required: "Selecione o estado civil"
			},
			emailColaborador: {
				required: "Email é de preenchimento obrigatório",
				email: "Digite um email válido"
			},
			telefoneColaborador: {
				required: "Telefone é de preenchimento obrigatório"
			},
			racaColaborador: {
				required: "Selecione a cor de pele (raça)"
			},
			escolaridadeColaborador: {
				required: "Selecione a escolaridade"
			}

		}

	});

	$("#formColaboradorEditarEndereco").validate({
		rules: {
			logradouroColaborador: {
				required: true
			},
			tipoLogradouro: {
				required: true
			},
			numeroLogradouro: {
				required: true
			},
			cepColaborador: {
				cep: true,
				required: true
			},
			complementoColaborador: {
				rquired: true
			},
			bairroColaborador: {
				required: true
			},
			estadoColaborador: {
				required: true
			}
		},
		messages: {
			logradouroColaborador: {
				required: "Logradouro é de preenchimento obrigatório"
			},
			tipoLogradouro: {
				required: "Selecione o tipo de logradouro"
			},
			numeroLogradouro: {
				required: "Selecone o número de logradouro"
			},
			cepColaborador: {
				cep: true,
				required: "Digite o cep do colaborador"
			},
			complementoColaborador: {
				rquired: "Digite o complemento"
			},
			bairroColaborador: {
				required: "Bairro do colaborador é de preenchimento obrigatório"
			},
			estadoColaborador: {
				required: "Estado é de preenchimento obrigatório"
			}
		}
	});

	$("#formColaboradorEditarPais").validate({
		rules: {
			paisNascColaborador: {
				required: true
			},
			paisNasColaborador: {
				required: true
			},
			estadoNascimentoColaborador: {
				required: true
			},
			cidadeNascimentoColaborador: {
				required: true
			}
		},
		messages: {
			paisNascColaborador: {
				required: "Selcione o país de nascimento"
			},
			paisNasColaborador: {
				required: "Selecione o país de nacionalidade"
			},
			estadoNascimentoColaborador: {
				required: "Selecione a UF de nascimento"
			},
			cidadeNascimentoColaborador: {
				required: "Selecione a cidade de nascimento"
			}
		}

	});
	// editar dados trabalhistas
	$("#formColaboradorEditarTrabalhista").validate({
		rules: {
			numeroCarteira: {
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
			},
			numeroPis: {
				numeroPis: true
			}
		},
		messages: {
			numeroCarteira: {
				required: "Número da carteira é de preenchimento obrigatório"
			},
			serieCarteira: {
				required: "Série da carteira é obrigatório"
			},
			expedicaoCarteira: {
				required: "Selecione a UF de expedição da CTPS"
			},
			numeroNis: {
				required: "Digite o número de NIS"
			},
			numeroPis: {
				numeroPis: "Digite o número do PIS"
			}
		}
	});

	$("#formColaboradorEditarContrato").validate({
		rules: {
			tipoContrato: {
				required: true
			},
			cargoPretendido: {
				required: true
			},
			primeiroEmprego: {
				required: true
			},
			salarioBase: {
				required: true
			},
			peridiocidadeColaborador: {
				required: true
			},
			localtrabalho: {
				required: true
			},
			numerolocaltrabalho: {
				required: true
			},
			dataAdmissao: {
				required: true,
				data: true
			}
		},
		messages: {
			tipoContrato: {
				required: "Selecione o tipo de contrato"
			},
			cargoPretendido: {
				required: "Selecione o cargo pretendido"
			},
			primeiroEmprego: {
				required: "Selecione o primeiro emprego"
			},
			salarioBase: {
				required: "Salário base é obrigatório"
			},
			peridiocidadeColaborador: {
				required: "Peridiocidade e´obrigatório"
			},
			localtrabalho: {
				required: "Local de trabalho é obrigatório"
			},
			numerolocaltrabalho: {
				required: "Número do local de trabalho é obrigatório"
			},
			dataAdmissao: {
				required: "Data de Admissão é obrigatório"
			}
		}
	});
	// - fim dos colaboradores

	$("#formDependente").validate( {
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
				maxlength: 14,
				cpf: true
			},
			irrfDependente: {
				required: true,
				minlength: 2
			},
			dataNascDependente: {
				required: true,
				data: true
			},
			salfamiliaDependente: {
				required: true
			}
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
				maxlength: "Digite no máximo 14 caracteres"
			},
			dataNascDependente: {
				required: "O campo Data é obrigatório"
			},
			irrfDependente: {
				required: "Preencha o campo Imposto de Renda",
				minlength: "Digite no mínimo 2 caracteres"
			},
			salfamiliaDependente: {
				required: "Salário Família é obrigatório"
			}

		}
	});
	$("#formEmpregador").validate({
		rules: {
			nascimentoEmpregador: {
				required: true,
				data: true
			},
			cpfEmpregador: {
				required: true,
				maxlength: 14,
				cpf: true
			},
			telefoneEmpregador: {
				required: true,
				telefone: true
			},
			celularEmpregador: {
				celular: true
			},
			generoEmpregador: {
				required: true
			},
			tituloEmpregador: {
				required: true
			},
			irrfEmpregador: {
				required: true
			}
		},
		messages: {
			nascimentoEmpregador: {
				required: "A data é de preenchimento obrigatório"
			},
			cpfEmpregador: {
				rquired: "O cpf é de preenchimento obrigatório",
				maxlength: "Digite no máximo 14 caracteres"
			},
			telefoneEmpregador: {
				required: "O telefone é de preenchimento obrigatório"
			},
			generoEmpregador: {
				required: "Selecione o gênero do empregador"
			},
			tituloEmpregador: {
				required: "O título eleitoral é de preenchimento obrigatório"
			},
			irrfEmpregador: {
				required: "O número do Imposto de Renda é obrigatório"
			}
		}
	});
	$("#formEmpregadorEndereco").validate({
		rules: {
			cepEmpregador: {
				required: true,
				cep: true
			},
			logradouroEmpregador: {
				required: true
			},
			numeroEmpregador: {
				required: true
			},
			complementoEmpregador: {
				required: true
			},
			bairroEmpregador: {
				required: true
			},
			ufEmpregador: {
				required: true
			},
			cidadeEmpregador: {
				required: true
			}
		},
		messages: {
			cepEmpregador: {
				required: "O cep é de preenchimento obrigatório"
			},
			logradouroEmpregador: {
				required: "O logradouro é de preenchimento obrigatório"
			},
			numeroEmpregador: {
				required: "O número do empregador é de preenchimento obrigatório"
			},
			complementoEmpregador: {
				required: "O complemento é obrigatório"
			},
			bairroEmpregador: {
				required: "O bairro é de preenchimento obrigatório"
			},
			ufEmpregador: {
				required: "A UF é de preenchimento obrigatório"
			},
			cidadeEmpregador: {
				required: "A cidade é de preenchimento obrigatório"
			}
		}

	});

	$("#formEditarDependente").validate( {
		rules: {
			cpfDependente: {
				required: true,
				maxlength: 14,
				cpf: true
			},
			irrfDependente: {
				required: true,
				minlength: 2
			},
			dataNascDependente: {
				required: true,
				data: true
			},
			salfamiliaDependente: {
				required: true
			}
		},
		messages: {
			cpfDependente: {
				required: "Cpf é obrigatório",
				maxlength: "Digite no máximo 14 caracteres"
			},
			dataNascDependente: {
				required: "O campo Data é obrigatório"
			},
			irrfDependente: {
				required: "Preencha o campo Imposto de Renda",
				minlength: "Digite no mínimo 2 caracteres"
			},
			salfamiliaDependente: {
				required: "Salário Família é obrigatório"
			}
		}
	});

	// formulário de colaboradores
	$("#formColaborador" ).validate({
		rules: {
			nomeColaborador: {
				required: true,
				minlength: 5
			},
			cpfColaborador: {
				required: true,
				maxlength: 14,
				cpf: true
			},
			datanascColaborador: {
				required: true,
				data: true
			},
			estadoCivilColaborador: {
				required: true
			},
			generoColaborador: {
				required: true
			},
			emailColaborador: {
				required: true,
				email: true
			},
			telefoneColaborador: {
				required: true,
				telefone: true
			},
			celularColaborador: {
				celular: true
			},
			logradouroColaborador: {
				required: true
			},
			tipoLogradouro: {
				required: true
			},
			numeroLogradouro: {
				required: true
			},
			cepColaborador: {
				required: true,
				cep: true
			},
			racaColaborador: {
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
			},
			cidadeColaborador: {
				required: true
			},
			paisNascColaborador: {
				required: true
			},
			paisNasColaborador: {
				required: true
			},
			estadoNascimentoColaborador: {
				required: true
			},
			cidadeNascimentoColaborador: {
				required: true
			},
			numeroCarteira: {
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
			},
			numeroPis: {
				required: true
			},
			tipoContrato: {
				required: true
			},
			cargoPretendido: {
				required: true
			},
			primeiroEmprego: {
				required: true
			},
			salarioBase: {
				required: true
			},
			peridiocidadeColaborador: {
				required: true
			},
			localtrabalho: {
				required: true
			},
			numerolocaltrabalho: {
				required: true
			},
			dataAdmissao: {
				required: true,
				data: true
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
				required: "Data de nascimento é obrigatório",
				data: "Digite uma data válida"
			},
			generoColaborador: {
				required: "Gênero é de preenchimento obrigatório"
			},
			estadoCivilColaborador: {
				required: "Selecione o estado civil"
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
			tipoLogradouro: {
				required : "Selecione o tipo de logradouro"
			},
			numeroLogradouro: {
				required: "Número da residência é obrigatório"
			},
			cepColaborador: {
				required: "O cep é obrigatório"
			},
			racaColaborador: {
				required: "Selecione uma Raça, Etnia"
			},
			complementoColaborador: {
				required: "Complemento é de preenchimento obrigatório"
			},
			bairroColaborador: {
				required: "O bairro é de preenchimento obrigatório"
			},
			estadoColaborador: {
				required: "Selecione um Estado"
			},
			cidadeColaborador: {
				required: "Selecione uma Cidade"
			},
			paisNascColaborador: {
				required: "Selecione o pais de Nacionalidade"
			},
			paisNasColaborador: {
				required: "Selecione o pais de Nascimento"
			},
			estadoNascimentoColaborador: {
				required: "Selecione o estado de nascimento"
			},
			cidadeNascimentoColaborador: {
				required: "Selecione a cidade de nascimento"
			},
			numeroCarteira: {
				required: "Digite o número da CTPS"
			},
			serieCarteira: {
				required: "Digite o número de série da CTPS"
			},
			expedicaoCarteira: {
				required: "Selecione a UF"
			},
			numeroNis: {
				required: "Digite o NIS"
			},
			numeroPis: {
				required: "Digite o PIS"
			},
			tipoContrato: {
				required: "Selecione o tipo de contrato"
			},
			cargoPretendido: {
				required: "Selecione o cargo"
			},
			primeiroEmprego: {
				required: "Marque uma opção"
			},
			salarioBase: {
				required: "Preenchimento obrigatório"
			},
			peridiocidadeColaborador: {
				required: "Selecione um item"
			},
			localtrabalho: {
				required: "Preenchimento obrigatório"
			},
			numerolocaltrabalho: {
				required: "Preenchimento obrigatório"
			},
			dataAdmissao: {
				required: "Data é de Preenchimento obrigatório"
			}
		}
	});

	// função para a validação do CPF
	jQuery.validator.addMethod("cpf", function(value, element) {
		var is_valid = false;

		var regex_cpf_format = /^\d{3}\.?\d{3}\.?\d{3}\-?\d{2}$/;
		var regex_cpf_repeat = /^(0{11}|1{11}|2{11}|3{11}|4{11}|5{11}|6{11}|7{11}|8{11}|9{11})$/;
		if ( regex_cpf_format.test( value ) && !regex_cpf_repeat.test( value.replace(/[^0-9]/, '' ) ) ) {
			is_valid = true;
		}

		if ( is_valid ) {
			var cpf = value.replace( /[^0-9]/g,'');

			var a = [], b = 0, digits = 11;
			for ( i = 0; i < 11; i++ ){
				a[i] = cpf.charAt( i );
				if ( i < 9 ) {
					b += ( a[i] * --digits );
				}
			}

			if ( ( x = b % 11 ) < 2 ) {
				a[9] = 0;
			} else {
				a[9] = 11 - x ;
			}

			b = 0;
			digits = 11;
			for ( y = 0; y < 10; y++ ) {
				b += ( a[y] * digits-- );
			}
			if ( ( x = b % 11 ) < 2)  {
				a[10] = 0;
			} else {
				a[10] = 11 - x;
			}

			if ( ( cpf.charAt( 9 ) != a[9] ) || ( cpf.charAt( 10 ) != a[10] ) )  {
				is_valid = false;
			}
		}
		return this.optional( element ) || is_valid ;

	}, "Informe um número de cpf válido." );

	// método do campo data no formato vãlido
	$.validator.addMethod(
		"data",
		function(value, element) {
			// put your own logic here, this is just a (crappy) example
			return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
		},
		"Digite a data no formato dd/mm/yyyy."
	);

	//Celular já vem com o dígito verificador
	jQuery.validator.addMethod('celular', function (value, element) {
		value = value.replace("(","");
		value = value.replace(")", "");
		value = value.replace("-", "");
		value = value.replace(" ", "").trim();
		if (value == '0000000000') {
			return (this.optional(element) || false);
		} else if (value == '00000000000') {
			return (this.optional(element) || false);
		}
		if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
			return (this.optional(element) || false);
		}
		if (value.length < 10 || value.length > 11) {
			return (this.optional(element) || false);
		}
		if (["6", "7", "8", "9"].indexOf(value.substring(2, 3)) == -1) {
			return (this.optional(element) || false);
		}
		return (this.optional(element) || true);
	}, "Digite o número de celular válido");

	//Telefone fixo
	jQuery.validator.addMethod('telefone', function (value, element) {
		value = value.replace("(", "");
		value = value.replace(")", "");
		value = value.replace("-", "");
		value = value.replace(" ", "").trim();
		if (value == '0000000000') {
			return (this.optional(element) || false);
		} else if (value == '00000000000') {
			return (this.optional(element) || false);
		}
		if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
			return (this.optional(element) || false);
		}
		if (value.length < 10 || value.length > 11) {
			return (this.optional(element) || false);
		}
		if (["1", "2", "3", "4","5"].indexOf(value.substring(2, 3)) == -1) {
			return (this.optional(element) || false);
		}
		return (this.optional(element) || true);
	}, "Informe um número de telefone válido");

	jQuery.validator.addMethod("cep", function(value, element) {
		return this.optional(element) || /^[0-9]{5}[0-9]{3}$/.test(value);
	}, "Por favor, digite um CEP válido");

});

// função que admite somente a entrada de números no campo
function somenteNumeros(num) {
	var er = /[^0-9.]/;
	er.lastIndex = 0;
	var campo = num;
	if (er.test(campo.value)) {
		campo.value = "";
	}
}
