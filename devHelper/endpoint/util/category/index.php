<?php  
require_once __DIR__."/../../../vendor/autoload.php";
use helper\endpoint\router\utils\UtilsCategoryRouter;
use helper\controller\utils\UtilsCategoryController;

$utils = new UtilsCategoryRouter('/endpoint/util/category');
$utilCategoryController = new UtilsCategoryController();

$utils->get('/all', function() use($utilCategoryController){
	$utilCategoryController->geUtilsCategory();
});