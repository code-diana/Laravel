<h1>Editar sponsor</h1>

<form action="{{$sponsor['id']}}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="name" id="name" maxlength="100" value="{{$sponsor['name']}}" required></td>
        </tr>
        <tr>
            <td>Descripción</td>
            <td><textarea name="desc" id="desc" cols="21" rows="5" required>{{$sponsor['description']}}</textarea></td>
        </tr>
        <tr>
            <td>Plana principal</td>
            <td>
                @if($sponsor['main_plain'] == 0)
                    <input type="radio" id="opt1" name="pp" value="1"/>
                    <label for="op1">Sí</label>
                    <input type="radio" id="op2" name="pp" value="0" checked="checked"/>
                    <label for="op2">No</label>
                @else
                    <input type="radio" id="opt1" name="pp" value="1" checked="checked"/>
                    <label for="op1">Sí</label>
                    <input type="radio" id="op2" name="pp" value="0"/>
                    <label for="op2">No</label>
                @endif
            </td>
        </tr>
    </table>
    <input type="submit" value="Editar" name="edit">
</form>
<a href="{{url('/paginaPrincipal')}}">Pagina principal</a>
