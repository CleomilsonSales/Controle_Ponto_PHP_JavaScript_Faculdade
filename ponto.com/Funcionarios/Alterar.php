<!DOCTYPE html>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../class/layout.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<title>Controle de Ponto</title>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  
    </head>
    <body onload="document.forms[0].query.focus();">
    <table width="510" border="0" align="center">
  <tr>
    <td colspan="3"><?php include"../cabecalhoSub.php" ?></td>
  </tr>
</table>
<form action="Alterar.php" method="post">
<table width="510" border="0" align="center">
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="3"><legend class="legenda">Consultas</legend></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="query">Nome:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><input class="inputTexto" type="text" value="<?php echo @$_POST['query']?>" name="query" /></td>
  </tr>
  <tr>
	<td colspan="3" align="right"><hr></td>
</tr>
  <tr>
    <td colspan="3" align="center" class="alerta"><?php
if(@$_POST['EdTrarFunci']){
include_once './update.php';   
}  
include_once '../class/funcionarios.class.php';
include_once '../inc/var.php';

$func = new funcionarios($host, $dbname, $user, $pswd);
$func->setNome(@$_POST['query']);
$list = $func->procurar();

echo '<ul>';
while ($row = mysql_fetch_array($list)) {
    echo '<a class="bMenu" href="Alterar.php?id='.$row['id'].'">'.$row['nome'].'</a><br>';
    
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
    <td colspan="3" align="center" class="alerta"></td>
  </tr>
  <tr>
     <td colspan="3">
    <legend class="legenda">Edição</legend></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="Nome" class="textoNormal">Nome:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><span id="sprytextfield6">
      <input name="Nome" type="text" class="inputTexto" value="<?php echo $func->getNome() ?>" size="40" maxlength="40"/>
      <span class="textfieldRequiredMsg">Nome inválido.</span></span></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="HchegadaM" class="textoNormal">Chegada manhã:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield5">
    <input name="HchegadaM" type="text" class="inputTexto" value="<?php echo substr($func->getHChegadaManha(), 0, -3) ?>" size="15" maxlength="5" />
    <span class="textfieldRequiredMsg">Hora inválida.</span><span class="textfieldInvalidFormatMsg">Hora inválida.</span></span></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="HsaidaM" class="textoNormal">Saída manhã:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield4">
    <input name="HsaidaM" type="text" class="inputTexto" value="<?php echo substr($func->getHSaidaManha(), 0, -3) ?>" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválida.</span><span class="textfieldInvalidFormatMsg">Hora inválida.</span></span></td>
  </tr>
  <tr>
    <td width="126" align="right">    <label for="HchegadaT" class="textoNormal">Chegada tarde:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield3">
    <input name="HchegadaT" type="text" class="inputTexto" value="<?php echo substr($func->getHChegadaTarde(), 0, -3) ?>" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválida.</span><span class="textfieldInvalidFormatMsg">Hora inválida.</span></span></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="HsaidaT" class="textoNormal">Saída tarde:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield2">
    <input name="HsaidaT" type="text" class="inputTexto" value="<?php echo substr($func->getHSaidaTarde(), 0, -3) ?>" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválida.</span><span class="textfieldInvalidFormatMsg">Hora inválida.</span></span></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="matricula" class="textoNormal">Matrícula:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield1">
    <input name="matricula" type="text" class="inputTexto" value="<?php echo $func->getMatricula() ?>" size="25" maxlength="25"/>
    <span class="textfieldRequiredMsg">Matrícula inválida.</span><span class="textfieldInvalidFormatMsg">Matrícula inválida.</span></span></td>
  </tr>
  <tr>
    <td width="126">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="369">&nbsp;</td>
  </tr>
  <tr>
   
    <td colspan="3" align="center"><input name="EdTrarFunci" type="submit" class="botao" value="Editar" />&nbsp;&nbsp;</td>
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "time", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "time", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "time", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "time", {validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["change"]});
</script>

</body>
</html>
