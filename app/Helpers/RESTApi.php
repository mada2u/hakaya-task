<?php
namespace App\Helpers;
use Symfony\Component\HttpFoundation\Response;

trait RESTApi {
	
	/**
	* Return response with json object
	* @param $responseObject, $responseKey, $statusCode 
	* @return \Illuminate\Http\JsonResponse
	*/
	public function sendJson($responseObject,$statusCode = Response::HTTP_OK,$responseKey = 'response'){
		$jsonResponse['statusCode'] = $statusCode;
		if($responseObject)
			$jsonResponse[$responseKey] = $responseObject;
		return response($jsonResponse,$statusCode);
	}

	/**
	* Return response with error object
	* @param $errorObject, $errorKey, $statusCode
	* @return \Illuminate\Http\JsonResponse
	*/
	public function sendError($errorObject, $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY, $errorKey = 'error'){
		$errorResponse['statusCode'] = $statusCode;
		$errorResponse[$errorKey] = $errorObject;
		return response($errorResponse,$statusCode);
	}
}
?>