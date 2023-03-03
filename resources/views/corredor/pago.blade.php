<form action="{{ route('ins') }} " method="POST" accept-charset="UTF-8" class="formaddcarrera" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Opción</label>
        <div class="col-sm-10">
        <input type="radio" name="option" value="si" required/>Si
        <input type="radio" name="option" value="no" required/>No
        </div>
    </div>


    {{-- Pasar parametros --}}
    <div style="display:none">
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="number" name="runner" value="<?php echo $runner ?>" required/>
                <input type="number" name="id" value="<?php echo $race ?>" required/>
                <input type="number" name="aseguradora" value="<?php echo $insurance ?>" required/>
                <input type="number" name="pro" value="<?php echo $pro ?>" required/>
            </div>
          </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="pagar">Pagar</button>
      </div>
    </div>



    
</form>

{{-- <p><a href="{{url('/')}}">Volver atrás</a></p> --}}


