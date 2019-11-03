<?php 
namespace helper\controller\utils;
use helper\controller\AbstractController;
use helper\factory\model\ModelFactory;

final class UtilsCategoryController extends AbstractController
{	

	protected $globalMiddleware = [];

	/**
	 * Retorna todos as categorias de registro em forma texto/json
	 * @return string
	 */
	public function geUtilsCategory(): string
	{
		
		$utilCategory = ModelFactory::utilCategory();
		$categoryData = $utilCategory->select();
		
		return $this->jsonResponseWrite($categoryData);

	}


}
