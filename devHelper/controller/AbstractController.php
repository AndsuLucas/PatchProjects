<?php 

namespace helper\controller;

abstract class AbstractController
{	
	
	public function __construct()
	{	
		$hasGlobalMiddleware = count($this->globalMiddleware) !== 0;
		if ($hasGlobalMiddleware) {
			array_walk_recursive(
				$this->globlaMiddleware, 'call_user_func'
			);
		}
	}

	/**
	 * Formata os dados para formato json.
	 * @return string
	 */
	private function jsonFormater(array $data): string
	{	
		$jsonData = json_encode($data);
		return $jsonData;
	}

	/**
	 * Retira comandos maliciosos da url.
	 *@return array
	 */
	protected function sanitizeUrlQueryData(array $data): array
	{	
		$pattern = '/(DELETE\s+)|(UPDATE\s+)|(OR\s+)|(AND\s+)/i';
		$sanitizedData = array_map(function($value) use($pattern) {
			
			$newValue = preg_replace($pattern, "", $value);
			return addslashes($newValue);		

		}, $data);
		
		return $sanitizedData;
		
	}

	/**
	 * Escreve uma resposta json
	 * @return void
	 */
	protected function jsonResponseWrite(array $content): string
	{	
		
		$contentJson = utf8_encode(
			$this->jsonFormater($content)
		);
		
		return print_r($contentJson);
	}

}