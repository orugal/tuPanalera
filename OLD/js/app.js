var home = angular.module("TCS",[]);

//creamos nuestra factoría
home.factory('logica', function(){
    
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
		}
	}
	return funciones;

});