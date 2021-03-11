<?php
include_once '../class/funcionarios.class.php';
include_once '../inc/var.php';

$func = new funcionarios($host, $dbname, $user, $pswd);
$func->setId($_POST['id']);;
$query = $func->deletar();

if ($query) {
echo "Excluido com sucesso!";
}else{
echo "Erro de Exclusão. Tente novamente mais tarde.";
}
?>
