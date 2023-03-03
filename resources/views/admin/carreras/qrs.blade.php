<h1>QR's de la carrera {{$races['id']}}: {{$races['title']}}</h1>
<?php
$c=0;
    foreach($runner as $r){
        echo 'Corredor: '.$r['name'].' '.$r['last_name']; ?>
        <p><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Nombre:<?php echo $r['name']?>%0AApellidos:<?php echo $r['last_name']?>%0ADorsal:<?php echo $dorsales[$c]['dorsal']?>%0ACarrera:<?php echo $races['title']?>"></p>
        <?php 
        $c++;
    }
?>
