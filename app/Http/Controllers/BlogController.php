<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Services\Interfaces\BlogServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ApiResponser;

    private BlogRepositoryInterface $blogRepository;
    private BlogServiceInterface $blogService;

    public function __construct(BlogRepositoryInterface $blogRepository, BlogServiceInterface $blogService) 
    {
        $this->blogRepository = $blogRepository;
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagination(Request $request)
    {
        $data = $this->blogRepository->paginate($request);
        return $this->paginate(200, BlogResource::collection($data['data']),  $data['page']); //return paginate
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->blogRepository->all($request);
        return $this->success(200, BlogResource::collection($data)); //return simple array
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        $data = $this->blogService->store($request->validated());
        return $this->success(200, new BlogResource($data)); //return object
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $data = $this->blogRepository->getByBlog($blog);
        return $this->success(200, new BlogResource($data)); //return object
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $data = $this->blogService->update($blog, $request->validated());
        return $this->success(200, new BlogResource($data)); //return object
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $data = $this->blogService->delete($blog);
        return $this->success(200); //return null
    }
}
