function delCarrto(idCompra)
{
	swal(
		{   
			title: "Eliminar item",   
			text: "Estas seguro que deseas eliminar este item de tu carrito de compras?",   
			type: "info",   
			showCancelButton: true,   
			closeOnConfirm: false,   
			showLoaderOnConfirm: true, 
		},
		function()
		{   
			$.ajax({
			    url: dominio+"php/carrito.php",
			    data: "accion=5&id_compra="+idCompra,
			    type: "POST",
			    dataType: "json",
			    success:function(json)
			    {
			    	if(json.continuar == 1)
			    	{
			    		swal({title:"Item Eliminado",
			    		 text:json.mensje,
			    		 type:"success"},function(){
			    		 	$("#item"+idCompra).fadeOut();
			    		 });
			    	}
			    	else
			    	{
			    		swal({title:"Item no eliminado",
			    		 text:json.mensaje,
			    		 type:"error"},function(){
			    		 	
			    		 });
			    	}
			    },
			    error:function(e) 
			    {
			        swal("Oops...","Parece que ha habido un error interno, intenta de nuevo más tarde","error");
			    }
			});
		});
}