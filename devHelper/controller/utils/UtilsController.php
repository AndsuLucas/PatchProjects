<?php 

namespace helper\controller\utils;
use helper\controller\AbstractController;
use helper\factory\model\ModelFactory;

final class UtilsController extends AbstractController
{	
	protected $globalMiddleware = [];
	

	/**
	 * Retorna todos os registros de utilidade em forma de texto/json;
	 * @return string
	 */
	public function getUtils(array $where): string
	{	
	
		$sanitizeWhere = $this->sanitizeUrlQueryData($where);
		$util = ModelFactory::util();	
		$utilRegisters = $util->select(["*"], $sanitizeWhere);
		
		return $this->jsonResponseWrite($utilRegisters);

	}

	public function createUtil(array $data): string
	{
		
		$util = ModelFactory::util();
		$createResult = $util->create($data);

		if (!$createResult) {
			return $this->jsonResponseWrite(['status' => 'error']);
		}
		
		return $this->jsonResponseWrite(['status' => 'success']);
	}

	public function updateUtil(array $newUtilData, int $idUtil)
	{

		$util = ModelFactory::util();
		$where = ['id' => $idUtil];
		$updateResult = $util->update($newUtilData, $where);

		if (!$updateResult) {
			print_r($this->jsonFormater('Erro'));
			return;
		}
		
		print_r($this->jsonFormater('Sucesso'));
		return;
	}

	public function deleteUtil(int $idUtil)
	{
		$util = ModelFactory::util();
		$where = ['id' => $idUtil];
		$deleteResult = $util->delete($where);
		if (!$deleteResult) {
			print_r($this->jsonFormater('Erro'));
			return;
		}
		
		print_r($this->jsonFormater('Sucesso'));
		return;
	}
}