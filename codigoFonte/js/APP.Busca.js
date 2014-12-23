var APP = APP || {};
APP.Busca = {
	setUp: function() {
		this.registrarEventos();
		console.log('Iniciando busca');
	},
	registrarEventos: function() {
		$("#form-receitas").on('submit', function(event){
			event.preventDefault();
			 // var dados = jQuery(this).serialize();
			var id = $("#campo-id").val();
			var dado = { "id": id };

			$.ajax({
				type: "GET",
				url: "receita.php",
				data: dado,
				success: function(data){

					if(data.status === true){
						console.log(data.dados[0].autor);	
					}else{
						console.log("não retornou dado");
					}
					
				}
			})

		})
	},
	escreveDados: function(dados){
		console.log("Resultado: ", dados);
	}
}