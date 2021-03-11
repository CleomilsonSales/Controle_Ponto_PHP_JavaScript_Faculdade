<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../class/layout.css" rel="stylesheet" type="text/css" />
<title>Controle de Ponto</title>
</head>
<body>
<?php
include '../class/registros.class.php';
include '../inc/var.php';

function CalcHora($hora1,$hora2) {
	$calc1=strtotime($hora2);
	$calc2=strtotime($hora1);
	$total=$calc1-$calc2;
	$H=round(($total/60)/60,4);
	$h=explode('.',$H);
	$M='0'.'.'.$h[1];
	$h=$h[0];
	$m=$M*60;
	$m=explode('.',$m);
	$s='0'.'.'.$m[1];
	$s=round($s*60);
	$m=$m[0];	
	if($h<0) $h=$h*(-1);
	if($h>=0 && $h<=9) $h='0'.$h;
	if($m>=0 && $m<=9) $m='0'.$m;
	if($s>=0 && $s<=9) $s='0'.$s;

	$resposta=$h.':'.$m.':'.$s;

	return $resposta;
}
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

$reg = new registros($host, $dbname, $user, $pswd);
$commando = "SELECT Count(registros.funcionarios) as somaRegistros, registros.funcionarios, registros.data,funcionarios.nome
FROM registros
inner join funcionarios on registros.funcionarios = funcionarios.matricula  
WHERE 1 AND Year(data) = '".$_POST['ano']."' AND Month(data)='".$_POST['mes']."' GROUP BY registros.funcionarios ";

$q = $reg->Query($commando);
$ler = mysql_fetch_array($q);
$vUltimoDia = new registros($host, $dbname, $user, $pswd);

$dia = date("d", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$mes = date("n", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
$ano = date("Y", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));

echo ('<!DOCTYPE html>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="class/layout.css" rel="stylesheet" type="text/css" />
		<title>Controle de Ponto</title>
	</head>
	<body>
<table width="530" border="0" align="center">
  <tr>
	<td colspan="10" align="center"><a href="../index.php"><img src="../images/logo.png" width="308" height="102" border="0"></a></td>
  </tr>
<tr>
	<td colspan="3" align="right"><a href="index_faltas.php" class="bMenu">&lt;&lt; Retornar&nbsp;</a></td>
  </tr>
  <tr>
	<td width="176" align="center">Mês/Ano: '.$_POST['mes'].'/'.$_POST['ano'].'</td>
	<td width="176" align="center">Balanço de Faltas</td>
	<td width="176" align="center"></td>
  </tr>
</table>

<table width="530" border="0" align="center">
	<td colspan="10"><hr /></td>
  </tr>
  <tr>
	<td colspan="10">&nbsp;</td>
  </tr>
  
  <tr>
	<td width="420">Colaborador</td>
	<td width="10" align="center">&nbsp;</td>
	<td width="100" align="center">Trabalho</td>
	<td width="100" align="center">Faltas</td>
  </tr>
 ');
 if ($ler['somaRegistros']){
	 if (($mes == $_POST['mes']) and ($ano == $_POST['ano'])){
		$faltaReal = $dia - $ler['somaRegistros'];
	}else{
		$faltaReal = (($vUltimoDia -> UltimoDia($_POST['ano'],$_POST['mes']))- $ler['somaRegistros'])-8;	
	}
	 
	echo '<tr>';
	echo '<td width="420">'.$ler['nome'].'</td>';
	echo '<td width="10" align="center">&nbsp;</td>';
	echo '<td width="100" align="center">'.$ler['somaRegistros'].'</td>';
	echo '<td width="100" align="center">'.$faltaReal.'</td>';
	echo '</tr>';
}else{
	echo '<tr>';
	echo '<td colspan=10 class=alerta>Não existe registro para o Mês/Ano.</td></tr>';
}
  while ($row = mysql_fetch_array($q)) {
if (($mes == $_POST['mes']) and ($ano == $_POST['ano'])){
	$faltaReal = $dia - $row['somaRegistros'];
}else{
	$faltaReal = (($vUltimoDia -> UltimoDia($_POST['ano'],$_POST['mes']))- $row['somaRegistros'])-8;	
}
	echo '<tr>';
	echo '<td width="420">'.$row['nome'].'</td>';
	echo '<td width="10" align="center">&nbsp;</td>';
	echo '<td width="100" align="center">'.$row['somaRegistros'].'</td>';
	echo '<td width="100" align="center">'.$faltaReal.'</td>';
	echo '</tr>';


  };
  echo '  <tr>
	<td height="2" colspan="10"><hr /></td>
  </tr></table>';
?>
</body>
</html>
