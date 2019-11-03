<?php 

namespace helper\model\database;

final class Database implements IConnectInfo
{	
	/** Fazendo uso das constantes da interface **/
	private $host = IConnectInfo::HOST;
	private $charset = IConnectInfo::CHARSET;
	private $dbname = IConnectInfo::DBNAME;
	private $root = IConnectInfo::ROOT;
	private $psswd = IConnectInfo::PSSWD;

	public function connect(): \PDO
	{
		$pdoObject = new \PDO(
			"mysql:host={$this->host};charset={$this->charset};dbname={$this->dbname}", 
			$this->root, $this->psswd
		);		
		$pdoObject->setattribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$pdoObject->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

		return $pdoObject;
		
	}
}