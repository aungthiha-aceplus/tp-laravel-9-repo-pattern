<?php

namespace App\Services;

use App\Models\Blog;
use App\Services\Interfaces\BlogServiceInterface;
use Illuminate\Http\Request;

class BlogService implements BlogServiceInterface
{
    public function store($request)
    {
        try{
            return Blog::create($request);
        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }

    public function update($blog, $request)
    {
        try{
            $blog->update($request);
            return $blog;
        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }

    public function delete($blog)
    {
        try{
            $blog->delete();
            return true;
        }catch(\Exception $exception)
        {
            throw new \Exception($exception->getMessage());
        }
    }
}