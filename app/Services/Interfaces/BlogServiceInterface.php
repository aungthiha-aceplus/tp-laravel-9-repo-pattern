<?php

namespace App\Services\Interfaces;

interface BlogServiceInterface
{
    public function store($request);
    
    public function update($blog, $request);

    public function delete($blog);
}