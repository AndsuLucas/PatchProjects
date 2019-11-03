<?php 
namespace helper\model\database;

interface IConnectInfo
{	
	const HOST = "localhost";
	const CHARSET = "utf8";
	const DBNAME = 'devhelper';
	const ROOT = 'root';
	const PSSWD = 'password';

	public function connect(): \PDO;

}