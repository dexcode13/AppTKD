<?php
$solic = SolicitudData::getById($_GET["id"]);
$comprob= ComprobantesData::getAllBySolic($solic->id_solicitud);
/*$ticket  = TicketData::getById($_GET["id"]);
$user = UserData::getById($ticket->user_id);
$answers = AnswerData::getAllByTicketId($ticket->id);*/
?>
<div class="">
<div class="row">
<div class="col-md-12">
<h2 class="title">Solicitud #<?php echo $solic->id_solicitud; ?></h2>
<h3></h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
  Agregar Comprobante
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Comprobante</h4>
      </div>
      <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="./?action=addcomprob" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $solic->id_solicitud; ?>">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-9">
    <textarea class="form-control" name="description" required placeholder="Descripción sobre su archivo"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Cargar Archivo PDF</label>
    <div class="col-lg-9">
      <input type="file" name="pdf">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Cargar Archivo XML</label>
    <div class="col-lg-9">
      <input type="file" name="xml">
    </div>
  </div>

  <!--<div class="form-group">

    <label for="inputEmail1" class="col-lg-3 control-label">Tipo Archivo</label>
    <div class="col-lg-6">
      <select name="tipo" class="form-control" required>
      <option value="0">PDF</option>
      <option value="1">XML</option>
      </select>
    </div>
  </div>-->
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Comprobante</button>
    </div>
  </div>
</form>


      </div>

    </div>
  </div>
</div>
		<div class="row">
			<div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-credit-card"></i>

              <h3 class="box-title"><?php echo $solic->concepto; ?></h3>


            </div>
            <div class="box-body chat" id="chat-box">
              <!--<div class="item">
<br><br>
                
              </div>-->
              <?php foreach($comprob as $comprobante){?>
              <div class="item">
<br><br>
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $comprobante->fecha_up;?></small>
                    
                  </a>
                  <?php echo $comprobante->descripcion; ?>
                <?php if($comprobante->pdf!=""):?>
                <div class="attachment">
                  <p class="filename">
                    <a href='./storage/comprobantes/<?php echo $comprobante->id_solicitud; ?>/<?php echo $comprobante->pdf; ?>' target="_blank"><i class='fa fa-file-o'></i> <?php echo $comprobante->pdf;?></a>
                  </p>
                </div>
              <?php endif; ?>
              <?php if($comprobante->xml!=""):?>
                <div class="attachment">
                  <p class="filename">
                    <a href='./storage/comprobantes/<?php echo $comprobante->id_solicitud; ?>/<?php echo $comprobante->xml; ?>' target="_blank"><i class='fa fa-file-o'></i> <?php echo $comprobante->xml;?></a>
                  </p>
                </div>
              <?php endif; ?>
                </p>
              </div>
          <?php } ?>
            </div>

          </div>
          </div>
         
         <div class="col-md-6">
          <div class="box box-primary">
              <div class="box-header">
                <i class="fa fa-money"></i>
                <h3 class="box-title">Comprobar</h3>
              </div>
            <div class="box-body">
 
                  <form class="" role="form" method="post" action="./?action=addcomprobacion">
                    <div class="table-responsive">
			              <table class="table table-bordered">
                    <thead>
                    <th>Monto Solicitado</th>
                    <th>Montos a Comprobar</th>
                    </thead>
                    <tr>
                      <td>
                          Hospedaje: $ <?php echo $solic->hospedaje; ?>
                      </td>
                      <td>
                        Monto a Comprob. <input type="text" required name="hospedaje" value="" onchange="sumar(this.value);">
                      </td>
                    </tr>
                    <tr>
                      <td>
                          Alimentos: $ <?php echo $solic->alimentacion; ?>
                      </td>
                      <td>
                        Monto a Comprob. <input type="text" required name="alimentacion" value="" onchange="sumar(this.value);">
                      </td>
                    </tr>
                    <tr>
                      <td>
                          Gasolina: $ <?php echo $solic->gasolina_efectivo; ?>
                      </td>
                      <td>
                        Monto a Comprob. <input type="text" required name="gasolina" value="" onchange="sumar(this.value);">
                      </td>
                    </tr>
                    <tr>
                      <td>
                          Casetas: $ <?php echo $solic->casetas; ?>
                      </td>
                      <td>
                        Monto a Comprob. <input type="text" required name="casetas" value="" onchange="sumar(this.value);">
                      </td>
                    </tr>
                      <tr>
                      <td>
                           Total Solicitado: $ <?php echo $solic->total_efectivo; ?>
                      </td>
                      <td>
                        <input type="hidden" name="tot" value="<?php echo $total; ?>">
                          Total a Comprob. $ <strong><span id="spTotal"></span></strong>
                      </td>
                    </tr>
                    <div class="form-group">
                        <div class="">
                        <input type="hidden" name="id" value="<?php echo $solic->id_solicitud; ?>">
                          <button type="submit" class="btn btn-default">Comprobar Solicitud</button>
                        </div>
                      </div>
                  </table>
                  </div>
                  

                  <!--<span>Diferencia: </span> <strong><span id="spTotal"></span></strong>-->
                  </form><!--Fin formulario-->
            </div><!--Fin box-body-->
            </div><!--Fin body-primary-->

          </div><!--Fin col-md-6-->

          
          </div>
          </div>

</div>
</div>
</div>
<script>
function sumar (valor) {
    var total = 0;	
    valor = parseInt(valor); // Convertir el valor a un entero (número).
	
    total = document.getElementById('spTotal').innerHTML;
	
    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
    total = (total == null || total == undefined || total == "") ? 0 : total;
	
    /* Esta es la suma. */
    total = (parseInt(total) + parseInt(valor));
	
    // Colocar el resultado de la suma en el control "span".
    document.getElementById('spTotal').innerHTML = total;
}
</script>