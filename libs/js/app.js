var app = angular.module('myApp', []);

app.controller('softwareController', function($scope, $http){
    // more angular JS codes will be here
    $scope.showCreateForm = function(){
	    // clear form
	    
	    $scope.clearForm();
	     
	    // change modal title
	    $('#modal-product-title').text("Nuevo Registro de Software");
	     
	    // hide update product button
	    $('#btn-update-product').hide();
	     
	    // show create product button
	    $('#btn-create-product').show();

	    $("#modal-product-form").openModal();
	    $("#form-nombre").focus();

     
	}

	// clear variable / form values
	$scope.clearForm = function(){

	    $scope.id = "";
	    $scope.nombre = "";
	    $scope.version = "";
	    $scope.documento_de_amparo = "";
	    $scope.numero_licencias = "";
	    $scope.plataforma = "";
	    $scope.clasificacion = "";
	    $scope.observaciones = "";
	}

	// create new product 
	$scope.createProduct = function(){
		var software = {
			'nombre' : $scope.nombre, 
	        'version' : $scope.version, 
	        'documento_de_amparo' : $scope.documento_de_amparo,
	        'numero_licencias' : $scope.numero_licencias,
	        'plataforma' : $scope.plataforma,
	        'clasificacion' : $scope.clasificacion
		};

		for(var a in software){
			//console.log(a+" : "+software[a]);
			if((software[a]==='') || (software[a]==undefined)){
				Materialize.toast("Registro no creado, faltan datos",4000);
				return;
			}
		}

		
	        
	    // fields in key-value pairs
	    $http.post('../methods/create_software.php', {
	            'nombre' : $scope.nombre, 
	            'version' : $scope.version, 
	            'documento_de_amparo' : $scope.documento_de_amparo,
	            'numero_licencias' : $scope.numero_licencias,
	            'plataforma' : $scope.plataforma,
	            'clasificacion' : $scope.clasificacion,
	            'observaciones' : $scope.observaciones


	        }
	    ).success(function (data, status, headers, config) {
	        console.log(data);
	        // tell the user new product was created
	        
	         
	        // close modal
	        $('#modal-product-form').closeModal();
	        Materialize.toast(data, 4000);
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the list
	        $scope.getAll();
	    });
	}

	$scope.getAll = function(){
		
		$http.get("../methods/read_softwares.php").success(function(response){
		
			$scope.softwares = response.records;
		});
	}

	// retrieve record to fill out the form
	$scope.readOne = function(id){
	     console.log(id);
	    // change modal title
	    $('#modal-product-title').text("Editar Registro");
	     
	    // show udpate product button
	    $('#btn-update-product').show();
	     
	    // show create product button
	    $('#btn-create-product').hide();
	     
	    // post id of product to be edited
	    $http.post('../methods/read_one_software.php', {
	        'id' : id 
	    })
	    .success(function(data, status, headers, config){
	         
	        // put the values in form
	        console.log(data)
	        $scope.id = data[0]["id"];
		    $scope.nombre = data[0]["nombre"];
		    $scope.version = data[0]["version"];
		    $scope.documento_de_amparo = data[0]["documento_de_amparo"];
		    $scope.numero_licencias = data[0]["numero_licencias"];
		    $scope.plataforma = data[0]["plataforma"];
		    $scope.clasificacion = data[0]["clasificacion"];
		    $scope.observaciones = data[0]["observaciones"];
	         
	        // show modal
	        $('#modal-product-form').openModal();
	    })
	    .error(function(data, status, headers, config){
	        Materialize.toast('Unable to retrieve record.', 4000);
	    });

	   
	}

	// update product record / save changes
	$scope.updateProduct = function(){
		var software = {
			'nombre' : $scope.nombre, 
	        'version' : $scope.version, 
	        'documento_de_amparo' : $scope.documento_de_amparo,
	        'numero_licencias' : $scope.numero_licencias,
	        'plataforma' : $scope.plataforma,
	        'clasificacion' : $scope.clasificacion
		};

		for(var a in software){
			//console.log(a+" : "+software[a]);
			if((software[a]==='') || (software[a]==undefined)){
				Materialize.toast("Registro no creado, faltan datos",4000);
				return;
			}
		}

	    $http.post('../methods/update_software.php', {
	    	'id' : $scope.id,
	        'nombre' : $scope.nombre, 
	        'version' : $scope.version, 
	        'documento_de_amparo' : $scope.documento_de_amparo,
	        'numero_licencias' : $scope.numero_licencias,
	        'plataforma' : $scope.plataforma,
	        'clasificacion' : $scope.clasificacion,
	        'observaciones' : $scope.observaciones
	    })
	    .success(function (data, status, headers, config){             
	        // tell the user product record was updated
	        Materialize.toast(data, 4000);
	        console.log(data);
	        // close modal
	        $('#modal-product-form').closeModal();
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the product list
	        $scope.getAll();
	    });
	}

	// delete product
	$scope.deleteSoftware = function(id){
		$scope.id = id;
		$("#modal_eliminar_software").openModal();
	     
	}

	$scope.aceptDeleteSoftware = function(){
		$http.post('../methods/delete_software.php', {
	            'id' : $scope.id
	        }).success(function (data, status, headers, config){
	            console.log(data)
		        $('#modal_eliminar_software').closeModal();
		         
		        // clear modal content
		        $scope.clearForm();
		         
		        // refresh the product list
		        $scope.getAll();
		        Materialize.toast(data, 4000);
	        });
	}



})









/**
** modulo para para toda las funcionalides del hardware -------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------

**/

app.controller('hardwareController', function($scope, $http){
    // more angular JS codes will be here
    $scope.showCreateForm = function(){
	    // clear form
	    
	    $scope.clearForm();
	     
	    // change modal title
	    $('#modal-product-title').text("Nuevo Registro de Hardware");
	     
	    // hide update product button
	    $('#btn-update-product').hide();
	     
	    // show create product button
	    $('#btn-create-product').show();

	    $("#modal-product-form").openModal();
	    $("#form-nombre").focus();

     
	}

	// clear variable / form values
	$scope.clearForm = function(){
	    $scope.id = "";
	    $scope.nombre = "";
	    $scope.caracteristicas = "";
	    $scope.modelo = "";
	    $scope.numero_serie = "";
	    $scope.fecha_de_compra = "";
	    $scope.costo = "";
	   //console.log($scope.tipo );
	   
	}

	// create new product 
	$scope.createProduct = function(){
		var is_computadora = $("#filled-in-box").prop('checked');
		
		var hardware = {
			'nombre' : $scope.nombre, 
	        'caracteristicas' : $scope.caracteristicas, 
	        'modelo' : $scope.modelo,
	        'numero_serie' : $scope.numero_serie,
	        'fecha_de_compra' : $scope.fecha_de_compra,
	        'costo' : $scope.costo
		};

		for(var a in hardware){
			if((hardware[a]==='') || (hardware[a]==undefined)){
				Materialize.toast("Falta algun dato",3000);
				return;
			}
		}
		var tipo;
		if(is_computadora){
			tipo = "computadora";
		}else{
			tipo = "no_es_computadora";
		}
		
	    
	    // fields in key-value pairs
	    $http.post('../methods/create_hardware.php', {
	            'nombre' : $scope.nombre, 
	            'caracteristicas' : $scope.caracteristicas, 
	            'modelo' : $scope.modelo,
	            'numero_serie' : $scope.numero_serie,
	            'fecha_de_compra' : $scope.fecha_de_compra,
	            'costo' : $scope.costo,
	            'tipo' : tipo


	        }
	    ).success(function (data, status, headers, config) {
	        console.log(data);
	        // tell the user new product was created
	        

	        // close modal
	        $('#modal-product-form').closeModal();
	        Materialize.toast(data, 4000);
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the list
	        $scope.getAll();
	    });
	}

	$scope.getAll = function(){
		
		$http.get("../methods/read_hardwares.php").success(function(response){
			//console.log(response.records);
			$scope.hardwares = response.records;
		});
	}

	// retrieve record to fill out the form
	$scope.readOne = function(id){
	     console.log(id);
	    // change modal title
	    $('#modal-product-title').text("Editar Registro");
	     
	    // show udpate product button
	    $('#btn-update-product').show();
	     
	    // show create product button
	    $('#btn-create-product').hide();
	     
	    // post id of product to be edited
	    $http.post('../methods/read_one_hardware.php', {
	        'id' : id 
	    })
	    .success(function(data, status, headers, config){
	         
	        // put the values in form
	        console.log(data)
	        
	        
	        $scope.id = data[0]["id"];
		    $scope.nombre = data[0]["nombre"];
		    $scope.caracteristicas = data[0]["caracteristicas"];
		    $scope.modelo = data[0]["modelo"];
		    $scope.numero_serie = data[0]["numero_serie"];
		    $scope.fecha_de_compra = String(data[0]["fecha_de_compra"]);
		    $scope.costo = data[0]["costo"];

		    $("#div-computadora").hide();

	
	         
	        // show modal
	        $('#modal-product-form').openModal();
	    })
	    .error(function(data, status, headers, config){
	        Materialize.toast('Unable to retrieve record.', 4000);
	    });
	}

	// update product record / save changes
	$scope.updateProduct = function(){

		var hardware = {
			'nombre' : $scope.nombre, 
	        'caracteristicas' : $scope.caracteristicas, 
	        'modelo' : $scope.modelo,
	        'numero_serie' : $scope.numero_serie,
	        'fecha_de_compra' : $scope.fecha_de_compra,
	        'costo' : $scope.costo
		};

		for(var a in hardware){
			if((hardware[a]==='') || (hardware[a]==undefined)){
				Materialize.toast("Falta algun dato",3000);
				return;
			}
		}

	    $http.post('../methods/update_hardware.php', {
	    	'id' : $scope.id,
	        'nombre' : $scope.nombre, 
	        'caracteristicas' : $scope.caracteristicas, 
	        'modelo' : $scope.modelo,
	        'numero_serie' : $scope.numero_serie,
	        'fecha_de_compra' : $scope.fecha_de_compra,
	        'costo' : $scope.costo
	    })
	    .success(function (data, status, headers, config){             
	        // tell the user product record was updated
	       
	        console.log(data);
	        // close modal
	        $('#modal-product-form').closeModal();

	         Materialize.toast(data, 4000);
	         
	        // clear modal content
	        $scope.clearForm();
	         
	        // refresh the product list
	        $scope.getAll();
	    });
	}

	// delete product
	$scope.deleteSoftware = function(id){
		$scope.id = id;
		$("#modal_eliminar_hardware").openModal();
	     /*
	    // ask the user if he is sure to delete the record
	    if(confirm("Are you sure?")){
	        // post the id of product to be deleted
	        $http.post('delete_product.php', {
	            'id' : id
	        }).success(function (data, status, headers, config){
	             
	            // tell the user product was deleted
	            Materialize.toast(data, 4000);
	             
	            // refresh the list
	            $scope.getAll();
	        });
	    }*/
	}

	$scope.aceptDeleteSoftware = function(){
		$http.post('../methods/delete_hardware.php', {
	            'id' : $scope.id
	        }).success(function (data, status, headers, config){
	            console.log(data)
		        $('#modal_eliminar_hardware').closeModal();
		         
		        // clear modal content
		        $scope.clearForm();
		         
		        // refresh the product list
		        $scope.getAll();
		        Materialize.toast(data, 4000);
	        });
	}


});












/*
*************************************************************************************************************************
********************************************************************************************************************+
*
* Controlador de el hardware de tipos computadoras  *********************************************************************
*
*****************************************************************************************************************
**************************************************************************************************+**************
*/


app.controller('computadorasController', function($scope, $http){
	// more angular JS codes will be here
	
    $scope.showCreateForm = function(){
	    // clear form
	    
	    
	    $scope.clearForm();
	     
	    // change modal title
	    $('#form-computadora-title').text("Nuevo Registro ");
	    $("#btn-crear-form-computadora").show();
	     $("#btn-actualizar-form-computadora").hide();
	    $("#div_actualizarComputadora").show();
		$("#solo_computadoras").hide();
	   

     
	}

	

	// clear variable / form values
	$scope.clearForm = function(){
	    $scope.id = "";
	    $scope.nombre = "";
	    $scope.caracteristicas = "";
	    $scope.modelo = "";
	    $scope.numero_de_serie = "";
	    $scope.fecha_de_compra = "";
	    $scope.costo = "";
	    $scope.numero_asignado="";
	   //console.log($scope.tipo );
	   
	}

	// create new product 
	$scope.createProduct = function(){
		
		if($scope.computadoraForm.$valid){
			// POST AJAX a create_computadora.php
		    $http.post('../methods/create_computadora.php', {

		            'nombre' : $scope.nombre, 
		            'modelo' : $scope.modelo, 
		            'caracteristicas' : $scope.caracteristicas,
		            'numero_de_serie' : $scope.numero_de_serie,
		            'fecha_de_compra' : $scope.fecha_de_compra,
		            'costo' : $scope.costo,
		            'numero_asignado' : $scope.numero_asignado


		        }
		    ).success(function (data, status, headers, config) {
		        console.log(data);
		        if(data==='1'){
		        	Materialize.toast("Numero de maquina repetido",4000);
		        	$("#form-numero_asignado").focus();
		        }else{
		        	$("#div_actualizarComputadora").hide();
					$("#solo_computadoras").show();
		        	Materialize.toast(data,3000);
		        	$scope.getAll();
		        	
		        	
		        }
		       
		    });
		}
		
	}

	$scope.getAll = function(){
		
		$http.get("../methods/read_computadoras.php").success(function(response){
			console.log(response.records);
			$scope.computadoras = response.records;
		});
	}

	// retrieve record to fill out the form
	$scope.readOne = function(id){
		$("#solo_computadoras").hide();
		$('#form-computadora-title').text("Actualizar Registro .... ");
	    $("#btn-crear-form-computadora").hide();
	     $("#btn-actualizar-form-computadora").show();
	
	    
	    $http.post('../methods/read_one_computadora.php', {
	        'id' : id 
	    })
	    .success(function(data, status, headers, config){
	         
	        // put the values in form
	        console.log(data)
	       

	        
	        
		    	$scope.id = data[0]["id"];
			    $scope.nombre = data[0]["nombre"];
			    $scope.modelo = data[0]["modelo"];
			    $scope.caracteristicas = data[0]["caracteristicas"];
			    $scope.numero_de_serie = data[0]["numero_de_serie"];
			    $scope.fecha_de_compra = String(data[0]["fecha_de_compra"]);
			    $scope.costo = data[0]["costo"];
			    $scope.numero_asignado = data[0]["numero_asignado"];
	    	$("#div_actualizarComputadora").show();
	         
	        

		    

		    

	
	         
	        
	    })
	    .error(function(data, status, headers, config){
	        Materialize.toast('Unable to retrieve record.', 4000);
	    });
	}

	// update product record / save changes
	$scope.updateProduct = function(){

		if($scope.computadoraForm.$valid){
			$http.post('../methods/update_computadora.php', {
		    	'id' : $scope.id,
		        'nombre' : $scope.nombre, 
		        'caracteristicas' : $scope.caracteristicas, 
		        'modelo' : $scope.modelo,
		        'numero_de_serie' : $scope.numero_de_serie,
		        'fecha_de_compra' : $scope.fecha_de_compra,
		        'costo' : $scope.costo,
		        'numero_asignado' : $scope.numero_asignado

		    })
		    .success(function (data, status, headers, config){             
		        // tell the user product record was updated
		      
		        console.log(data);
		        if(data==='1'){
		        	Materialize.toast("Numero de maquina repetido",4000);
		        	$("#form-numero_asignado").focus();
		        }else{
		        	$("#div_actualizarComputadora").hide();
					$("#solo_computadoras").show();
		        	Materialize.toast(data,3000);
		        	$scope.getAll();
		        	
		        	
		        }


		    });
		}

		

	    
	}

	// delete product
	$scope.deleteSoftware = function(id){
		$scope.id = id;
		$("#modal_eliminar_computadora").openModal();
	     /*
	    // ask the user if he is sure to delete the record
	    if(confirm("Are you sure?")){
	        // post the id of product to be deleted
	        $http.post('delete_product.php', {
	            'id' : id
	        }).success(function (data, status, headers, config){
	             
	            // tell the user product was deleted
	            Materialize.toast(data, 4000);
	             
	            // refresh the list
	            $scope.getAll();
	        });
	    }*/
	}

	$scope.aceptDeleteSoftware = function(){
		$http.post('../methods/delete_computadora.php', {
	            'id' : $scope.id
	        }).success(function (data, status, headers, config){
	            console.log(data)
		        $('#modal_eliminar_computadora').closeModal();
		         
		      
		         
		        // refresh the product list
		        $scope.getAll();
		        Materialize.toast(data, 4000);
	        });
	}

	$scope.cancelActualizarComputadora = function(){
		
		$("#div_actualizarComputadora").hide();
		$("#solo_computadoras").show();
		$scope.clearForm();
	}
});

/*
********************************************************************
********************************************************************
********************************************************************
* metodosComputadoraController
*
*********************************************************************
*********************************************************************
*/
/*
app.controller('computadorasEditController', function($scope, $http){
	console.log("aa");
});*/