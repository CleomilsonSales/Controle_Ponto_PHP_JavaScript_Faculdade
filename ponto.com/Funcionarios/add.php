<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
    </head>
    <body>
<?php

if ((!empty($_POST['Nome'])) and (!empty($_POST['HchegadaM'])) and (!empty($_POST['HsaidaM'])) and (!empty($_POST['HchegadaT'])) and (!empty($_POST['HsaidaT'])) and (!empty($_POST['matricula']))){
	
include_once '../class/funcionarios.class.php';
include_once '../inc/var.php';

$func = new funcionarios($host, $dbname, $user, $pswd);
$func->setNome(strtoupper($_POST['Nome']));
$func->setHChegadaManha($_POST['HchegadaM']);
$func->setHSaidaManha($_POST['HsaidaM']);
$func->setHChegadaTarde($_POST['HchegadaT']);
$func->setHSaidaTarde($_POST['HsaidaT']);
$func->setMatricula(strtoupper($_POST['matricula']));

$query = $func->Inseirir();
}
if ($query) {
	echo "Inserido com sucesso.";
}else{
	echo "Erro de inserção, Verifique os campos.";
}
?>
	</body>
</html>
