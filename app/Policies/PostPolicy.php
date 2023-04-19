<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    use HandlesAuthorization;

    public function view(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
