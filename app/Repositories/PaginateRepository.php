<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PaginateRepositoryInterface;
use stdClass;
use Exception;
use Illuminate\Support\Facades\Log;

class PaginateRepository implements PaginateRepositoryInterface
{
    public static function paginateResource($data)
    {
        try{
            $page = new stdClass;
            $current_page = $data['current_page'];
            $total_page = $data['last_page'];
            $per_page = $data['per_page'];
            $next_page = $total_page > $current_page ? ($current_page + 1) : null;
            $last_page = $current_page != 1 ? ($current_page - 1) : null;
    
            $page->total_page = $total_page;
            $page->per_page = $per_page;
            $page->current_page = $current_page;
            $page->next_page = $next_page;
            $page->last_page = $last_page;
            return $page;
        }catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}