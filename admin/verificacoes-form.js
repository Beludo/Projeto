function verificaPasswords(){
	
	// Verifica se as passwords são iguais
	if(document.getElementById('password').value != document.getElementById('password2').value) {
		document.getElementById('div-caixa-erro-password').innerHTML = '<label class="control-label" for="inputError"><i class="fa fa-bell-o"></i> As passwords não são iguais!</label>';
		document.getElementById("div-password-utilizador").className = "form-group has-warning";
	} else {
		document.getElementById('div-caixa-erro-password').innerHTML = '';
		document.getElementById("div-password-utilizador").className = "form-group";
	}
}

// Verificações da password
function forcaPassword() {
    var password = document.getElementById('password').value;
    var temNumeros = /\d/;
    var temMinusculas = /[a-z]/;
    var temMaiusculas = /[A-Z]/;
    var simbolos = ['/', '@', '#', '%', '&', '.', '!', '*', '+', '?', '|','(', ')', '[', ']', '{', '}', '\\'];
    var pontuacao = 1;

	// Verificar a password
    for (var k=0; k < password.length; k++) {
		
		// Atribuir 0.75 pontos a numeros
        var pchar = password.charAt(k);
        if(temNumeros.test(pchar)){
            pontuacao += 0.75;
        }

		// Atribuir 1 ponto a maiusculas
        if(temMaiusculas.test(pchar)){
            pontuacao += 1;
        }

		// Atribuir 0.25 pontos a minusculas
        if(temMinusculas.test(pchar)){
            pontuacao += 0.25;
        }
    }

	// Verificar simbolos especiais
    for (var i=0; i < simbolos.length; i++) {
        if(password.indexOf(simbolos[i]) >= 0) {
            pontuacao += 1;
        }
    }

    // Assumir que uma password com 100% de força tem valor 15
    var maximo = 15;
	
	// Atualizar a barra
	if(password.length > 0) {
		document.getElementById('div-barra-forca-password').style.width = ((Math.min(maximo, pontuacao)/maximo ) * 100) + "%";
	} else {
		document.getElementById('div-barra-forca-password').style.width = "0%";
	}

	// Mostrar uma descrição
    if(pontuacao >= 12) {
        document.getElementById('div-forca-password').innerHTML = "<br>Password forte";
    }
    else if(password.length >= 6) {
        document.getElementById('div-forca-password').innerHTML = "<br>Password média";
    }
    else {
        document.getElementById('div-forca-password').innerHTML = "<br>Password fraca";
    }
}