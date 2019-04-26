<style>
h3{font-size: 20px}
.div_center{

     font-family:pt-sans; padding-top: 22px; width: 100%; text-align: center; font-size:17.3px;
}
.div_justify{
    font-family:pt-sans;
    margin-left:90px;margin-right:30px;width:76%;text-align:justify; font-size: 17.4px; padding-left: 14px;color: rgb(109, 110, 114);
    /*padding-top: 22px; width: 100%; font-family: times,"Times New Roman"; text-align: justify;*/
}
</style>


<page backimg="img/marca_agua1.png">    
<br><br>
       <div class="div_center">
        <img src="#" width="340"><br>
        <strong><h5 style="font-family:pt-sans">CLAVE CENTRO DE TRABAJO 04PSU0030C</h5></strong>
       </div>      
        <div class="div_justify" style="">
            <br><p align='justify'>
            La Universidad Internacional Iberoamericana hace constar que, según documentos que existen en los archivos de ésta institucion, a nombre de:
        </p>
        </div>
        <div class="div_center" style="font-family:Bickley; font-size:60px">
         <?=$sustentante;?>
        </div>
        <div class="div_justify">
            <p align='justify'>
            Con número de matrícula <?php echo $user->datos;?>, curso y aprobó integramente el plan de estudios del programa de:
        </p>
        </div>
        <div class="div_center" style="font-family:Bickley; font-size:54px">
            <?php echo $user->lugar;?>
            <h3><?php echo $user->hospedaje;?></h3>
        </div>
        <div class="div_justify">
            <p align='justify'>
            A pedimiento del interesado y para los efectos legales que estime necesario, se expide la presente en la Ciudad de Campeche,
            Campeche a <?php echo $user->fecha_sal;?>.</p>
        </div>
        <div class="div_center">
            <br>
            Atentamente
        </div>
         <div class="div_center">
            <br>
            <h4 style="color: rgb(109, 110, 114); font-size:16px; font:heigth:0.5px;"><strong style="color: #00000;">Dr. Luis Alonso Dzul López</strong><br>
            RECTOR</h4>
        </div>

</page>