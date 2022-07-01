<div class="row">
    <div class="col-md-12">
        <div class="ibox ibox-default">
            <div class="ibox-head">
                <div class="ibox-title">MANTENIMIENTO PROVEEDOR</div>
                <div class="ibox-tools">
                        <button class="btn btn-warning" onclick="AbrirModal()">Nuevo Registro</button>
                </div>
            </div>
            <div class="ibox-body">
                <table id="tabla_proveedor" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Persona</th>
                            <th>Contacto</th>
                            <th>N&deg; Contacto</th>
                            <th>N&deg; documento</th>
                            <th style="text-align:center">Tipo documento</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Persona</th>
                            <th>Contacto</th>
                            <th>N&deg; Contacto</th>
                            <th>N&deg; documento</th>
                            <th style="text-align:center">Tipo documento</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro de Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <label for="">Razon Social</label>
            <input type="text" class="form-control" id="txt_razonsocial" >
          </div>
          <div class="col-lg-6">
            <label for="">Nombre Contacto</label>
            <input type="text" class="form-control" id="txt_nomcontacto" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">N&uacute;mero Contacto</label>
            <input type="text" class="form-control" id="txt_numcontacto" onkeypress="return soloNumeros(event)">
          </div>
          <div class="col-lg-12">
            <label for="">Nombre</label>
            <input type="text" class="form-control" id="txtnombre" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" id="txtapepat" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" id="txtapemat" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Nro Documento</label>
            <input type="text" class="form-control" id="txtnro" onkeypress="return soloNumeros(event)">
          </div>
          <div class="col-lg-6">
            <label for="">Tipo Documento</label>
            <select class="js-example-basic-single" id="cbm_tdocumento" style="width:100%">
                <option value="CI">CI</option>
            
            </select>
          </div>
          <div class="col-lg-6">
            <label for="">Sexo</label>
            <select class="js-example-basic-single" id="cbm_sexo" style="width:100%">
                <option value="MASCULINO">MASCULINO</option>
                <option value="FEMENINO">FEMENINO</option>
            </select>
          </div>
          <div class="col-lg-6">
            <label for="">Nro Telefono</label>
            <input type="text" class="form-control" id="txttelefono" onkeypress="return soloNumeros(event)">
          </div>
          <div class="col-lg-12"><br>
            <div class="alert alert-danger alert-bordered" id="div_error" style="display:none">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="Registrar_Proveedor()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <input type="text" id="txt_idproveedor" hidden>
            <label for="">Razon Social</label>
            <input type="text" class="form-control" id="txt_razonsocial_editar" >
          </div>
          <div class="col-lg-6">
            <label for="">Nombre Contacto</label>
            <input type="text" class="form-control" id="txt_nomcontacto_editar" onkeypress="return sololetras(event)">
          </div>
          <div class="col-lg-6">
            <label for="">N&uacute;mero Contacto</label>
            <input type="text" class="form-control" id="txt_numcontacto_editar" onkeypress="return soloNumeros(event)">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="Modificar_Proveedor()">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<script src="../js/console_proveedor.js?rev=<?php echo time();?>"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    listar_proveedor();
});
$('#modal_registro').on('shown.bs.modal', function () {
  $('#txtnombre').trigger('focus')
})
</script>