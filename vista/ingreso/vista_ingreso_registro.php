<script src="../js/console_ingreso.js?rev=<?php echo time();?>"></script>
<div class="row">
    <div class="col-md-12">
        <div class="ibox ibox-default">
            <div class="ibox-head">
                <div class="ibox-title">MANTENIMIENTO REGISTRO DE INGRESO</div>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-body">
                <div class="row">
                    <div class="col-8">
                        <label for="">Proveedor</label>
                        <select class="js-example-basic-single" id="cbm_proveedor" style="width:100%">
                        </select>
                    </div>
                    <div class="col-4">
                        <!--<label for="">Impuesto (13% = 0.1494) (*):</label>--> 
                        <input type="text" class="form-control" id="txt_impuesto" hidden><!--disabled-->
                    </div>
                    <div class="col-4">
                        <label for="">Tipo Comprobante</label>
                        <select class="js-example-basic-single" id="cbm_tipo" style="width:100%">
                            <option value="BOLETA">BOLETA</option>
                            <option value="FACTURA">FACTURA</option>
                            <option value="TICKET">TICKET</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="">Serie Comprobante</label>
                        <input type="text" class="form-control" id="txt_serie">
                    </div>
                    <div class="col-4">
                        <label for="">N&uacute;mero Comrprobante</label>
                        <input type="text" class="form-control" id="txt_ncomprobante">
                    </div>
                    <div class="col-4">
                        <label for="">Producto</label>
                        <select class="js-example-basic-single" id="cbm_producto" style="width:100%">
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="">Precio</label>
                        <input type="number"  onkeypress="return filterFloat(event,this);" min="1" class="form-control" id="txt_precio">
                    </div>
                    <div class="col-3">
                        <label for="">Cantidad</label>
                        <input type="number"  onkeypress="return event.charCode >= 48" min="1" class="form-control" id="txt_cantidad">
                    </div>
                    <div class="col-2">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-success" onclick="Agregar_Producto_Detalle_Ingreso()"><i class="fa fa-plus"></i>&nbsp;Agregar</button>
                    </div>
                    <div class="col-12" style="text-align:center"><br>
                        <button class="btn btn-primary btn-lg" onclick="Registrar_Ingreso()">Registrar Ingreso</button>
                    </div>
                    <div class="col-12" style="text-align:left"><br>
                        <h5 for=""><b>Detalle de Ingreso</b></h5>
                    </div>
                    <div class="col-12 table-responsive">
                        <table id="detalle_ingreso" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PRODUCTO</th>
                                    <th>PRECIO</th>
                                    <th>CANTIDAD</th>
                                    <th>SUB TOTAL</th>
                                    <th>ACCI&Oacute;N</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_detalle_ingreso">
                            </tbody>
                        </table>
                    </div>
                        <div class="col-12" style="text-align:right">
                            <h5 for="" id="lbl_subtotal"></h5>
                        </div>
                        <div class="col-12" style="text-align:right">
                            <h5 for="" id="lbl_impuesto"></h5>
                        </div>
                        <div class="col-12" style="text-align:right">
                            <h5 for="" id="lbl_totalneto"></h5>
                        </div>
                </div><br>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    combo_proveedor();
    combo_producto();

});
$('#cbm_tipo').on('select2:select', function (e) {
    let tipo = document.getElementById('cbm_tipo').value;
    if(tipo=="FACTURA"){
        document.getElementById('txt_impuesto').disabled=false;
    }else{
        document.getElementById('txt_impuesto').disabled=true;
    }
});

</script>