<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
// use Socialite;
use Auth;
// use Exception;
use App\Models\User;
use App\Services\GitHubService;


class SocialGithubController extends Controller
{

	protected $githubservice;

	public function __construct(GitHubService $githubservice)
	{
		$this->githubservice = $githubservice;
	}

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

	public function handleCallback()
    {
        try 
        {
        	$this->githubservice->register();
            return redirect('/seller-dashboard');
        } 
        catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
