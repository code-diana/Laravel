
<h1>Añadir carrera</h1>

<form action="anyadirCarrera" method="POST" accept-charset="UTF-8" class="formaddcarrera" enctype="multipart/form-data">
  @csrf
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Título</label>
      <div class="col-sm-10">
        <input type="text" id="title" name="title" max-length="100" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">Descripción</label>
      <div class="col-sm-10">
        <textarea id="description" name="description" required></textarea>
      </div>
    </div>

    <div class="form-group row">
        <label for="desnivel" class="col-sm-2 col-form-label">Desnivel</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="desnivel" name="unevenness" max="99" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="mapa" class="col-sm-2 col-form-label">Imagen del mapa</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="mapa" name="image" accept=".jpg" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="participantes" class="col-sm-2 col-form-label">Participantes màximos</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="participantes" name="number_participants" max="9999" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="km" class="col-sm-2 col-form-label">Kilómetros</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="km" name="km" max="100" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
        <div class="col-sm-10">
          <input type="datetime-local" class="form-control" id="fecha" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="salida" class="col-sm-2 col-form-label">Punto de salida</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="salida" name="start" maxlength="255" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="cartel" class="col-sm-2 col-form-label">Cartel de promoción</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="cartel" name="promotion" accept=".jpg" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="coste" class="col-sm-2 col-form-label">Coste depatrocinio</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="coste" name="price"  max="99" required>
        </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="send">Crear carrera</button>
      </div>
    </div>
</form>

<p><a href="{{url('paginaPrincipal')}}">Volver atrás</a></p>