<?php

class APIController extends BaseController
{

	public function getIndex()
	{



	}

	public function getGetToken($username, $password)
	{

		if(Auth::once(['username' => $username, 'password' => $password]))
		{
			Auth::user()->api_token = md5(uniqid());
			Auth::user()->save();

			return Response::json([
				'success' => true,
				'token' => Auth::user()->api_token
			]);
		}

		return Response::json([
			'success' => false,
			'token' => null
		]);

	}

	public function getValidateToken($token)
	{

		$thisUser = User::where('api_token', '=', $token)->first();

		if(empty($thisUser))
		{
			return Response::json([
				'success' => false
			]);
		}

		return Response::json([
			'success' => true
		]);

	}

}