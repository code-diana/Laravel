<h1>Seleccionar aseguradora</h1>

<form action="precioCarrera" method="POST">
    @csrf
    
    <?php 
    foreach($insurance as $row){ ?>
        
    <label><input type="checkbox" id="cbox1" name="opciones[]" value="{{$row['id']}}"> {{$row['name']}} - {{$row['price']}}€ </label><br>

    <?php
    }
    
    ?>
    <input type="number" value="<?php echo $idC ?>" name="idC" style="display:none">
    <input type="submit" value="Crear" name="envio">
</form>
<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>