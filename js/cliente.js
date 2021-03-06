$(document).ready(function() {

	var nombreRegex = /^[a-zA-Z ]+$/;   
    var telefonoRegex = /^\d{7}$|^\d{10}$/;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?).$/;

var optionsValidation = {
    	rules: {
    		names: {
                required: true,
                minlength: 3 ,
                regex: nombreRegex
            },  
            lastname: {
                required: true,
                minlength: 3 ,
                regex: nombreRegex
            },                  
    		email: {
    			required: true,
    			email: true,
    			regex: emailRegex
    		},
    		tlf: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12,
            }
    	}
    }

    $.validator.addMethod(
    	"regex",
    	function(value, element, regexp) {
    		var re = new RegExp(regexp);
    		return this.optional(element) || re.test(value);
    	},
    	"Please check your input."
    	);

   $('#infoCustomer_form').validate(optionsValidation);

   $("#infoCustomer_form").submit(function(event) {
    event.preventDefault();
    console.log("entra al envio form") ;         
        enviado = true;           

        openLoader();                        
        
        if($("#email").val() === "" ||  $("#names").val() === ""){
          Swal.fire(
            "Error",
            "Debe completar todos los campos requeridos (*)",
            "error"
          );
          closeLoader();
          return false;
        }
        //**********************
          $.ajax({
            type: "POST",
            url: "controllers/storeCustomer.php",
            data: $(this).serialize() ,
            dataType: 'json'
          })
          .done(function(result) {                      
            Swal.fire(
              "Ok",
              "La información se almaceno con exito.",
              "success"
              );  
              $('#infoCustomer_form')[0].reset() ;    
          })
          .fail(function(data) {
              closeLoader();
              console.log(data);
              Swal.fire(
                "Error",
                "La data no pudo ser almacenada....",
                "error"
              );
          });
        
           var formFiles = "";        
           var numForm = 0;  
    
  });

   var optionsValidation2 = {
    	rules: {
    		names_e: {
                required: true,
                minlength: 3 ,
                regex: nombreRegex
            },  
            lastname_e: {
                required: true,
                minlength: 3 ,
                regex: nombreRegex
            },                  
    		email_e: {
    			required: true,
    			email: true,
    			regex: emailRegex
    		},
    		tlf_e: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12,
            }
    	}
    }

  $('#infoCustomer_form_edit').validate(optionsValidation2);
  $("#infoCustomer_form_edit").submit(function(event) {
    event.preventDefault();
    console.log("entra al envio form") ;         
        enviado = true;           

        openLoader();                        
        
        if($("#email_e").val() === "" ||  $("#names_e").val() === ""){
          Swal.fire(
            "Error",
            "Debe completar todos los campos requeridos (*)",
            "error"
          );
          closeLoader();
          return false;
        }
        //**********************
          $.ajax({ // Editando cliente 
            type: "POST",
            url: "controllers/storeCustomer.php",
            data: $(this).serialize() ,
            dataType: 'json'
          })
          .done(function(result) {  
          console.log(result);                    
            Swal.fire(
              "Ok",
              "La información se almaceno con exito.",
              "success"
              );  
              $('#infoCustomer_form_edit')[0].reset() ;
              llenar_lista_clientes() ; 
              $("#modal_Edit").modal('hide') ;  
          })
          .fail(function(data) {
              closeLoader();
              console.log(data);
              Swal.fire(
                "Error",
                "La data no pudo ser almacenada....",
                "error"
              );
          });
        
           var formFiles = "";        
           var numForm = 0;  
    
  });

// environment
   $("#nav_nuevo").on('click',function(event) {
		$("#wellcome").hide();
		$("#adm_clientes").hide() ;
		$("#container-customer").show() ;
	});

	$("#cancel").on('click',function(event) {
		$("#wellcome").show();
		$("#adm_clientes").hide() ;
		$("#container-customer").hide() ;
	});

	$("#cancel_edit").on('click',function(event) {		
		$("#modal_Edit").modal('hide') ;		
	});

	$("#nav_adm").on('click',function(event) {
		$("#wellcome").hide();
		$("#container-customer").hide() ;
		$("#adm_clientes").show() ;
		llenar_lista_clientes();
	});

	
	function llenar_lista_clientes() { // dataTable de Clientes ESMG 06-03-2021
	 optionsTable = {
      ajax: {
        method: "POST",
        url: "controllers/getCustomer.php",  
        "dataSrc": ""
      },
      responsive: true,
      language: {
        processing:
          '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No results found..",
        sEmptyTable: "No hay datos disponibles de clientes...",
        sInfo: "Del _START_ al _END_ de _TOTAL_ registros",        
        sInfoPostFix: "",
        sSearch: "Filter:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Loading...",
        oPaginate: {
          sFirst: "First",
          sLast: "Final",
          sNext: "Next",
          sPrevious: "Back"
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente"
        }
      },
      columnDefs: [ //id,nombre, apellidos, telefono, email, direccion,poblacion
        { targets: 0, data: "id",
          width: "5%"
        },              
        { targets: 1, data: "nombre" },
        { targets: 2, data: "apellidos" },        
        { targets: 3, data: "telefono" },
        { targets: 4, data: "email" },
        { targets: 5, data: "poblacion" },
        { targets: 6,
          responsivePriority: 1000,
          render: (data, type, row, meta) => {
            return (
              '<div class="text-center"><a href="#" data-toggle="modal" data-target="#modalFiles" data-id="' +
              row.id + '" class="editCustomer"><i class="fa fa-pencil-square-o fa-2x" ></i></a> '+
              '<a href="#" data-toggle="modal" data-target="#modalFiles" data-id="' +
              row.id + '" class="delCustomer"><i class="fa fa-trash fa-2x "></i></a></div>'
            );
            
          }
        },
         ],
      scrollY: 400,
      pageLength: 10,
      //dom: "lrtip",
      order: [[0, "desc"]],
      bLengthChange: false,
      bInfo: false,
      destroy: true,
  } ;// End DataTable options 
  
  $("#listClientes").DataTable(optionsTable);
  $('#serviceTable').DataTable().draw();

  $(document).on('click', '.editCustomer', (e) => {
    var id_cliente = $(e.currentTarget).attr('data-id');  

    $.ajax({
            type: "POST",
            url: "controllers/getCustomer.php",
            data: {id:id_cliente} ,
            dataType: 'json'
          })
          .done(function(result) {  
          	loadUpdate(result)
            $('#modal_Edit').modal('show'); 
          })
          .fail(function(data) {             
              console.log(data);
              Swal.fire(
                "Error",
                "La data no se pudo recuperar...",
                "error"
              );
          });     
     

  });

  $(document).on('click', '.delCustomer', (e) => { // eliminado  cliente
    var id_cliente = $(e.currentTarget).attr('data-id');    
    
    Swal.fire({
    	title: '¿Seguro de Eliminar el registro?',
    	text: "La operación no se puede revertir",
    	icon: 'warning',
    	showCancelButton: true,
    	confirmButtonColor: '#3085d6',
    	cancelButtonColor: '#d33',
    	confirmButtonText: 'Eliminarlo!'
    }).then((result) => {
    	console.log(result);
    	if (result.value) {

    		$.ajax({
    			type: "POST",
    			url: "controllers/storeCustomer.php",
    			data: {id:id_cliente,task:'delete'} ,
    			dataType: 'json'
    		})
    		.done(function(result) {  

    			Swal.fire(
    			'Deleted!',
    			'El registro se elimino con exito.',
    			'success'
    			) 
    			llenar_lista_clientes() ;
    		})
    		.fail(function(data) {             
    			console.log(data);
    			Swal.fire(
    				"Error",
    				"La data no se pudo recuperar...",
    				"error"
    				);
    		});    

    		
    	}
    });

  });
			
}// end llenar_lista_clientes

 function loadUpdate(data){
 	$("#id").val(data[0].id);
    $("#names_e").val(data[0].nombre);
    $("#lastname_e").val(data[0].apellidos);
    $("#tlf_e").val(data[0].telefono) ;    
    $("#email_e").val(data[0].email) ;
    $("#address_e").val(data[0].direccion) ;
    $("#population_e").val(data[0].poblacion) ;
  } 
   var openLoader = function()
   {
   	$('#loaderContainer').show();
   	console.log('cargando');
   };

   var closeLoader = function()
   {
   	$('#loaderContainer').hide();
   }

}); // end ready