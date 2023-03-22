<?php

namespace App\Traits;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait ApiResponser
{
	/**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
	protected function success(int $code = 200, $data = null)
	{
        // modify here
		return response()->json([
			'status' => 'success',
			'status_code' => $code,
			'data' => $data
		], $code);
	}

	/**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
	protected function error(int $code, $data = null, $message = null)
	{
        // modify here
		return response()->json([
			'status' => 'error',
			'status_code' => $code,
			'data' => $data,
            'err_msg' => $message
		], $code);
	}
	
	protected function paginate(int $code = 200, $data = null, $page = null)
	{
        // modify here
		return response()->json([
			'status' => 'success',
			'status_code' => $code,
			'data' => [
				'list_data' => $data,
				'page' => $page
			]
		], $code);
	}
}