<div class="row">
	<div class="col-md-12">
  <div class="box box-primary">
      <div class="box-header">
	<h1><i class='fa fa-edit'></i> Inscripción de Alumno Gimnasia</h1>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=alumnosG" role="form" enctype="multipart/form-data">
    <div class=" col-md-6 col-lg-6">  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">RGI del Alumno*:</label>
    <div class="col-md-6">
      <input type="number" name="rgi" required class="form-control" id="usuario" autocomplete="off" placeholder="Escribe el RGI">
      <div id="resultado"></div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Categoria*:</label>
    <div class="col-lg-6">
<select name="categoria" class="form-control" required>
<option value="">-- SELECCIONE --</option>
 <?php foreach(AlumnosData::getAllCategoriasGIM() as $a):?>
    <option value="<?php echo $a->id_categoria; ?>"><?php echo $a->nombre; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Nombre del Alumno:</label>
    <div class="col-md-6">
      <input type="text"  name="nombre" required class="form-control"  id="address1" placeholder="Nombre(s)">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Apellidos del Alumno:</label>
    <div class="col-md-6">
      <input type="text"  name="apellido" required class="form-control"  id="address1" placeholder="Apellidos">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Edad:</label>
    <div class="col-md-6">
      <input type="text"  name="edad" required class="form-control"  id="address1" placeholder="Edad">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Fecha Nacimiento:</label>
    <div class="col-md-6">
      <input type="date"  name="fecha_nac" required class="form-control"  id="address1" placeholder="Describa algun problema">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Dirección:</label>
    <div class="col-md-6">
      <input type="text"  name="direccion" class="form-control" required  id="address1" placeholder="Dirección">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Colonia:</label>
    <div class="col-md-6">
      <input type="text"  name="colonia" class="form-control" required  id="address1" placeholder="Dirección">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">CP:</label>
    <div class="col-md-6">
      <input type="text"  name="cp" class="form-control" required  id="address1" placeholder="Dirección">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-2">
      <button type="submit" class="btn btn-success">Agregar Alumno</button>
    </div>
  </div>
  </div><!--Fin Izquierda-->
  <div class=" col-md-6 col-lg-6"><!--inicia derecha-->
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">CURP:</label>
    <div class="col-md-6">
      <input type="text"  name="curp" class="form-control" required  id="address1" placeholder="Dirección">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">Teléfono:</label>
    <div class="col-md-6">
      <input type="text"  name="telefono" class="form-control"  id="address1" placeholder="000-000-0000">
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
    <label for="inputEmail1" class="col-lg-4 control-label">Cargar Foto</label>
    <div class="col-md-6">
      <input type="file" name="foto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label" >Agregar al Plan de Pagos Actual</label>
    <div class="col-md-6">
    <div class="checkbox">
        <label>
          <input type="checkbox" name="agregarplan" class="flat-red"> 
        </label>
      </div>
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