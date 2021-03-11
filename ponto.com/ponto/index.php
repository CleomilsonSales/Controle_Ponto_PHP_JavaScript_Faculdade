<!DOCTYPE html>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../class/layout.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<title>Controle de Ponto</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
	if (tecla==13){ 
		window.document.submit;
		return true
	}else{
		if((tecla>47 && tecla<58)){ 
			return true;
		}else{
			if (tecla==8 || tecla==0){
				return true;
			}else{
				return false
			}
		}
	}
}
</script>
</head>
<body onload="document.forms[0].sair.focus();">
<table width="510" border="0" align="center">
 <tr>
<td colspan="3"><?php include"../cabecalhoSub.php" ?></td>
</tr>
</table>
<form action="index.php" method="post">
<table width="510" border="0" align="center">
  <tr>
    <td width="151" align="right"><label for="sair" class="textoNormal">Encerrar expediente:</label></td>
    <td width="349"><input type="checkbox" name="sair" /></td>
  </tr>
  <tr>
    <td align="right">
<label for="matricula" class="textoNormal">Informe Matrícula:</label>
</td>
    <td><span id="sprytextfield1">
<input type="text" name="matricula" onKeyPress='return SomenteNumero(event)' />
<span class="textfieldRequiredMsg">Informe a matrícula.</span><span class="textfieldInvalidFormatMsg">Informe a matrícula.</span></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="alerta"><?php
include_once '../class/funcionarios.class.php';
include_once '../inc/var.php';


    include_once './matricula.php';    

?></td>
  </tr>
</table>
</form>
<table width="510" border="0" align="center">
<tr>
	<td colspan="3" align="right"><a href="../index.php" class="bMenu">&lt;&lt; Retornar&nbsp;</a></td>
</tr>
<tr>
	<td colspan="3"><?php include"../rodape.php" ?></td>
</tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"]});
</script>
</body>
</html>
