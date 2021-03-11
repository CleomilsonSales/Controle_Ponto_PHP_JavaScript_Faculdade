<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conbanco
 *
 * @author informatica
 */
class Conbanco {
protected $host;
protected $user;
protected $pswd;
protected $dbname;
protected $con = null;


function __construct($host, $dbname, $user, $pswd ){
    $this->host = $host;
    $this->dbname = $dbname;
    $this->user = $user;
    $this->pswd = $pswd;

} //método construtor




     public function conexao(){
         $this->con = @mysql_connect($this->host, $this->user, $this->pswd);
         mysql_select_db($this->dbname);
         @header('Content-Type: text/html; charset=utf-8');
mysql_query("SET * 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
return $this->con;
     }

#método que encerra a conexao
     public function fecharCon(){
         @pg_close($this->con);

     }

#método verifica status da conexao
function statusCon(){
if(!$this->con){
echo "<h3>O sistema não está conectado à  [$this->dbname] em [$this->host].</h3>". mysql_error();
exit;
}
else{
echo "<h3>O sistema está conectado à  [$this->dbname] em [$this->host].</h3>";
}
}
function Query($Commando){
		$rs = mysql_query($Commando,$this->conexao());
              
		if(!$rs) return NULL;
		else return $rs;
	}

}



?>
