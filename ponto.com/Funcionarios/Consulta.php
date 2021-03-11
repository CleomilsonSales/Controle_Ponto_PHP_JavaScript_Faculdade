<!DOCTYPE html>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../class/layout.css" rel="stylesheet" type="text/css" />
<title>Controle de Ponto</title>
    </head>
    <body onload="document.forms[0].Nome.focus();">
    <table width="510" border="0" align="center">
  <tr>
    <td colspan="3"><?php include"../cabecalhoSub.php" ?></td>
  </tr>
</table>
    <form action="Consulta.php" method="post">
<table width="510" border="0" align="center">
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="3"><legend class="legenda">Consultas</legend></td></td>
  </tr>
  <tr>
    <td><label for="query">Busca por Nome:</label></td>
    <td>&nbsp;</td>
    <td><input type="text" value="<?php echo @$_POST['query']?>" name="query" /></td>
  </tr>
  <tr>
    <td colspan="3"><?php
include_once '../class/funcionarios.class.php';
include_once '../inc/var.php';

$func = new funcionarios($host, $dbname, $user, $pswd);
$func->setNome(@$_POST['query']);
$list = $func->procurar();

echo '<ul>';
while ($row = mysql_fetch_array($list)) {
    echo '<li>';
    echo '<a href="Consulta.php?id='.$row['id'].'">'.$row['nome'].'</a>';
    echo '</li>';
    
}

echo '</ul>';



if(@$_GET['id']){
$func->setId($_GET['id']);      
$list = $func->procurar();
while ($row = mysql_fetch_array($list)) {
$func->setMatricula($row['matricula']);    
$func->setHChegadaManha($row['hChegadaManha']);    
$func->setHChegadaTarde($row['hChegadaTarde']);    
$func->setHSaidaManha($row['hSaidaManha']);    
$func->setHSaidaTarde($row['hSaidaTarde']);    
$func->setNome($row['nome']);    
}

?></td>
  </tr>
  </table>
    </form>
    <form action="Alterar.php" method="post">
<table width="510" border="0" align="center">
  <tr>
     <td colspan="3">
    <legend class="legenda">Visualização</legend></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="alerta"></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="Nome" class="textoNormal">Nome:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369">
      <input name="Nome" type="text" class="inputTexto" value="<?php echo $func->getNome() ?>" size="40" maxlength="40" readonly/>
      </td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="HchegadaM" class="textoNormal">Chegada manhã:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369">
    <input name="HchegadaM" type="text" class="inputTexto" value="<?php echo substr($func->getHChegadaManha(), 0, -3) ?>" size="15" maxlength="5" readonly/>
   </td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="HsaidaM" class="textoNormal">Saída manhã:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369">
    <input name="HsaidaM" type="text" class="inputTexto" value="<?php echo substr($func->getHSaidaManha(), 0, -3) ?>" size="15" maxlength="5" readonly/>
    </td>
  </tr>
  <tr>
    <td width="126" align="right">    <label for="HchegadaT" class="textoNormal">Chegada tarde:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369">
    <input name="HchegadaT" type="text" class="inputTexto" value="<?php echo substr($func->getHChegadaTarde(), 0, -3) ?>" size="15" maxlength="5" readonly/>
    </td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="HsaidaT" class="textoNormal">Saída tarde:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369">
    <input name="HsaidaT" type="text" class="inputTexto" value="<?php echo substr($func->getHSaidaTarde(), 0, -3) ?>" size="15" maxlength="5" readonly/>
    </td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="matricula" class="textoNormal">Matrícula:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369">
    <input name="matricula" type="text" class="inputTexto" value="<?php echo $func->getMatricula() ?>" size="25" maxlength="25" readonly/>
    </td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="369">&nbsp;</td>
  </tr>
  <tr>
   
    <td colspan="3" align="center"></td>
    </tr>
  <tr>
    <td colspan="3" align="right"></td>
  </tr>
  <tr>
    <td colspan="3" align="right"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" class="alerta"></td>
  </tr>
</table>
</form>
<?php
}
?>
<table width="510" border="0" align="center">
<tr>
	<td colspan="3" align="right"><a href="index.php" class="bMenu">&lt;&lt; Retornar&nbsp;</a></td>
</tr>
<tr>
	<td colspan="3"><?php include"../rodape.php" ?></td>
</tr>
</table>
    </body>
</html>