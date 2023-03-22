<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\User;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogRepository implements BlogRepositoryInterface
{
    public function all(Request $request)
    {
        try{
            return Blog::all();
        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }

    public function paginate(Request $request)
    {
        try{
            $search = $request->search;

            $data = Blog::where('title', 'LIKE', "%$search%")
            ->orderBy('id', $request['orderBy'] ? $request['orderBy'] : 'asc')
            ->paginate($request['limit'] ? $request['limit'] : 10);

            $page = (new PaginateRepository)->paginateResource($data->toArray());
            return ['data' => $data, 'page' => $page];

        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }

    public function getByBlog(Blog $blog)
    {
        try{
            return Blog::findOrFail($blog->id);
        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }

    public function getByUser(User $user)
    {
        try{
            return Blog::where('user_id'. $user->id)->get();
        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }
}