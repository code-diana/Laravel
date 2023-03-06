<style>
    td,th{border: 1px solid;}
    td{width: 80px}
    table{width: 1200px;margin: auto;text-align: center;}
    img{width: 50%;height: 50%}
</style>
<h1>Editar Mapa</h1>
<form action="{{$carreras['id']}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="mapa" class="col-sm-2 col-form-label">Link del mapa</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="mapa" name="image" required>
        </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="send">Editar imagen</button>
      </div>
    </div>
</form>   

<a href="{{url('/paginaPrincipal')}}">Volver atras</a>