<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function modify(User $user, Post $post) : bool {

        return $user->id === $post->user_id;
    }
}
