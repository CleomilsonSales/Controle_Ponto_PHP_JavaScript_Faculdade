<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registros
 *
 * @author Nen
 */
include_once 'Conbanco.class.php';

class registros extends Conbanco{
private  $id;
private  $hchegadaM;
private  $hsaidaM;
private  $hchegadaT;
private  $hsaidaT;
private  $funcionarios;
private  $data;
private  $turno;
    
    
function __construct($host, $dbname, $user, $pswd) {
  parent::__construct($host, $dbname, $user, $pswd);
}

public function getId() {
    return $this->id;
}

public function getHchegadaM() {
    return $this->hchegadaM;
}

public function getHsaidaM() {
    return $this->hsaidaM;
}

public function getHchegadaT() {
    return $this->hchegadaT;
}

public function getHsaidaT() {
    return $this->hsaidaT;
}

public function getFuncionarios() {
    return $this->funcionarios;
}

public function setId($id) {
    $this->id = $id;
}

public function setHchegadaM($hchegadaM) {
    $this->hchegadaM = $hchegadaM;
}

public function setHsaidaM($hsaidaM) {
    $this->hsaidaM = $hsaidaM;
}

public function setHchegadaT($hchegadaT) {
    $this->hchegadaT = $hchegadaT;
}

public function setHsaidaT($hsaidaT) {
    $this->hsaidaT = $hsaidaT;
}

public function setFuncionarios($funcionarios) {
    $this->funcionarios = $funcionarios;
}

public function getData() {
    return $this->data;
}

public function getTurno() {
    return $this->turno;
}

public function setData($data) {
    $this->data = $data;
}

public function setTurno($turno) {
    $this->turno = $turno;
}

public function verificarMatricula(){
$sql = "SELECT * 
FROM  `registros` 
WHERE data = '".$this->data."' And funcionarios = '".$this->funcionarios."'
";
//echo $sql;
return parent::Query($sql);
}
public function SalvaMatrica(){

$sql = "INSERT INTO  `registros` (
`hchegadaM` ,
`hsaidaM` ,
`hchegadaT` ,
`hsaidaT` ,
`funcionarios`,
`turno`,
`data`
)
VALUES (
'".$this->hchegadaM."',  '".$this->hsaidaM."',  '".$this->hchegadaT."',  '".$this->hsaidaT."',  '".$this->funcionarios."', '".$this->turno."', '".$this->data."');"; 
//echo $sql;
return parent::Query($sql);
}

public function EditarRegistro(){
$n = '';

    if($this->hchegadaM){
    $n .= " hchegadaM = '".$this->hchegadaM."',";
    }
    if($this->hchegadaT){
    $n .= " hchegadaT = '".$this->hchegadaT."',";
    }
    if($this->hsaidaT){
    $n .= " hsaidaT = '".$this->hsaidaT."',";
    }
    if($this->hsaidaM){
    $n .= " hsaidaM = '".$this->hsaidaM."',";
    }
        if($this->turno){
    $n .= " turno = '".$this->turno."'";
}
$sql = "UPDATE registros SET ".$n." WHERE data = '".$this->data."' And funcionarios = '".$this->funcionarios."'";
//echo $sql;
return parent::Query($sql); 
}

public function UltimoDia($ano,$mes){ 
   if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) { 
       $dias_fevereiro = 29; 
   } else { 
       $dias_fevereiro = 28; 
   } 
   switch($mes) { 
       case 01: return 31; break; 
       case 02: return $dias_fevereiro; break; 
       case 03: return 31; break; 
       case 04: return 30; break; 
       case 05: return 31; break; 
       case 06: return 30; break; 
       case 07: return 31; break; 
       case 08: return 31; break; 
       case 09: return 30; break; 
       case 10: return 31; break; 
       case 11: return 30; break; 
       case 12: return 31; break; 
   } 
}

    
}
