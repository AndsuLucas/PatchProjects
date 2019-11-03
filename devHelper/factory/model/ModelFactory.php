<?php 

namespace helper\factory\model;
use helper\model\database\Database;
use helper\model\utils\UtilModel;
use helper\model\utils\UtilCategory;

abstract class ModelFactory implements ModelFactoryInterface
{	

	public static function util(): UtilModel
	{
		$database = new Database();
		return new UtilModel($database);
	}

	public static function utilCategory(): UtilCategory
	{
		$database = new Database();
		return new UtilCategory($database);
	}
}
