<h1>Editar asegurador</h1>

<form action="{{$insurance['id']}}" method="POST">
    @csrf
    <table>
        <tr>
            <td>CIF</td>
            <td><input type="text" name="cif" id="cif" value="{{$insurance['CIF']}}" readonly></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="insuranceName" id="insuranceName" value="{{$insurance['name']}}"></td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td><input type="text" name="insuranceAdress" id="insuranceAdress" value="{{$insurance['address']}}"></td>
        </tr>
    </table>
    <input type="submit" value="Editar" name="edit">
</form>   

<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>