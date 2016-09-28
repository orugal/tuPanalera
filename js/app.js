var home = angular.module("TCS",[]);

//creamos nuestra factoría
home.factory('logica', function(){
    var dataCarrito = [];
	var funciones = 
	{
		consultaApi:function(url,parametros,callback)
		{
			//la variable callback es una funcion que esta creada, esto es para que el ajax responda a esta función y ud haga lo que quiera dentro de ella y no tener que hacer nada dentro del succes del ajax y que esta función quede como standar
			 $.ajax({
		        url: url,
		        data: parametros,
		        type: "POST",
		        dataType: "json",
		        success:function(data)
		        {
		        	callback(data);
		        },
		        error:function(e) {
		            
		        }
		    });
		},
		readCar:function()
        {
            $.ajax({
                url: dominio+"php/carrito.php",
                data: "accion=2",
                type: "POST",
                dataType:"json",
                success:function(json)
                {
                    $("#carritoCont").html(json.datos)
                },
                error:function(e) 
                {
                    //swal("Oops...","Parece que ha habido un error interno, intenta de nuevo más tarde","error");
                }
            });
        }
	}
	return funciones;

});
