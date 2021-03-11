<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../class/layout.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<title>Controle de Ponto</title>
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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
<body onLoad="document.forms[0].ano.focus();">
<table width="510" border="0" align="center">
 <tr>
<td colspan="3"><?php include"../cabecalhoSub.php" ?></td>
</tr>
</table>
<form action="horarios.php" method="post">
    <table width="510" border="0" align="center">
      <tr>
    <td colspan="3">
    <legend class="legenda">Mapa de Frequência</legend></td>
  </tr>
          <tr>
        <td width="126">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="369">&nbsp;</td>
      </tr>
      <tr>
        <td width="126" align="right"> <label for="ano" class="textoNormal">Ano:</label></td>
        <td width="10">&nbsp;</td>
        <td width="369"><span id="spryselect2">
          <select name="ano">
            <option value=""></option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
          </select>
        <span class="selectRequiredMsg">Informe o ano.</span></span></td>
      </tr>
      <tr>
        <td width="126" align="right"><label for="mes" class="textoNormal">Escolha o mês:</label></td>
        <td width="10">&nbsp;</td>
        <td width="369"><span id="spryselect1">
          <select name="mes" class="inputTexto">
            <option value=""></option>
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
<span class="selectRequiredMsg" >Informe o mês.</span></span></td>
      </tr>
      <tr>
        <td width="126" align="right"><label for="funcionario" class="textoNormal">Matrícula:</label></td>
        <td width="10">&nbsp;</td>
        <td width="369"><span id="sprytextfield1">
          <input type="text" name="funcionario" id="funcionario" class="inputTexto" onkeypress='return SomenteNumero(event)'/>
        <span class="textfieldRequiredMsg">Informe a matrícula.</span></span></td>
      </tr>
      <tr>
        <td colspan="3" align="center"><input type="submit" class="botao" value="Gerar"/>    </td>
      </tr>
      <tr>
        <td width="126">&nbsp;</td>
        <td width="10">&nbsp;</td>
        <td width="369">&nbsp;</td>
      </tr>
    </table>
</form> 
<table width="510" border="0" align="center">
<tr>
	<td colspan="3" align="right"><a href="index.php" class="bMenu">&lt;&lt; Retornar&nbsp;</a></td>
</tr>
<tr>
	<td colspan="3"><?php include"../rodape.php" ?></td>
</tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["change"]});
</script>
</body>
</html>