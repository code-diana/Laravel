<style>
    td,th{border: 1px solid;}
    th:last-child{width: 20%}
    td:last-child img{width: 50px}
    td{width: 15%}
    table{width: 70%;margin: auto;text-align: center;}
    img{width: 50%;height: 50%}
</style>
<h1>sponsors</h1>
<table style="border-collapse:collapse">
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>logo</th>
        <th>plana principal</th>
        <th>Estado</th>
        <th>Editar</th>
    </tr>
    @foreach($sponsor as $row)
        @php
            $id = $row['id'];
        @endphp
        <tr>
            <td>{{$row['name']}}</td>
            <td>{{$row['description']}}</td>
            
            <?php 
            $logo=preg_replace('([^A-Za-z0-9 ])', '', $row['logo']);
            ?>
            <td><img src="../resources/img/<?php echo strtolower($logo) ?>.jpg" alt=""></td>

            <td>
                @if($row['main_plain'] == 0)
                    {{"No"}}
                @else
                    {{"Sí"}}
                @endif
            </td>
            <td>
                @if ($row['sponsorState'] == 0)
                    <a href="activarSponsor/{{$id}}"><img src="../resources/img/off.png" alt=""></a>
                @else
                    <a href="activarSponsor/{{$id}}"><img src="../resources/img/on.png" alt=""></a>
                @endif
            </td>
            <td>
                <a href="editarSponsor/{{$id}}"><img src="../resources/img/edit.png" alt=""></a>
                <a href="editarLogo/{{$id}}"><img src="../resources/img/pic.png" alt=""></a>
            </td>
        </tr>
    @endforeach
</table>

<a href="{{url('/paginaPrincipal')}}">Volver atras</a>