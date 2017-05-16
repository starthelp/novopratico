// formulário de dependetes
$(function ()
{
	$( "#formDependente").validate( {
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
				maxlength: "Digite no máximo 14 caracteres"
			},
			dataNascDependente: {
				required: "O campo Data é obrigatório"
			},
			irrfDependente: {
				required: "Preencha o campo Imposto de Renda",
				minlength: "Digite no mínimo 2 caracteres"
			},
			salfamiliaDependente: "Salário Família é obrigatório",
		}
	});


	$( "#formEditarDependente").validate( {
		rules:
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
			salfamiliaDependente: "required"
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

});
