<?php 

namespace helper\helpers\classes;

abstract class SqlParser
{
	/* DEIXAR MAIS INTUITIVO */
	public static function parserInsertQuery(array $fields): object
	{
		$query['placeholders'] = implode(',', array_map(function($placeholder){ 
				return addslashes($placeholder);
			}, array_keys($fields) )
		);

		$query['values'] = implode(',', array_map(function($value){ 
				return addslashes(":".$value);
			}, array_keys($fields) )
		);

		return (object) $query;
			
	}

	public static function parserSelectQuery(array $columns): object
	{
		$query['columns'] = implode(',', array_map(function($column){
				return  addslashes($column);
			}, array_values($columns) )
		);
		
		return (object) $query;
	}
	
	public static function parserWhereQuery(array $where)
	{
		$query['field'] = implode(array_map(function($field){
				return addslashes($field);
			}, array_keys($where) )
		);

		$query['value'] = implode(array_map(function($value){
				return addslashes($value);
			}, array_values($where) )
		);
		
		return (object) $query;			
	}

	public static function parserUpdateQuery(array $fields)
	{	

		$query['update_clause'] = implode(
			"", array_map(function($field){
				return $field . "=" . ":" . $field . ", ";
			}, array_keys($fields) )
		);
		
		$sanitized_clause = rtrim(
			trim($query['update_clause']), ","
		);
		
		$query['update_clause'] =  $sanitized_clause;
		
		return (object) $query;
	}
}

