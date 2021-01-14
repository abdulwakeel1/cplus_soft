<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\GitHubRepository;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class GitHubService
{
	public function __construct(GitHubRepository $user)
	{
		$this->user = $user ;
	}

	public function register()
	{
		$user = Socialite::driver('github')->user();
        $finduser = User::where('social_id', $user->id)->first();
        // dd($finduser);
      
        if($finduser)
        {
            Auth::login($finduser);
            // dd("yes");
 
 			return $finduser;
            return redirect('/home');
      
        }
        else
        {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id'=> $user->id,
                'social_type'=> 'github',
                'password' => encrypt('github123456')
            ]);
 
            Auth::login($newUser);
  
            return redirect('/home');
        }
	}

}