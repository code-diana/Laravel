<style>
   div{display:inline;}
   img{
    width:10%;
    height:10%;
   }
   a{display:block;}
</style>
<h1>Fotos de la carrera {{$carreras['id']}}</h1>
    @foreach($fotos as $foto)
    <div>
        <?php $image=preg_replace('([^A-Za-z0-9 ])', '', $foto['image'])?>
        <img src="../../resources/img/<?php echo strtolower($image) ?>.jpg" alt="">
    </div>
       
    @endforeach
</table>

<a href="{{url('/')}}">Volver atras</a>