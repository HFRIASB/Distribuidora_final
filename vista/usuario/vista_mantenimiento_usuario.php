<div class="row">
    <div class="col-md-12">
        <div class="ibox ibox-default">
            <div class="ibox-head">
                <div class="ibox-title">MANTENIMIENTO USUARIO</div>
                <div class="ibox-tools">
                        <button class="btn btn-warning" onclick="AbrirModal()">Nuevo Registro</button>
                </div>
            </div>
            <div class="ibox-body">
                <table id="tabla_usuario" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Persona</th>
                            <th>Rol</th>
                            <th>Email</th>
                            <th style="text-align:center">Imagen</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Usuario</th>
                            <th>Persona</th>
                            <th>Rol</th>
                            <th>Email</th>
                            <th  style="text-align:center">Imagen</th>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return false">
          <div class="row">
            <div class="col-lg-6">
              <label for="">Usuario</label>
              <input type="text" class="form-control" id="txt_usu"><br>
            </div>
            <div class="col-lg-6">
              <label for="">Password</label>
              <input type="password" class="form-control" id="txt_password"><br>
            </div>
            <div class="col-lg-6">
              <label for="">Persona</label>
                <select class="js-example-basic-single" id="cbm_persona" style="width:100%">
                </select><br>
            </div>
            <div class="col-lg-6">
              <label for="">Email</label>
              <input type="text" class="form-control" id="txt_email"><br>
            </div>
            <div class="col-lg-6">
              <label for="">Rol</label>
                <select class="js-example-basic-single" id="cbm_rol" style="width:100%">
                </select><br>
            </div>
            <div class="col-lg-6">
              <label for="">Subir imagen</label><br>
              <input type="file" id="imagen" accept="image/*" class="form-control-file">
            </div>
          </div> 
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" onclick="Registrar_Usuario()">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return false">
          <div class="row">
            <div class="col-lg-6">
              <label for="">Usuario</label>
              <input type="text" id="txt_usu_id" hidden>
              <input type="text" class="form-control" id="txt_usu_editar_actual" disabled><br>
            </div>
            <div class="col-lg-6">
              <label for="">Persona</label>
                <select class="js-example-basic-single" id="cbm_persona_editar" style="width:100%">
                </select><br>
            </div>
            <div class="col-lg-6">
              <label for="">Email</label>
              <input type="text" class="form-control" id="txt_email_editar_nuevo"><br>
            </div>
            <div class="col-lg-3">
              <label for="">Rol</label>
                <select class="js-example-basic-single" id="cbm_rol_editar" style="width:100%">
                </select><br>
            </div>
            <div class="col-lg-3">
              <label for="">Estatus</label>
                <select class="js-example-basic-single" id="cbm_estatus" style="width:100%">
                <option value="ACTIVO">ACTIVO</option>
                <option value="INACTIVO">INACTIVO</option>
                </select><br>
            </div>
            <div class="col-lg-10">
              <label for="">Subir imagen</label><br>
              <input type="file" id="imagen_editar" accept="image/*" class="form-control-file">
            </div>
            <div class="col-lg-2">
              <label for="">&nbsp;</label><br>
              <button class="btn btn-success" onclick="Editar_Foto()">Actualizar</button>
            </div>
          </div> 
        
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="Editar_Usuario()">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="../js/console_usuario.js?rev=<?php echo time();?>"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    listar_usuarios();
    listar_persona_combo();
    listar_rol_combo();
});
$('#modal_registro').on('shown.bs.modal', function () {
  $('#txt_usu').trigger('focus')
})
document.getElementById("imagen").addEventListener("change", () => {
     var fileName = document.getElementById("imagen").value; 
     var idxDot = fileName.lastIndexOf(".") + 1; 
     var extFile = fileName.substr(idxDot, fileName.length).toLowerCase(); 
     if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
      //TO DO 
     }else{ 
      Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SE ACEPTAN IMAGENES, USTED SUBIO UN ARCHIVO CON EXTESION "+extFile,"warning");
      document.getElementById("imagen").value="";
     } 
}); 

document.getElementById("imagen_editar").addEventListener("change", () => {
     var fileName = document.getElementById("imagen_editar").value; 
     var idxDot = fileName.lastIndexOf(".") + 1; 
     var extFile = fileName.substr(idxDot, fileName.length).toLowerCase(); 
     if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){ 
      //TO DO 
     }else{ 
      Swal.fire("MENSAJE DE ADVERTENCIA","SOLO SE ACEPTAN IMAGENES, USTED SUBIO UN ARCHIVO CON EXTESION "+extFile,"warning");
      document.getElementById("imagen_editar").value="";
     } 
}); 
</script>