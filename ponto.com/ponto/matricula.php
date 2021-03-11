<?php
include_once '../class/registros.class.php';
include_once '../class/funcionarios.class.php';
include_once '../inc/var.php';

$dia = date("d", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$mes = date("n", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$ano = date("Y", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
function somaData($times){
$seconds = ''; 
foreach ( $times as $time )
{
list( $g, $i, $s ) = explode( ':', $time );
$seconds += $g * 3600;
$seconds += $i * 60;
$seconds += $s;
}

$hours = floor( $seconds / 3600 );
$seconds -= $hours * 3600;
$minutes = floor( $seconds / 60 );
$seconds -= $minutes * 60;

return "{$hours}:{$minutes}:{$seconds}";
}
$matricula = new registros($host, $dbname, $user, $pswd);
$hr = date("H:i:s", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
if(@$_POST['matricula']){
$matricula->setFuncionarios($_POST['matricula']);
$matricula->setData($ano."-".$mes."-".$dia);
$func = new funcionarios($host, $dbname, $user, $pswd);
$func->setMatricula($_POST['matricula']);
$user = $func->procurar();

if(mysql_num_rows($user)>0){
$dados = $matricula->verificarMatricula();
if(mysql_num_rows($dados)<=0){
echo 'Inicio do primeiro turno';
$matricula->setHchegadaM($hr);
$matricula->setTurno(1);
$matricula->SalvaMatrica();
Echo "<br> Bem Vindo ";
}else{
    while ($row = mysql_fetch_array($dados)) {
    $matricula->setTurno($row['turno']);
    }
 
if($_POST['sair']){
$matricula->setTurno(3);    
} 
if($matricula->getTurno() == 4){
echo 'Colaborador com expediente encerrado';
}  
if($matricula->getTurno() == 3){
echo 'Encerramento de expediente';
$matricula->setTurno($matricula->getTurno()+1);
$matricula->setHsaidaT($hr);
}
if($matricula->getTurno() == 2){
echo 'Inicio do segundo turno';
$matricula->setTurno($matricula->getTurno()+1);
$matricula->setHchegadaT($hr);
}  
if($matricula->getTurno() == 1){
echo 'Final do primeiro turno';
$matricula->setTurno($matricula->getTurno()+1);
$matricula->setHsaidaM($hr);
} 

$matricula->EditarRegistro();
}

}else{
    echo 'Funcionário não cadastrado. ';
}
}
Echo '<br><br>Hora atual: ';
	$times = array(
		$hr
	);


echo somaData($times);
