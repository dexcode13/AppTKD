<?php
$user = SolicitudData::getById($_GET["id"]);
$comprobantes = SolicitudData::getAllBySolic($_GET["id"]);
/*$ticket  = TicketData::getById($_GET["id"]);
$user = UserData::getById($ticket->user_id);
$answers = AnswerData::getAllByTicketId($ticket->id);*/
?>
<div class="">
<div class="row">
<div class="col-md-12">
<h2 class="title">Solicitud #<?php echo $user->id_solicitud; ?></h2>
<h3></h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
  Agregar Respuesta
</button>
<a href="./?view=editticket&id=<?php echo $user->id_solicitud; ?>" class="btn btn-warning">Modificar</a>
<br><br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Repuesta</h4>
      </div>
      <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="./?action=addanswer" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $user->id_solicitud; ?>">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripción</label>
    <div class="col-lg-9">
    <textarea class="form-control" name="description" required placeholder="Descripción sobre su archivo"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Cargar Archivo</label>
    <div class="col-lg-9">
      <input type="file" name="file">
    </div>
  </div>

  <div class="form-group">

    <label for="inputEmail1" class="col-lg-3 control-label">Tipo Archivo</label>
    <div class="col-lg-6">
<select name="tipo" class="form-control" required>
 <option value="0">PDF</option>
 <option value="1">XML</option>
</select>
    </div>
  </div>
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
			<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title"><?php echo $user->concepto; ?></h3>


            </div>
            <div class="box-body chat" id="chat-box">
              <div class="item">
<br><br>
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $user->fecha_solic;?></small>
                    <?php echo $user->name." ".$user->lastname; ?>
                  </a>
                  <?php echo $user->concepto;?>
                </p>
                <?php if($user->file!=""):?>
                <div class="attachment">
                  <p class="filename">
                    <a href='./storage/tickets/<?php echo $ticket->file; ?>' target="_blank"><i class='fa fa-file-o'></i> <?php echo $ticket->file;?></a>
                  </p>
                </div>
              <?php endif; ?>
              </div>
              <?php foreach($comprobantes as $archivos):
$uxer = UserData::getById($answ->user_id);

              ?>
              <div class="item">
<br><br>
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo $answ->created_at;?></small>
                    <?php echo $uxer->name." ".$uxer->lastname; ?>
                  </a>
                  <?php echo $answ->description; ?>
                <?php if($answ->file!=""):?>
                <div class="attachment">
                  <p class="filename">
                    <a href='./storage/tickets/<?php echo $answ->ticket_id; ?>/<?php echo $answ->file; ?>' target="_blank"><i class='fa fa-file-o'></i> <?php echo $answ->file;?></a>
                  </p>
                </div>
              <?php endif; ?>
                </p>
              </div>
          <?php endforeach; ?>
            </div>

          </div>
          </div>
         

          </div>

</div>
</div>
</div>