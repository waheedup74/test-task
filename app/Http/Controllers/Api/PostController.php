<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Policies\PostPolicy;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $postRepository;
    private $postPolicy;

    public function __construct(PostRepository $postRepository, PostPolicy $postPolicy)
    {
        $this->postRepository = $postRepository;
        $this->postPolicy = $postPolicy;
    }

    public function index()
    {
        $user = Auth::user();
        $posts = $this->postRepository->findByUser($user->id);

        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = $this->postRepository->getPostById($id);
        if ($this->postPolicy->view(Auth::user(), $post)) {
            return new PostResource($post);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
