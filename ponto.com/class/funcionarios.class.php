<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionarios
 *
 * @author medd
 */
include_once 'Conbanco.class.php';
class funcionarios extends Conbanco{
    private $id;
    private $nome;
    private $matricula;
    private $hChegadaManha;
    private $hSaidaManha;
    private $hChegadaTarde;
    private $hSaidaTarde;
    
    
    public function __construct($host, $dbname, $user, $pswd) {
        parent::__construct($host, $dbname, $user, $pswd);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getHChegadaManha() {
        return $this->hChegadaManha;
    }

    public function setHChegadaManha($hChegadaManha) {
        $this->hChegadaManha = $hChegadaManha;
    }

    public function getHSaidaManha() {
        return $this->hSaidaManha;
    }

    public function setHSaidaManha($hSaidaManha) {
        $this->hSaidaManha = $hSaidaManha;
    }

    public function getHChegadaTarde() {
        return $this->hChegadaTarde;
    }

    public function setHChegadaTarde($hChegadaTarde) {
        $this->hChegadaTarde = $hChegadaTarde;
    }

    public function getHSaidaTarde() {
        return $this->hSaidaTarde;
    }

    public function setHSaidaTarde($hSaidaTarde) {
        $this->hSaidaTarde = $hSaidaTarde;
    }

    public function Inseirir(){
    $sql = "INSERT INTO `ponto`.`funcionarios` (`nome`, `matricula`, `hChegadaManha`, `hSaidaManha`, `hChegadaTarde`, `hSaidaTarde`)
        VALUES ('".$this->nome."', '".$this->matricula."', '".$this->hChegadaManha."', '".$this->hSaidaManha."', '".$this->hChegadaTarde."', '".$this->hSaidaTarde."');";
//    echo $sql;
    return parent::Query($sql);
    }
    public function procurar(){
    $n = '';
    if($this->id){
    $n .= " and id='".$this->id."' ";    
    }
    if($this->nome){
    $n .= " and nome like '%".$this->nome."%' ";    
    }
    if($this->matricula){
    $n .= " and matricula =  '".$this->matricula."' ";    
    }
	if ((!$this->nome) && (!$this->id)&&(!$this->matricula)){
		$sql = "SELECT * FROM `funcionarios` WHERE 0";
	}else{
		$sql = "SELECT * FROM `funcionarios` WHERE 1 ".$n;
    }

    // echo $sql;
    return parent::Query($sql);
    }
    public function editar(){
    $n = '';
    if($this->id){
    $n .= " and id='".$this->id."' ";    
    }
    $sql = "UPDATE `funcionarios`
        SET 
        `nome`= '".$this->nome."',
        `matricula`='".$this->matricula."',
        `hChegadaManha`='".$this->hChegadaManha."',
        `hSaidaManha`='".$this->hSaidaManha."',
        `hChegadaTarde`='".$this->hChegadaTarde."',
        `hSaidaTarde`='".$this->hSaidaTarde."'
        WHERE 1 ".$n;
//    echo $sql;
    return parent::Query($sql);
    }
    
    public function deletar(){
    $n = '';
    if($this->id){
    $n .= " and id='".$this->id."' ";    
    $sql = "DELETE FROM `funcionarios` WHERE 1 ".$n;
    return parent::Query($sql);
    }
  
    
}
}
?>
