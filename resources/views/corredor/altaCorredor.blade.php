<script src="../../resources/views/scripts/script.js"></script>

<h1>Darse de alta en {{$races['title']}}</h1>
<form action="{{$races['id']}}" method="POST" accept-charset="UTF-8" class="formaddcarrera" enctype="multipart/form-data">
  @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nombre</label>
      <div class="col-sm-10">
        <input type="text"  name="nombre" max-length="100" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Apellidos</label>
      <div class="col-sm-10">
        <input type="text" name="surname" max-length="200" required>
      </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Dirección</label>
        <div class="col-sm-10">
          <input type="text" name="direction" max-length="200" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Fecha de nacimiento</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="birth" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Sexo</label>
        <div class="col-sm-10">
          <input type="radio" name="sexo" value="masculino"  required/>Masculino
          <input type="radio" name="sexo" value ="femenino" required/>Femenino
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Opción</label>
        <div class="col-sm-10">
          <input type="radio" name="option" id="pro" value="pro" onclick="show()" required/>Pro
          <input type="radio" name="option" id="open" value="open" onclick="hide()" required/>Open
        </div>
    </div>

    <div class="form-group row" style="display:none"  id="divOp">
        <label class="col-sm-2 col-form-label">Numero de federado</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="fed" name="fed" maxlength="100">
        </div>
    </div>

    <div class="form-group row" style="display:none;"   id="divHd">
        <label class="col-sm-2 col-form-label">Aseguradora</label>
        <div class="col-sm-10">
          <select name="aseguradora" id="aseguradora">
                <?php
                $c=0;
                foreach($aseguradoras as $a){
                  ?>
                  <option value="<?php echo $a['name'];?>"><?php echo $a['name'].'-'.$ensures[$c]['price'].'€'?></option>
                <?php

                $c++;
                }
                ?>
          </select>
        </div>
    </div>

    <div class="form-group row" style="display:none;"  id="divH">
        <div class="col-sm-10">
                <p> Precio<?php echo $races['price']; ?>€ </p>
        </div>
    </div>
   

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="inscription">inscribirse</button>
      </div>
    </div>
</form>

<p><a href="{{url('paginaPrincipal')}}">Volver atrás</a></p>


