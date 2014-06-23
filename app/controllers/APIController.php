<?php

class APIController extends BaseController
{

	public function getIndex()
	{

		return Response::json(['version' => '1.0.0.0']);

	}

	public function getGetToken($email, $password)
	{

		if(!Auth::once(['email' => $email, 'password' => $password]))
		{
			return Response::json([
				'success'       => false,
				'token'         => null,
				'refresh-token' => null
			]);
		}
		
		Auth::user()->api_token         = md5(uniqid());
		Auth::user()->api_refresh_token = md5(uniqid());
		Auth::user()->save();

		return Response::json([
			'success'       => true,
			'token'         => Auth::user()->api_token,
			'refresh-token' => Auth::user()->api_refresh_token
		]);

	}

	public function getRefreshToken($email, $refreshToken)
	{

		$thisUser = User::where('email', '=', $email)
			->where('api_refresh_token', '=', $refreshToken)
			->first();

		if(empty($thisUser))
		{
			return Response::json([
				'success'       => false,
				'token'         => null
			]);
		}

		$thisUser->api_token = md5(uniqid());
		$thisUser->save();

		return Response::json([
			'success'       => true,
			'token'         => $thisUser->api_token
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
	
	public function getGetName($email) 
	{
		$thisUser = User::where('email', '=', $email)->first();
		if (empty($thisUser)) 
		{
			return Response::json([
				'success' => false,
				'name'    => null
			]);
		}
		return Response::json([
			'success' => true,
			'name'    => $thisUser->username
		]);
	}



	public function getUnlockAchievements($email, $successId)
	{
		$achievement = Achievement::find($successId);
		if(empty($achievement))
		{
			return Response::json([
				'success' => false,
				'message' => 'Achievement not found'
			]);
		}

		$user = User::where('email', '=', $email)->first();
		if(empty($user))
		{
			return Response::json([
				'success' => false,
				'message' => 'User not found'
			]);
		}

		$unlocked = UserAchievement::where('user_id', '=', $user->id)
			->where('achievement_id', '=', $successId)->first();

		if(!empty($unlocked))
		{
			return Response::json([
				'success' => false,
				'message' => 'Achievement already unlocked'
			]);
		}

		// All good here
		$newFeed                 = new GameFeed;
		$newFeed->user_id        = $user->id;
		$newFeed->achievement_id = $successId;
		$newFeed->content        = 'Unlocked the achievement "' . $achievement->name . '"';
		$newFeed->save();

		$newAch = new UserAchievement;
		$newAch->user_id = $user->id;
		$newAch->achievement_id = $achievement->id;
		$newAch->save();


		return Response::json([
			'success' => true,
			'message' => $achievement->name
		]);
	}

}