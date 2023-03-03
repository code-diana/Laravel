<link rel="stylesheet" href="../resources/css/app.css">
<h1>Información carrera</h1>

{{-- info carrera --}}
<div>
    <h3>Imagen</h3>
    <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $races['image'])?>
    <img src="../../resources/img/<?php echo strtolower($image) ?>.jpg" alt=""/>
</div>
<div>
    <h3>Description </h3>
    {{$races['description']}}
</div>  
<div>
    <h3>Desnivel</h3>
    {{$races['unevenness']}}
</div>
<div>
    <h3>Numero participantes</h3>
    {{$races['number_participants']}}
</div>
<div>
    <h3>Kilometros</h3>
    {{$races['km']}}
</div>
<div>
    <h3>Fecha y hora de salida </h3>
    {{$races['date']}}
</div>
<div>
    <h3>Punto de salida</h3>
    {{$races['start']}}
</div>
<div>
    <h3>Precio</h3>
    {{$races['price']}}
</div>

{{-- {{$races['promotion']}} --}}
<div>
    <h3>Cartel de promoción</h3>
    <?php $promotion=preg_replace('([^A-Za-z0-9 ])', '', $races['promotion'])?>
    <img src="../../resources/img/<?php echo strtolower($promotion) ?>.jpg" alt=""/>
    {{-- <img src="C:\xampp\htdocs\bikeroll\resources\img\pic.png" alt="">
    <img src="../../resources/img/eliminar.png" alt="">
    <img src="{{$image->$races['image']}}" alt=""> --}}
</div>

<?php $id=$races['id']; 


//revisar

//ver si la fecha de la carrera es más grande que hoy
$fecha_actual = date("d-m-Y");
$newDate = date("d-m-Y", strtotime($races['date'])); 


//calcular el intervalo
$hoy=now();
$carrera=$races->date;
$intervalo = $hoy->diff($carrera);


if ($intervalo->m<=1 && $intervalo->d<=30 && $newDate>$fecha_actual){ ?>

<h3><a href="{{ url('/altaCorredor/'.$id) }}">Darse de alta</a></h3>

<?php } ?>
