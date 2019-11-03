<?php 
require_once __DIR__."/../../vendor/autoload.php";
use helper\endpoint\router\utils\UtilsRouter;
use helper\controller\utils\UtilsController;

$utilsRouter = new UtilsRouter('/endpoint/util');
$utilsController = new UtilsController();

$utilsRouter->get('/get', function() use($utilsController){
	$params = $_GET;
	$utilsController->getUtils($params);

});

$utilsRouter->post('/add', function() use($utilsController){
	$newUtilsData = json_decode(file_get_contents("php://input"), true);
	$utilsController->createUtil($newUtilsData);

});


$utilsRouter->post('/utils/update', function() use($utilsController){

	$idUtil = (int) $_GET['id_util'];
	$newDataUtil = $_POST;
	$utilsController->updateUtil(
		$newDataUtil, $idUtil
	);

});

$utilsRouter->post('/utils/delete', function() use($utilsController){

	$idUtil = (int) $_GET['id_util'];
	$utilsController->deleteUtil($idUtil);

});
