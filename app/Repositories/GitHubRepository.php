<?php

namespace App\Repositories;

use App\Models\User;
use Services\GitHubService;

class GitHubRepository
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function create()
	{
		

		return $this->user->create($attributes);
	}


}