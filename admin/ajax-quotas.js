// ajax-quotas.js - regista quotas pagas

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
function mostraResposta(idSocio, mes){
	if (http.readyState == 4){
		if (http.responseText.indexOf('invalid') == -1){
			var xmlDocument = http.responseXML;
			
			// Obter a resposta (0 = não paga, 1 = paga)
			var pago = xmlDocument.getElementsByTagName('pago').item(0).firstChild.data; 
			
			if(pago == "1"){
				document.getElementById('div-' + mes + '-' + idSocio).innerHTML = '<label class="control-label" for="inputSuccess">Pago</label>';
			}else{
				document.getElementById('div-caixa-erro-username').innerHTML = '<label class="control-label" for="inputError"><i class="fa fa-check"></i> Não pago</label>';
			}
		}
	}
}