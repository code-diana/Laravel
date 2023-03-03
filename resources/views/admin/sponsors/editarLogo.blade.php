<h1>Editar logo aseguradora</h1>

<form action="{{$sponsor['id']}}" method="POST" enctype="multipart/form-data">
    @csrf
    <p>Logo</p>
    <input type="file" name="logo" id="logo" required>
    <p><input type="submit" value="Editar" name="edit"></p>
</form>
<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>