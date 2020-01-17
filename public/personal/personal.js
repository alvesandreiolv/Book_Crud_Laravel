	
//abaixo são códigos exclusivos para serem rodados na página ver/pesquisar

$(document).ready(function(e) { 
	$('#pesquisarid').click(function(e) {  
		$("#barrapesquisa").attr("placeholder", "Pesquisar por ID");
	});
	$('#pesquisartitulo').click(function(e) {  
		$("#barrapesquisa").attr("placeholder", "Pesquisar por TITULO");
	});
	$('#pesquisarescritor').click(function(e) {  
		$("#barrapesquisa").attr("placeholder", "Pesquisar por ESCRITOR");
	});
	$('#pesquisarstatus').click(function(e) {  
		$("#barrapesquisa").attr("placeholder", "Pesquisar por STATUS");
	});
});