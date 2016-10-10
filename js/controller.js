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
	$scope.dataCarrito	=	[];

	$scope.initTCS = function()
	{
		$scope.galeriIntagramHome();
		logica.readCar();
		$('#intro').parallax("50%", 0.50);
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
				document.location = dominio+"gracias#about";
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

	$scope.cerrarSesion = function()
	{
		swal(
				{   
					title: "Cerrar Sesión",   
					text: "Esta seguro que desea salir del sistema?, recuerde que esto eliminará los pedidos que haya agregado al carrito.",   
					type: "info",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					showLoaderOnConfirm: true, 
				},
				function()
				{   
					document.location = dominio+"logout";
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

	$scope.readCar = function()
	{
		$.ajax({
		    url: dominio+"php/carrito.php",
		    data: "accion=2",
		    type: "POST",
		    dataType: "json",
		    success:function(json)
		    {
		    	$scope.dataCarrito = json.datos;
		    	$scope.$digest();
		    },
		    error:function(e) 
		    {
		        //swal("Oops...","Parece que ha habido un error interno, intenta de nuevo más tarde","error");
		    }
		});
	}
});

home.controller('carritoFunction', function($scope,$http,$q,logica)
{	
	$scope.cantidadcart = parseInt($("#cantidadcart").val());
	$scope.relleno = parseInt($("#relleno").val());
	$scope.nombre		= $("#nombre").val()
	$scope.apellido		= $("#apellido").val()
	$scope.email		= $("#email").val()
	$scope.clave		= $("#clave").val()
	$scope.rclave		= $("#rclave").val()
	$scope.usuario		= $("#usuario").val();
	$scope.lclave		= $("#lclave").val();
	$scope.direccion		=	$("#direccion").val();
	$scope.telefono		=	$("#telefono").val();
	$scope.celular		=	$("#celular").val();
	$scope.carritoIni = function()
	{
		//alert("jojojo" + cantidadVenta);
		/*setTimeout(function(){
			alert($scope.dataCarrito);
		},1000);*/	
		
	}
	$scope.login = function()
	{
		if($scope.usuario == "" || $scope.usuario == undefined)
		{
			swal("Oops...","Debes escribir tu email.","error");
		}
		else if($scope.lclave == "" || $scope.lclave == undefined)
		{
			swal("Oops...","Es necesario que escribas tu contraseña.","error");
		}
		else
		{
			var datos = $("#formLogin").serialize();
			$.ajax({
			    url: dominio+"php/carrito.php",
			    data: "accion=4&"+datos,
			    type: "POST",
			    dataType: "json",
			    success:function(json)
			    {
			    	if(json.continuar == 1)
			    	{
			    		swal({title:"Bienvenido",
			    		 text:json.mensaje,
			    		 type:"success"},function(){
			    		 	document.location = dominio+json.ruta;
			    		 });
			    	}
			    	else
			    	{
			    		swal({title:"Falla de ingreso",
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
		}
	}
	$scope.eliminaDelCarrito = function(idCompra)
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
					    		 	document.location = dominio+"carrito";
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
	$scope.dataFinal = function()
	{
		if($scope.direccion == "" || $scope.direccion == undefined)
		{
			swal("Oops...","Debes escribir una dirección para hacer entrega de tu pedido","error");
		}
		else if($scope.telefono == "" || $scope.telefono == undefined)
		{
			swal("Oops...","Es importante que agregues un teléfono de contacto, por medio de el podemos notificar acerca de su pedido","error");
		}
		else if($scope.telefono != "" && isNaN($scope.telefono))
		{
			swal("Oops...","El teléfono fijo debe ser numérico","error");
		}
		else if($scope.celular == "" || $scope.celular == undefined)
		{
			swal("Oops...","Es importante que agregues un teléfono celular de contacto, por medio de el podemos notificar acerca de su pedido","error");
		}
		else if($scope.celular != "" && isNaN($scope.celular))
		{
			swal("Oops...","El teléfono celular debe ser numérico","error");
		}
		else
		{
			var datos = $("#formData").serialize();
			$.ajax({
			    url: dominio+"php/carrito.php",
			    data: "accion=6&"+datos,
			    type: "POST",
			    dataType: "json",
			    success:function(json)
			    {
			    	if(json.continuar == 1)
			    	{
			    		document.location = dominio+"finalizar-pago";
			    	}
			    	else
			    	{
			    		swal({title:"Error en registro de datos",
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
		}
	}
	$scope.registro = function()
	{
		//valido Campos
		if($scope.nombre == "" || $scope.nombre == undefined)
		{
			swal("Oops...","Es necesario que escribas tu nombre","error");
		}
		else if($scope.apellido == "" || $scope.apellido == undefined)
		{
			swal("Oops...","Es necesario que escribas tu apellido","error");
		}
		else if($scope.email == "" || $scope.email == undefined)
		{
			swal("Oops...","Es necesario que escribas tu email","error");
		}
		else if($scope.clave == "" || $scope.clave == undefined)
		{
			swal("Oops...","Debes escribir una clave de acceso","error");
		}
		else if($scope.rclave == "" || $scope.rclave == undefined)
		{
			swal("Oops...","Debes repetir la clave","error");
		}
		else if($scope.clave !=  $scope.rclave)
		{
			swal("Oops...","Las claves no coinciden","error");
		}
		else
		{
			swal(
				{   
					title: "Registro",   
					text: "Los datos ingresados son correctos?",   
					type: "info",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					showLoaderOnConfirm: true, 
				},
				function()
				{   
					var datos = $("#formRegistro").serialize();
					$.ajax({
					    url: dominio+"php/carrito.php",
					    data: "accion=3&"+datos,
					    type: "POST",
					    dataType: "json",
					    success:function(json)
					    {
					    	if(json.continuar == 1)
					    	{
					    		swal({title:"Registro Exitoso",
					    		 text:json.mensje,
					    		 type:"success"},function(){
					    		 	document.location = dominio+json.ruta;
					    		 });
					    	}
					    	else
					    	{
					    		swal({title:"Registro Fallido",
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
	}
	$scope.reduce = function()
	{
		if($scope.cantidadcart > cantidadVenta)
		{
			$scope.cantidadcart -= parseInt(cantidadVenta);
		}

		if($scope.cantidadcart == cantidadVenta)
		{
			$("#menos").addClass("disabled");	
		}
	}
	$scope.aumenta = function()
	{
		$scope.cantidadcart += parseInt(cantidadVenta);
		if($scope.cantidadcart > cantidadVenta)
		{
			$("#menos").removeClass("disabled");	
		}
	}
	$scope.irPagoSinSession = function()
	{
		 swal({
		 	title:"Iniciar Sesión",
		 	text:"Debes iniciar sesión en nuestra página web, si ya tienes una cuenta deberas loguearte, si aún no tienes una podrás registrarte completamente gratis.",
		 	type:"info"
		 },
		 function(){
		 	document.location = dominio+"acceso";
		 }
		 );
	}
	$scope.addToCar = function()
	{
		var continua = false;
		$scope.relleno = $("#relleno").val();

		if($scope.relleno == "" || $scope.relleno == undefined)
		{
			sweetAlert("Oops...", "Debes seleccionar la presentación", "error");
			continua = false;
		}
		else
		{
			continua = true;
		}

		if(continua)
		{
			swal(
				{   
					title: "Carrito de compras",   
					text: "Esta seguro que desea agregar este producto al carrito?",   
					type: "info",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					showLoaderOnConfirm: true, 
				},
				function()
				{   
					$.ajax({
					    url: dominio+"php/carrito.php",
					    data: "accion=1&idProducto="+idProducto+"&cantidad="+$scope.cantidadcart+"&relleno="+$scope.relleno,
					    type: "POST",
					    dataType: "json",
					    success:function(json)
					    {
					    	swal({title:"Carrito de compras",
					    		 text:"Producto agregado al carrito",
					    		 type:"success"},function(){
					    		 	logica.readCar();
					    		 });
					    },
					    error:function(e) 
					    {
					        swal("Oops...","Parece que ha habido un error interno, intenta de nuevo más tarde","error");
					    }
					});
				});

			
		}
	}
	$scope.realizarPedido = function()
	{
		swal(
				{   
					title: "Confirmación",   
					text: "Está seguro que desea realizar el pedido con los productos mostrados?",   
					type: "info",   
					showCancelButton: true,   
					closeOnConfirm: false,   
					showLoaderOnConfirm: true, 
				},
				function()
				{   
					$.ajax({
					    url: dominio+"php/carrito.php",
					    data: "accion=7",
					    type: "POST",
					    dataType: "json",
					    success:function(json)
					    {
					    	swal({title:"Carrito de compras",
					    		 text:json.mensaje,
					    		 type:"success"},function(){
					    		 	document.location = dominio+"pedidos";
					    		 });
					    },
					    error:function(e) 
					    {
					        swal("Oops...","Parece que ha habido un error interno, intenta de nuevo más tarde","error");
					    }
					});
				});
	}
});