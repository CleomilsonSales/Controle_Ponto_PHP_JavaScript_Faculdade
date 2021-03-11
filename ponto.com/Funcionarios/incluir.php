
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
    <body onload="document.forms[0].Nome.focus();">
    <table width="510" border="0" align="center">
  <tr>
    <td colspan="3"><?php include"../cabecalhoSub.php" ?></td>
  </tr>
</table>
<form name="insercao" action="incluir.php" method="post">
<table width="510" border="0" align="center">

  <tr>
    <td colspan="3">
    <legend class="legenda">Inserção</legend></td>
  </tr>
    <tr>
    <td colspan="3" align="center" class="alerta"><?php

if(@$_POST['CadasTrarFunci']){
    include_once './add.php';   
    
}
?></td>
  </tr>
  <tr>
    <td width="126" align="right"><label for="Nome" class="textoNormal">Nome:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369" ><span id="sprytextfield7">
    <input name="Nome" type="text" class="inputTexto" size="40" maxlength="40" />
    <span class="textfieldRequiredMsg">Nome inválido.</span></span></td>
  </tr>
    <tr>
    <td width="126" align="right"><label class="textoNormal">Chegada manhã:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369" ><span id="sprytextfield6">
    <input name="HchegadaM" type="text" class="inputTexto" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválido.</span><span class="textfieldInvalidFormatMsg">Hora inválido.</span></span><span class="asterisco">
      <label for="select"></label>
      </span></td>
  </tr>
    <tr>
    <td width="126" align="right"><label for="HsaidaM" class="textoNormal">Saída manhã:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield5">
    <input name="HsaidaM" type="text" class="inputTexto" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválido.</span><span class="textfieldInvalidFormatMsg">Hora inválido.</span></span></td>
  </tr>
    <tr>
    <td width="126" align="right">    <label for="HchegadaT" class="textoNormal">Chegada tarde:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield3">
    <input name="HchegadaT" type="text" class="inputTexto" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválido.</span><span class="textfieldInvalidFormatMsg">Hora inválida.</span></span></td>
  </tr>
    <tr>
    <td width="126" align="right">    <label for="HsaidaT" class="textoNormal">Saída tarde:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield2">
    <input name="HsaidaT" type="text" class="inputTexto" size="15" maxlength="5"/>
    <span class="textfieldRequiredMsg">Hora inválido.</span><span class="textfieldInvalidFormatMsg">Hora inválida.</span></span></td>
  </tr>
    <tr>
    <td width="126" align="right"><label for="matricula" class="textoNormal">Matricula:</label></td>
    <td width="1">&nbsp;</td>
    <td width="369"><span id="sprytextfield4">
    <input name="matricula" type="text" class="inputTexto" size="25" maxlength="25"/>
    <span class="textfieldRequiredMsg">Matricula inválida.</span><span class="textfieldInvalidFormatMsg">Matricula inválida.</span></span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
    <tr>
    <td colspan="3" align="center"><input name="CadasTrarFunci" type="submit" class="botao" value="Cadastrar" />&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="right"><a href="index.php" class="bMenu">&lt;&lt; Retornar&nbsp;</a></td>
  </tr>
      <tr>
        <td colspan="3" align="center" class="alerta"></td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
       
</table>
</form>
<table width="510" border="0" align="center">
    <tr>
      <td colspan="3"><?php include"../rodape.php" ?></td>
    </tr>
    
</table>
    <p>&nbsp;</p>
    <script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "time", {validateOn:["change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "time", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "time", {validateOn:["change"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "time", {validateOn:["change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {validateOn:["change"]});
    </script>
    </body>
</html>
