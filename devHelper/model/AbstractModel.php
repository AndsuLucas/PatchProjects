<?php 

namespace helper\model;

abstract class AbstractModel
{
	protected $usesTable;
	protected $database;
	
	abstract protected function select(array $fields = ['*'], array $where = []);

	abstract protected function create(array $fields);

	abstract protected function delete(array $where);

	abstract protected function update(array $fields, array $where);
}