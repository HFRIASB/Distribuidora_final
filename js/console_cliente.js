var t_cliente;
function listar_cliente(){
    t_cliente = $("#tabla_cliente").DataTable({
		"ordering":false,   
        "pageLength":10,
        "destroy":true,
        "async": false ,
        "responsive": true,
    	"autoWidth": false,
      "ajax":{
        "method":"POST",
		"url":"../controlador/cliente/controlador_cliente_listar.php",
      },
      "columns":[
            {"defaultContent":""},
            {"data":"persona"},
            {"data":"persona_nrodocumento"},
            {"data":"persona_tipodocumento"},
            {"data":"persona_sexo",
                render: function(data,type,row){
                            if(data==="MASCULINO"){
                                return "<i class='fa fa-male'></i>";
                            }else{
                                return "<i class='fa fa-female'></i>";
                            }
                        
                }
            },
            {"data":"persona_telefono"},
            {"data":"cliente_estatus",
                render: function(data,type,row){
                    if(data==="ACTIVO"){
                        return "<span class='badge badge-success badge-pill m-r-5 m-b-5'>"+data+"</span>";
                    }else{
                        return "<span class='badge badge-danger badge-pill m-r-5 m-b-5'>"+data+"</span>";
                    }
                 
                }
            },
            {"data":"cliente_estatus",
                render: function(data,type,row){
                    if(data==="ACTIVO"){
                        return "<button class='btn btn-success' disabled><i class='fa fa-check'></i></button>&nbsp;<button class='desactivar btn btn-danger'><i class='fa fa-times-circle'></i></button>";
                    }else{
                        return "<button class='activar btn btn-warning'><i class='fa fa-check'></i></button>&nbsp;<button class=' btn btn-danger' disabled><i class='fa fa-times-circle'></i></button>";
                    }
                
                }
            }
		  
      ],
      "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $($(nRow).find("td")[3]).css('text-align', 'center' );
            $($(nRow).find("td")[4]).css('text-align', 'center' );
        },
        "language":idioma_espanol,
        select: true
	});
	t_cliente.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_cliente').DataTable().page.info();
        t_cliente.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
        } );
  
}

$('#tabla_cliente').on('click','.activar',function(){
    var data = t_cliente.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(t_cliente.row(this).child.isShown()){//Cuando esta en tama??o responsivo
        var data = t_cliente.row(this).data();
    }
    Swal.fire({
        title: 'Desea activar al cliente?',
        text: "Esta seguro de activar al cliente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
            Modificar_Estatus_Cliente(data.cliente_id,'ACTIVO');
      })

})

$('#tabla_cliente').on('click','.desactivar',function(){
    var data = t_cliente.row($(this).parents('tr')).data();//Detecta a que fila hago click y me captura los datos en la variable data.
    if(t_cliente.row(this).child.isShown()){//Cuando esta en tama??o responsivo
        var data = t_cliente.row(this).data();
    }
    Swal.fire({
        title: 'Desea desactivar al cliente?',
        text: "Esta seguro de desactivar al cliente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
            Modificar_Estatus_Cliente(data.cliente_id,'INACTIVO');
      })

})

function Modificar_Estatus_Cliente(idcliente,estatus){
    $.ajax({
        url:'../controlador/cliente/controlador_actualizar_estatus_cliente.php',
        type:'POST',
        data:{
            idcliente:idcliente,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            if(estatus=="ACTIVO"){
                Swal.fire("Mensaje de confirmacion","Cliente Activado Correctamente","success");
            }else{
                Swal.fire("Mensaje de confirmacion","Cliente Desactivado Correctamente","success");
            }
            t_cliente.ajax.reload();
        }else{
            Swal.fire("Mensaje de Error","No se pudo actualizar los datos","error");
        }
        
    })
}

function AbrirModal(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
    document.getElementById('div_error').style.display="none";
    limpiarmodal();
}

function Registrar_Cliente(){
    var nombre = document.getElementById('txtnombre').value;
    var apepat = document.getElementById('txtapepat').value;
    var apemat = document.getElementById('txtapemat').value;
    var ndocumento = document.getElementById('txtnro').value;
    var tdocumento = document.getElementById('cbm_tdocumento').value;
    var sexo = document.getElementById('cbm_sexo').value;
    var telefono = document.getElementById('txttelefono').value;
    if(nombre.length==0 || apepat.length==0 || apemat.length==0 || ndocumento.length==0 || tdocumento.length==0 || sexo.length==0 || telefono.length==0 ){
        mensajeerror(nombre,apepat,apemat,ndocumento,tdocumento,sexo,telefono,'div_error');
        return Swal.fire("Mensaje de advertencia","Llener el campo vacio","warning");
        
    }

    $.ajax({
        url:'../controlador/cliente/controlador_registro_cliente.php',
        type:'POST',
        data:{
            nombre:nombre,
            apepat:apepat,
            apemat:apemat,
            ndocumento:ndocumento,
            tdocumento:tdocumento,
            sexo:sexo,
            telefono:telefono
        }
    }).done(function(resp){
        if(isNaN(resp)){
            document.getElementById('div_error').style.display="block";
            document.getElementById('div_error').innerHTML="<strong>Revise los siguientes campos:</strong><br>"+resp;
        }else{
            if(resp>0){
                document.getElementById('div_error').style.display="none";
                document.getElementById('div_error').innerHTML="";
                if(resp==1){
                    t_cliente.ajax.reload();
                    limpiarmodal();
                    $("#modal_registro").modal('hide');
                    Swal.fire("Mensaje de confirmacion","Datos guardados","success");
                }else{
                    Swal.fire("Mensaje de advertencia","El Nro de documento ingresado ya existe","warning");
                }
            }else{
                Swal.fire("Mensaje De Error","El registro no se pudo completar","error");
            }
        }
        
    })
}

function  mensajeerror(nombre,apepat,apemat,ndocumento,tdocumento,sexo,telefono,id){
    var cadena="";
    if(nombre.length==0){
        cadena+="El campo nombre no debe estar vacio.<br>"
    }

    if(apepat.length==0){
        cadena+="El campo apellido paterno no debe estar vacio.<br>"
    }

    if(apemat.length==0){
        cadena+="El campo apellido materno no debe estar vacio.<br>"
    }

    if(ndocumento.length==0){
        cadena+="El campo n&uacute;mero de documento no debe estar vacio.<br>"
    }

    if(tdocumento.length==0){
        cadena+="El campo tipo de documento no debe estar vacio.<br>"
    }

    if(sexo.length==0){
        cadena+="El campo sexo no debe estar vacio.<br>"
    }

    if(telefono.length==0){
        cadena+="El campo n&uacute;mero de telefono no debe estar vacio.<br>"
    }

    document.getElementById(id).style.display="block";
    document.getElementById(id).innerHTML="<strong>Revise los siguientes campos:</strong><br>"+cadena;
}

function limpiarmodal(){
    document.getElementById('txtnombre').value="";
    document.getElementById('txtapepat').value="";
    document.getElementById('txtapemat').value="";
    document.getElementById('txtnro').value="";
    document.getElementById('txttelefono').value="";
}