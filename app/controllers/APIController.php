<?php

class APIController extends BaseController
{

	public function getIndex()
	{



	}

	public function getGetToken($email, $password)
	{

		if(Auth::once(['email' => $email, 'password' => $password]))
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

	public function getValidateToken($email, $token)
	{

		$thisUser = User::where('api_token', '=', $token)
			->where('email', '=', $email)->first();

		if(empty($thisUser))
		{
			return Response::json([
				'success' => false
			]);
		}

		$thisUser->api_token = null;
		$thisUser->save();

		return Response::json([
			'success' => true
		]);

	}
	
	public function getGetName($email) {
		$thisUser = User::where('email', '=', $email)->first();
		if (empty($thisUser)) {
			return Response::json([
				'success' => false,
				'name'    => null
			]);
		}
		return Response::json([
			'success' => true,
			'name' => $thisUser->username
		]);
	}

}