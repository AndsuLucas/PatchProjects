<?php 

namespace helper\factory\model;
use helper\model\utils\UtilModel;

interface ModelFactoryInterface
{
	/**
	*Retorna uma instancia do model utils
	*@return UtilsModel
	*/
	public static function utils(): UtilsModel;

}