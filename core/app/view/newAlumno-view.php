<div class="row">
	<div class="col-md-12">
  <div class="box box-primary">
      <div class="box-header">
	<h1><i class='fa fa-edit'></i> Inscripción de Alumno</h1>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=alumnos" role="form" enctype="multipart/form-data">
    <div class=" col-md-6 col-lg-6">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">RGI del Alumno*:</label>
    <div class="col-md-6">
      <input type="text" minlength=4 name="rgi" required class="form-control" id="usuario" autocomplete="off" placeholder="Escribe el RGI de 4 Dígitos">
      <div id="resultado"></div>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Categoria*:</label>
    <div class="col-lg-6">
<select name="categoria" class="form-control" required>
<option value="">-- SELECCIONE --</option>
 <?php foreach(AlumnosData::getAllCategorias() as $a):?>
    <option value="<?php echo $a->id_categoria; ?>"><?php echo $a->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Nombre del Alumno:</label>
    <div class="col-md-6">
      <input type="text"  name="nombre" class="form-control"  id="address1" placeholder="Nombre(s)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Apellidos del Alumno:</label>
    <div class="col-md-6">
      <input type="text"  name="apellido" class="form-control"  id="address1" placeholder="Apellidos">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Edad:</label>
    <div class="col-md-6">
      <input type="text"  name="edad" class="form-control"  id="address1" placeholder="Edad">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Problema:</label>
    <div class="col-md-6">
      <input type="text"  name="problema_f_m" class="form-control"  id="address1" placeholder="Describa algun problema">
    </div>
  </div>
  <!--<div class="form-group">
  <label for="inputEmail1" class="col-lg-4 control-label">Clase*:</label>
  <div class="col-lg-6">
        <select name="clase" class="form-control" required>
            <option value="">-- SELECCIONE --</option>
            <option value="0">Taekwondo</option>
            <option value="1">Gimnasia</option>
        </select>
  </div>
  </div>-->
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Correo del Alumno:</label>
    <div class="col-md-6">
      <input type="email"  name="correo" class="form-control" required  id="address1" placeholder="example@dominio.com">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Cargar Foto</label>
    <div class="col-md-6">
      <input type="file" name="foto" accept=".png">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Teléfono del Alumno:</label>
    <div class="col-md-6">
      <input type="text"  name="telefono" class="form-control"  id="address1" placeholder="000-000-0000">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Dirección:</label>
    <div class="col-md-6">
      <input type="text" name="direccion" class="form-control" id="email1" placeholder="Describa su dirección">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Colonia:</label>
    <div class="col-md-6">
      <input type="text" name="colonia" required class="form-control" placeholder="Escriba la colonia">
    </div>
  </div>
  </div><!--Fin Izquierda-->
  <div class=" col-md-6 col-lg-6"><!--inicia derecha-->
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">C.P.:</label>
    <div class="col-md-6">
      <input type="number" name="cp" required class="form-control" placeholder="Codigo Postal">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Fecha Nacimiento*</label>
    <div class="col-md-6">
      <input type="date" name="fec_nac"  required class="form-control">
    </div>
  </div>
	<!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Itinerario*</label>
    <div class="col-md-6">
      <input type="text" name="itinerario[]" required class="form-control" id="itinerario" placeholder="Itinerario">
    </div>
		<button type="button" class="btn btn-success btn-xs" title="Agregar" onclick="agregar();" ><i class=" fa fa-plus-square"></i> &nbsp; Agrerar Otro</button>
		<button type="button" class="btn btn-success btn-xs" title="Eliminar" onclick="eliminarFila();" ><i class=" fa fa-plus-square"></i> &nbsp; Eliminar</button>
  </div>

	<div class="form-group" id="addfila">

	</div>-->
	
	
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">CURP:</label>
    <div class="col-md-6">
      <input type="text" name="curp" required class="form-control" id="phone1" placeholder="XXXXXXXXXXXXXXXXXX">
    </div>
  </div>
  <div class="form-group">
  <label for="inputEmail1" class="col-lg-4 control-label">Nivel de Estudio*:</label>
  <div class="col-lg-6">
        <select name="nivel_esc" class="form-control" required>
            <option value="">-- SELECCIONE --</option>
            <option value="Preescolar">Preescolar</option>
            <option value="Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Preparatoria">Preparatoria</option>
            <option value="Licenciatura">Licenciatura</option>
        </select>
  </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Tipo de Sangre*:</label>
    <div class="col-lg-6">
<select name="tipo_sangre" class="form-control" required>
<option value="">-- SELECCIONE --</option>
 <?php foreach(AlumnosData::getAllTipoSangre() as $s):?>
    <option value="<?php echo $s->id_sangre; ?>"><?php echo $s->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Nombre del Padre:</label>
    <div class="col-md-6">
      <input type="text" name="nombre_padre" required class="form-control" id="phone1" placeholder="Nombre completo">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Telefono del Padre:</label>
    <div class="col-md-6">
      <input type="text" name="tel_padre" required class="form-control" id="phone1" placeholder="000-000-0000">
    </div>
  </div>
     <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Trabajo del Padre:*</label>
    <div class="col-md-6">
    <input type="text" name="trabajo_padre" class="form-control" required id="phone1" placeholder="En que trabaja...">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Nombre de la Madre:</label>
    <div class="col-md-6">
      <input type="text" name="nombre_madre" required class="form-control" id="phone1" placeholder="Nombre completo">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Telefono de la Madre:</label>
    <div class="col-md-6">
      <input type="text" name="tel_madre" required class="form-control" id="phone1" placeholder="000-000-0000">
    </div>
  </div>
     <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Trabajo de la Madre:*</label>
    <div class="col-md-6">
      <input type="text" name="trabajo_madre" class="form-control" required id="phone1" placeholder="En que trabaja...">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label" >¿Agregar al Plan de Pagos Actual?</label>
    <div class="col-md-6">
    <div class="checkbox">
        <label>
          <input type="checkbox" name="agregarplan" class="flat-red"> 
        </label>
      </div>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label" >¿Cobrar Anualidad?</label>
    <div class="col-md-6">
    <div class="checkbox">
        <label>
          <input type="checkbox" name="anualidad" class="flat-red"> 
        </label>
      </div>
    </div>
    </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">Agregar Alumno</button>
    </div>
  </div>
  </div><!--fin derecha-->
</form>
	</div>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#fec_nac').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true,
        selectMonths:true,
        selectYears: true,  
        min: new Date(1991,1,1),
        max: new Date(2015,12,31)
    });
    var consulta;
             
      //hacemos focus
      $("#usuario").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#usuario").keyup(function(e){

             //obtenemos el texto introducido en el campo
             consulta = $("#usuario").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="./img/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "core/app/view/comprobar.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("Error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                              //return false;
                  });
                                           
             });
                                
      });
});

</script>