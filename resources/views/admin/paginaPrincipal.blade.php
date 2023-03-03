<h1>Soy la pagina principal</h1>
<div style="border:1px solid;width:20%;margin:auto">
    <div id="div1" style="border:1px solid;width:100%;text-align:center">
        <h3>Gestionar carreras</a></h3>
        <p><a href="{{url('anyadirCarrera')}}">Añadir carrera</a></p>
        <p><a href="{{url('editarCarrera')}}">Info carreras</a></p>
    </div>
    
    <div style="border:1px solid;width:100%;text-align:center">
        <h3>Gestionar aseguradoras</h3>
        <p><a href="{{url('mostrarTodosAs')}}">Mostrar todos</a></p>
        <p><a href="{{url('anyadirAseguradora')}}">Añadir aseguradora</a></p>
    </div>
    
    <div style="border:1px solid;width:100%;text-align:center">
        <h3>Gestionar sponsors</h3>
        <p><a href="{{url('mostrarSponsors')}}">Mostrar todos</a></p>
        <p><a href="{{url('anyadirSponsor')}}">Añadir sponsor</a></p>
    </div>
</div>
<h3><a href="{{url('logout')}}">Cerrar sesión</a></h3>