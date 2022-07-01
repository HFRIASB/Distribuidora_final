<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_global/r_conexion.php';
$mpdf = new \Mpdf\Mpdf();
$query = "SELECT
venta.venta_id, 
venta.cliente_id, 
CONCAT_WS(' ',persona.persona_nombre,persona.persona_apepat,persona.persona_apemat) as cliente,
persona.persona_nrodocumento,
venta.venta_ticomprobante, 
venta.venta_seriecomprobante, 
venta.venta_numcomprobante, 
venta.venta_fecha, 
venta.venta_impuesto, 
venta.venta_total, 
venta.venta_porcentaje,
persona.persona_telefono
FROM
venta
INNER JOIN
cliente
ON 
    venta.cliente_id = cliente.cliente_id
INNER JOIN
persona
ON 
    cliente.persona_id = persona.persona_id
where venta.venta_id='".$_GET['codigo']."'";
$resultado = $mysqli -> query($query);
while($row1 = $resultado->fetch_assoc()){
  $html = '<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Example 1</title>
      <link rel="stylesheet" href="style.css" media="all" />
    </head>
    <body>
      <header class="clearfix">
        <table style="border-collapse;" border="1">
          <thead>
            <tr>
              <th width="20%" style="border-top:0px;border-left:0px;border-bottom:0px;border-right:0px"><img src="img/logo.png" width="100px"></th>
              <th width="50%" style="border-top:0px;border-left:0px;border-bottom:0px;border-right:0px;text-align:left">
                <b>CANAL CODE PE</b><br>
                <b style="color:black">Domicilio</b>: <span  style="color:black">Ikchipa S/N</span><br>
                <b style="color:black">Telefono</b>: <span  style="color:black"> 6666666</span><br>
                <b style="color:black">Correo</b>: <span  style="color:black"> ejemplo@gmail.com</span><br>
              
              </th>
              <th width="30%" style="text-align:center">
                <h3 style="color:black">NIT: 000000000</h3>
                <h1 style="color:black">'.$row1['venta_ticomprobante'].' DE VENTA</h1><br>
                <h3 style="color:black">'.$row1['venta_seriecomprobante'].' - '.$row1['venta_numcomprobante'].'</h3>
              </th>
            </tr>
          </thead>
        </table>
        <div id="project">
          <div><span style="color:black;font-size:14px"><b>CI:</b> '.$row1['persona_nrodocumento'].'</span></div>
          <div><span style="color:black;font-size:14px"><b>CLIENTE:</b> '.$row1['cliente'].'</span></div>
          <div><span style="color:black;font-size:14px"><b>NÚMERO CONTACTO:</b> '.$row1['persona_telefono'].'</span></div>
          <div><span style="color:black;font-size:14px"><b>FECHA:</b> '.$row1['venta_fecha'].'</span></div>
        </div>
      </header>
      <main>
        <table>
          <thead>
            <tr>
              <th class="service">ITEM</th>
              <th class="desc">DESCRIPCIÓN</th>
              <th>PRECIO</th>
              <th>CANTIDAD</th>
              <th>SUB TOTAL</th>
            </tr>
          </thead>
          <tbody>';
          $query2 = "SELECT
          producto.producto_nombre, 
          detalle_venta.detalleventa_cantidad, 
          detalle_venta.detalleventa_precio, 
          detalle_venta.detalleventa_cantidad * detalle_venta.detalleventa_precio as subtotal,
          detalle_venta.venta_id
      FROM
          detalle_venta
          INNER JOIN
          producto
          ON 
              detalle_venta.producto_id = producto.producto_id
            where detalle_venta.venta_id='".$row1['venta_id']."'";
            $contador=0;
            $resultado2 = $mysqli -> query($query2);
            while($row2 = $resultado2->fetch_assoc()){
              $contador++;
            $html.='<tr>
                <td class="service">'.$contador.'</td>
                <td class="desc">'.$row2['producto_nombre'].'</td>
                <td class="unit">'.$row2['detalleventa_precio'].'</td>
                <td class="qty">'.$row2['detalleventa_cantidad'].'</td>
                <td class="total">'.round($row2['subtotal'],2).'</td>
              </tr>';
            }
            if($row1['venta_ticomprobante']=="FACTURA"){
              $html.='          
              <tr>
                <td colspan="2" rowspan="4" style="background:#FFFFFF;">
                <b>
                <barcode code="54321068" type="QR" class="barcode" size="1.2" disableborder="1"/>
                </b></td>
              </tr>        
              <tr>
                <td colspan="2"  style="background:#FFFFFF;"><b>SUBTOTAL</b></td>
                <td class="total"  style="background:#FFFFFF;">'.($row1['venta_total']-$row1['ingreso_impuesto']).'</td>
              </tr>            
              <tr>
                <td colspan="2"  style="background:#FFFFFF;"><b>IGV '.($row1['venta_porcentaje']*100).'%</b></td>
                <td class="total" style="background:#FFFFFF;">'.$row1['venta_impuesto'].'</td>
              </tr>
              <tr>
                <td colspan="2" class="TOTAL"  style="background:#FFFFFF;"><b>TOTAL</b></td>
                <td class="grand total"  style="background:#FFFFFF;">'.$row1['venta_total'].'</td>
              </tr>'
              
              ;
            }else{
              $html.='              
            <tr>
              <td colspan="4" class="TOTAL"><b>TOTAL</b></td>
              <td class="grand total">'.$row1['venta_total'].'</td>
            </tr>';
            
            }
          $html.='
          </tbody>
        </table>
    </body>
  </html>';
}
$css = file_get_contents('css/style.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output();