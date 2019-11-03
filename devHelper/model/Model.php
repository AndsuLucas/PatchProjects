<?php 
namespace helper\model;
use helper\helpers\classes\SqlParser;
use helper\model\database\IConnectInfo;

class Model extends AbstractModel
{
	protected $usesTable;
	protected $database;
	
	public function __construct(IConnectInfo $database)
	{
		$this->database = $database->connect();
	}

	public final function create(array $fields): bool
	{	
		$query = SqlParser::parserInsertQuery($fields);

		$sql = trim("
			INSERT INTO {$this->usesTable} ({$query->placeholders})
			VALUES ({$query->values})
		");

		$insert = $this->database->prepare($sql);
		$insert_result = $insert->execute($fields);
		
		return $insert_result;
	}

	public final function select(array $fields = ['*'], array $where = []):array
	{
		$query = SqlParser::parserSelectQuery($fields);

		$sql = trim("
			SELECT {$query->columns} FROM {$this->usesTable}
		");
	
		$hasWhereClause = count($where) !== 0;

		if ($hasWhereClause) {
			$whereQuery = SqlParser::parserWhereQuery($where);
			$sql .= " WHERE {$whereQuery->field} = {$whereQuery->value}";
		}

		$select = $this->database->prepare($sql);
		$select->execute();
		$result_rows = $select->fetchAll();
	
		return $result_rows;
	}

	public final function delete(array $where)
	{	
		$whereQuery = SqlParser::parserWhereQuery($where);
		$sql = trim("
			DELETE FROM {$this->usesTable} 
			WHERE {$whereQuery->field} = {$whereQuery->value}
		");

		$delete = $this->database->prepare($sql);
		$delete_result = $delete->execute();

		return $delete_result;
	}

	public final function update(array $fields, array $where) 
	{	
		$query = SqlParser::parserUpdateQuery($fields);
		$where = SqlParser::parserWhereQuery($where);

		$sql = trim("
			UPDATE {$this->usesTable} SET {$query->update_clause}
			WHERE {$where->field} = {$where->value}
		");		
		
		$update = $this->database->prepare($sql);
		$update_result = $update->execute($fields);

		return $update_result;
	}
}