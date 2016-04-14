<?php

class Conexao{

                public $strServidor     = "localhost";
		public $strUsuario 	= "root";
		public $strSenha 	= "";
		public $strBD		= "maps";
		public $charset		= "utf8";
    
		//public $strServidor     = "localhost";
//		public $strServidor     = "ns58.hostgator.com.br";
//		public $strUsuario 	= "pedro581_2";
//		public $strSenha 	= "123456N";
//		public $strBD		= "pedro581_maps";
//		public $charset		= "utf8";
		
		public $conn;
		
		public function __construct() {
			$this->conn = mysql_connect($this->strServidor, $this->strUsuario, $this->strSenha);
			mysql_select_db($this->strBD) or die ("Erro ao selecionar Banco.");
			mysql_set_charset($this->charset, $this->conn);
		}
		
		public function __destruct(){
			if(isset($this->conn) && gettype($this->conn) == "mysql link")
			{
				mysql_close($this->conn);
				settype($this, "null");
			}
		}
	}
        //$conexao = new Conexao();
?>