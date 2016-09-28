home.controller('principal', function($scope,$http,$q,logica){
	$scope.fecha    = new Date();
	$scope.nombre	= $("#nombre").val();
	$scope.mail		= $("#mail").val();
	$scope.telefono		= $("#telefono").val();
	$scope.asunto	= $("#asunto").val();
	$scope.mensaje	= $("#mensaje").val();
	$scope.divError	= false;
	$scope.msgError	= "";
	$scope.dataUsuario = [];
	$scope.initTCS = function()
	{
		$scope.galeriIntagramHome();
	};
	$scope.enviaFormContacto = function()
	{

		$scope.asunto	= $("#asunto").val();
		//valido campos
		if($scope.nombre == undefined || $scope.nombre == "")
		{
			$scope.divError	= true;
			$scope.msgError	= "Es necesario que escriba su nombre.";
		}
		else if($scope.mail == undefined || $scope.mail == "")
		{
			$scope.divError	= true;
			$scope.msgError	= "Debe escribir su correo electrónico para poder contactarlo.";
		}
		else if($scope.telefono == undefined || $scope.telefono == "")
		{
			$scope.divError	= true;
			$scope.msgError	= "Debe escribir un número telefónico en caso de que no podamos contactarlo via email.";
		}
		else if($scope.telefono != "" && isNaN($scope.telefono))
		{
			$scope.divError	= true;
			$scope.msgError	= "El campo teléfono es un campo numérico.";
		}
		else if($scope.asunto == undefined || $scope.asunto == "")
		{
			$scope.divError	= true;
			$scope.msgError	= "Debe seleccionar el asunto, es importante para nosotros saber lo quedesea contactar de nosotros.";
		}
		else if($scope.mensaje == undefined || $scope.mensaje == "")
		{
			$scope.divError	= true;
			$scope.msgError	= "Escriba una descripción de lo que necesita saber.";
		}
		else
		{
			var ruta 			=  "envio.php";
			var parametros		=  $("#contact-form").serialize();
			$scope.enviaAjax(ruta,parametros,function(json){
				document.location = "http://www.thecupcakesstore.com/gracias#about";
			});
		}
	}
	$scope.enviaAjax = function(ruta,parametros,callback)
	{
		 $.ajax({
            url: ruta,
            data: parametros,
            type: "POST",
            dataType: "json",
            beforeSend:function()
            {
                
            },
            success:function(data)
            {
                callback(data);
            },
            error:function(e) 
            {

            }
        });
	}
	$scope.desactivaError = function()
	{
		$scope.divError	= false;
		$scope.msgError	= "";
	}
	$scope.autenticaIntagram	=	function()
	{
		//f7741553fbda4b5d80f52cd255a16c55
		var access_token = location.hash.split('=')[1];
		if (location.hash) 
		{
		 
		} 
		else 
		{
		    location.href="https://instagram.com/oauth/authorize/?display=touch&client_id=f7741553fbda4b5d80f52cd255a16c55&redirect_uri=http://www.thecupcakesstore.com/&response_type=token";
		}
	}
	$scope.galeriIntagramHome = function()
	{

		$scope.dataUsuario		=	[]
		var salida  = '';
		var infoU 	=	'';
		$.ajax({
		    url: "https://api.instagram.com/v1/users/2680073193/media/recent/?access_token=2680073193.f774155.9081b13d41d24b6289f7e43e9c66c2e8",
		    data: "",
		    type: "GET",
		    dataType: "jsonp",
		    success:function(json)
		    {
		    	$scope.dataUsuario		= json.data;
		    	//alert($scope.dataUsuario);
		    	for(a in json.data)
		    	{
		    		//alert(json.data[a].images.standard_resolution.url);
		    		salida   += '<div class="item"><a href="'+json.data[a].link+'" title="The Cupcakes Store" target="_blank" data-lightbox-gallery="gallery1"><img src="'+json.data[a].images.standard_resolution.url+'" class="img-responsive" alt="img"></a></div>';
		    	}
		    	$("#owl-works").html(salida);
		    	var ancho = $(".ancho").width();
				$(".tmGry").css("height",ancho);
		    	$scope.galeria = json.data;
		    	
		    },
		    error:function(e) {
		        //$("#ERRORES").html(e.statusText + e.status + e.responseText);
		    }
		});
	}


});