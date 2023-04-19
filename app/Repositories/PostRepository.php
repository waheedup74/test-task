<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Post;

class PostRepository extends BaseRepository
{
    /**
     * PostRepository constructor.
     *
     * @param Post $post
     */
   public function model()
    {
        return Post::class;
    }

    /**
     * Get all posts for a given user ID.
     *
     * @param int $userId
     *
     * @return mixed
     */
    public function findByUser($user_id)
    {
        return $this->model->where('user_id', $user_id)->get();
    }

    public function getPostById($userId)
    {
        return $this->model->findOrFail($userId);
    }
}

