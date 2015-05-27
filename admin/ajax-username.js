// ajax.js - verifica se o utilizador já existe com recurso a ajax, em tempo real

var http = getHTTPObject();

// Tentar obter um objeto ActiveXObject
function getHTTPObject() { 
	http_request = false;
	if (window.XMLHttpRequest) { // Mozilla, Safari,...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			http_request.overrideMimeType('text/xml');
		}
	} else if (window.ActiveXObject) { // IE
		try {
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	if (!http_request) {
		alert('Erro ao criar uma instância XMLHTTP');
		return false;
	} else{
	return http_request;
  }	
}

// Verificar se o utilizador já existe na base de dados
function verificaUsernameExiste() {
	if (http) {
		var username = document.getElementById("username").value;
		var url = "username-ajax.php?username="; 
		
		// O mesmo que username-ajax.php?username=diogo
		http.open("GET", url + escape(username), true); 

		// Chamar a função que mostra a resposta na página
		http.onreadystatechange = mostraResposta;
		http.send(null);
	}
}

// Trata a resposta do pedido via GET com resposta em XML
function mostraResposta(){
	if (http.readyState == 4){
		if (http.responseText.indexOf('invalid') == -1){
			var xmlDocument = http.responseXML;
			
			// Obter a resposta (0 = não existe, 1 = existe)
			var username = xmlDocument.getElementsByTagName('existe').item(0).firstChild.data; 
			
			if(username == "1"){
				document.getElementById('div-caixa-erro-username').innerHTML = '<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Já existe alguém com este nome de utilizador</label>';
				document.getElementById("div-username-ajax").className = "form-group has-error";
			}else{
				document.getElementById('div-caixa-erro-username').innerHTML = '<label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nome de utilizador disponível</label>';
				document.getElementById("div-username-ajax").className = "form-group has-success";
			}
		}
	}
}