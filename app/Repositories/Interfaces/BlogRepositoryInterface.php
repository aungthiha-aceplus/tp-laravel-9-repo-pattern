<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;

interface BlogRepositoryInterface
{
    public function all(Request $request);

    public function paginate(Request $request);

    public function getByBlog(Blog $blog);

    public function getByUser(User $user);
}