<style>
    td,th{border: 1px solid;}
    td{width: 80px}
    table{width: 1200px;margin: auto;text-align: center;}
    img{width: 50%;height: 50%}
</style>
<h1>Subir fotos de la carrera {{$carreras['id']}}</h1>
<form action="{{$carreras['id']}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="mapa" class="col-sm-2 col-form-label">Subir imagenes</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="mapa" name="image" accept=".jpg" required>
        </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="send">Subir</button>
      </div>
    </div>
</form>   

<a href="{{url('/paginaPrincipal')}}">Volver atras</a>