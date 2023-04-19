<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\User;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
   public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::findOrFail($id);
    }
}
}
